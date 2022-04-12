<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGroup;
use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userGroups = UserGroup::all();
        return view('admin.userGroups.index', compact('userGroups'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userGroups.add');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userGroup = new UserGroup();
        $userGroup->name = $request->name;
        $userGroup->description = $request->description;

        $userGroup->save();

        return redirect()->route('userGroups.index')->with('success','Thêm'. ' ' . $request->name.' '.  'thành công');

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
    public function edit( $id)
    {
        $userGroup = UserGroup::find($id);
        $params = [
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
    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup, $id)
    {

        UserGroup::find($id)->update($request->only('name'));
        return redirect()->route('userGroups.index')->with('success','Sửa'. ' ' . $request->name.' '.  'thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
       $userGroup = UserGroup::find($id);
       $userGroup->delete();

       return redirect()->route('userGroups.index')->with('success','Xóa  thành công');
    }
}
