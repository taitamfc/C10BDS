<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->start_day = $request->start_day;
        $user->users_group_id = $request->user_group_id;
        $user->branch_id = $request->branch_id;
        $user->save();

        return redirect()->route('users.index')->with('success','Thêm'. ' ' . $request->name.' '.  'thành công');



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
        $user = User::find($id);
        $params = [
            'user' => $user
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
    public function update(UpdateUserRequest $request, User $user, $id)
    {
        User::find($id)->update($request->only('name'));
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
