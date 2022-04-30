<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroup;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Branch;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
  
// dd($request->filter);
        $query = User::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->filter['phone']) && $request->filter['phone']) {
            $phone = $request->filter['phone'];
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        }
        if (isset($request->filter['province_id']) && $request->filter['province_id']) {
            $province_id = $request->filter['province_id'];
            $query->where('province_id', $province_id);
        }
        if (isset($request->filter['district_id']) && $request->filter['district_id']) {
            $district_id = $request->filter['district_id'];
            $query->where('district_id', $district_id);
        }
        if (isset($request->filter['ward_id']) && $request->filter['ward_id']) {
            $ward_id = $request->filter['ward_id'];
            $query->where('ward_id', $ward_id);
        }
        if (isset($request->filter['user_group_id']) && $request->filter['user_group_id']) {
            $user_group_id = $request->filter['user_group_id'];
            $query->where('user_group_id', 'LIKE', '%' . $user_group_id . '%');
        }

        if ($request->s){
            $query->where('name', 'LIKE', '%' . $request->s . '%');
            $query->orwhere('id', $request->s);
        }
    

        $query->orderBy('id', 'desc');
        $users = $query->paginate(4);
        // dd($users);
        $userGroups = UserGroup::all();
        $branches = Branch::all();
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();
        
        $params = [
            'provinces' => $provinces,
            'users' => $users,
            'userGroups' =>  $userGroups,
            'branches' => $branches,
            'districts' => $districts,
            'wards' => $wards
        ];
        return view('admin.users.index', $params);
    }
    /**
     * Show the form for creating a new resource.
     * @return array create
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userGroups = UserGroup::all();
        $branches = Branch::all();
        $provinces = Province::all();
        $users = User::select('*');
        $users = $users->paginate(3);
        $params = [

            'provinces' => $provinces,
            'userGroups' => $userGroups,
            'branches' => $branches,
            'users' => $users
        ];
        return view('admin.users.add', $params);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name             = $request->name;
        $user->gender           = $request->gender;
        $user->day_of_birth     = $request->day_of_birth;
        $user->address          = $request->address;
        $user->email            = $request->email;
        $user->phone            = $request->phone;
        $user->password         = Hash::make($request->password);
        $user->start_day        = $request->start_day;
        $user->user_group_id    = $request->user_group_id;
        $user->branch_id        = $request->branch_id;
        $user->province_id      = $request->province_id;
        $user->district_id      = $request->district_id;
        $user->ward_id          = $request->ward_id;
        $user->note             = $request->note;
        try {
            $user->save();
            return redirect()->route('users.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userGroups = UserGroup::all();
        $branches = Branch::all();
        $user =  User::find($id);
        $provinces = Province::all();
        $districts = District::where('province_id',$user->province_id)->get();
        $wards = Ward::where('district_id',$user->district_id)->get();
        $params = [
            'provinces' => $provinces,
            'user' => $user,
            'userGroups' => $userGroups,
            'branches' => $branches,
            'districts' => $districts,
            'wards' => $wards
        ];
        return view('admin.users.edit', $params);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name             = $request->name;
        $user->gender           = $request->gender;
        $user->day_of_birth     = $request->day_of_birth;
        $user->address          = $request->address;
        $user->email            = $request->email;
        $user->phone            = $request->phone;
        if ($request->password){
            $user->password         = Hash::make($request->password);
        }
        $user->start_day        = $request->start_day;
        $user->user_group_id    = $request->user_group_id;
        $user->branch_id        = $request->branch_id;
        $user->province_id      = $request->province_id;
        $user->district_id      = $request->district_id;
        $user->ward_id          = $request->ward_id;
        $user->note             = $request->note;
        try {
            $user->save();
            return redirect()->route('users.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('success', 'Xóa không  thành công');
        }

    }
}
