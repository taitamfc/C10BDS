<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        } 
        else {
            $checkEmail = User::where("email",$request->email)->first();
            if($checkEmail){
                Session::flash('error_password','Mật khẩu của bạn không chính xác');
            }else{
                Session::flash('error_email','Email của bạn không chính xác');
            }
            return redirect()->back();
        }
       
    }
}

