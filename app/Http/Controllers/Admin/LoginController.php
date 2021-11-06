<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.users.login', ['title' => "ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ"]);
        }
    }


    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Email hoặc mật khẩu không hợp lệ');
            return redirect()->back();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
