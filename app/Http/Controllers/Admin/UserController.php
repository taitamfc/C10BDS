<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroup;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(3);
        $userGroups = UserGroup::all();
        $branches = Branch::all();
        $params = [
            'users' => $users,
            'userGroups' =>  $userGroups,
            'branches' => $branches
        ];

        return view('admin.users.index',$params);
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
        $users = User::select('*');
        $users = $users->paginate(3);
        $params =[
            'userGroups' => $userGroups,
            'branches' => $branches,
            'users' => $users
        ];
     
        return view('admin.users.add',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->start_day = $request->start_day;
        $user->users_group_id = $request->users_group_id;
        $user->branch_id = $request->branch_id;
        $user->note = $request->note;

        try {
            $user->save();
            return redirect()->route('users.index')->with('success','Thêm'. ' ' . $request->name.' '.  'thành công');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('success','Thêm'. ' ' . $request->name.' '.  'không thành công');

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

        $params = [
            'user' => $user,
            'userGroups' => $userGroups,
            'branches' => $branches
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
    public function update(UpdateUserRequest $request,$id)
    {
        User::find($id)->update($request->only('name','birthday','address','email','phone','password','start_day','users_group_id','branch_id','note'));
        return redirect()->route('users.index')->with('success','Sửa'. ' ' . $request->name.' '.  'thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('users.index')->with('success','Xóa  thành công');
    }
}