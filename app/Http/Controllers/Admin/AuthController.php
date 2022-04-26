<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }


    // dang nhap
    public function postLogin(LoginRequest $request)
    {
        //kiểm tra dữ liệu
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index')->with('succes', 'Xin chào' . ' ' . $request->name);
             
        } else {
            return redirect()->back()->with('success', 'Đăng nhập không thành công');
        }
    }
}
