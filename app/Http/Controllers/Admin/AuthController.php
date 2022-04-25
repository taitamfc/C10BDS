<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        }
        
        return redirect()->back()->with('error', 'Đăng nhập không thành công');
    }
}