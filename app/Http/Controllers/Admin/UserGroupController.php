<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny',UserGroup::class);

        $query = UserGroup::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($request->s) {
            $query->where('name', 'LIKE', '%' . $request->s . '%');
            $query->orwhere('id', $request->s);
        }

        $query->orderBy('id', 'desc');
        $userGroups = $query->paginate(4);
        $params = [
            'filter' => $request->filter,
            'userGroups' => $userGroups
        ];
        return view('admin.userGroups.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', UserGroup::class);

        return view('admin.userGroups.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserGroupRequest $request)
    {
        $userGroup = new UserGroup();
        $userGroup->name = $request->name;
        $userGroup->description = $request->description;
        try {
            $userGroup->save();
            return redirect()->route('userGroups.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $userGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userGroup = UserGroup::find($id);
        // $this->authorize('update',  $userGroup);
        $current_user = Auth::user();
        $userRoles = $userGroup->roles->pluck('id','name')->toArray();
        // dd($current_user->userGroup->roles->toArray());
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role){
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'userRoles' => $userRoles,
            'group_names' => $group_names,
            'userGroup' => $userGroup
        ];
        return view('admin.userGroups.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserGroupRequest  $request
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserGroupRequest $request, $id)
    {
        // dd($request->all());
        
        $userGroup = UserGroup::find($id);
        $userGroup->name = $request->name;
        $userGroup->description = $request->description;

        try {
            $userGroup->save();
            //detach xóa hết tất cả các record của bảng trung gian hiện tại
            $userGroup->roles()->detach();
            //attach cập nhập các record của bảng trung gian hiện tại
            $userGroup->roles()->attach($request->roles);
            return redirect()->route('userGroups.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  ' không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', UserGroup::class);

        $userGroup = UserGroup::find($id);

        try {
            $userGroup->delete();
            return redirect()->route('userGroups.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('success', 'Xóa không thành công');
        }
    }
}
