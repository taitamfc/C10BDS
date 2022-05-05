<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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



        // dd($request->phone);
        $phone = $request->phone;
        $password = $request->password;
        $checkUserByPhone = User::where('phone',$phone)->take(1)->first();
        if ($checkUserByPhone && Hash::check($request->password,$checkUserByPhone->password)) {
            Auth::login($checkUserByPhone);
            return redirect()->route('admin.index');
        } else {
            Session::flash('error_phone','Đăng nhập không thành công');
            return redirect()->back();
        }
    }
}
