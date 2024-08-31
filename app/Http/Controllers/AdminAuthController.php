<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Показать форму логина
    public function showLoginForm()
    {
        return view('admin_login');
    }

    // Обработать логин
    public function login(Request $request)
    {
        $adminLogin = 'admin';
        $adminPasswordHash = 'd8578edf8458ce06fbc5bb76a58c5ca4'; // md5('qwerty')

        if ($request->input('admin_login') === $adminLogin && md5($request->input('admin_password')) === $adminPasswordHash) {
            Session::put('isAdmin', true);
            return redirect()->route('admin');
        }

        return redirect()->back()->with('error', 'Invalid login or password');
    }

    // Выход из админки
    public function logout()
    {
        Session::forget('isAdmin');
        return redirect()->route('admin.login');
    }
}
