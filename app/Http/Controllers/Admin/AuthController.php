<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Вход в панель администратора', 
        ];

        return view('admin/authForm', $data);
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            if (\Auth::user()->is_admin == 1) {
                $request->session()->regenerate();

                return redirect()->route('admin::news::show::all');
            } else {
                return $this->logout($request)->with('authMsg', 'Неправильный логин или пароль');
            }
        }

        return back()->with('authMsg', 'Неправильный логин или пароль');
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin::auth::form');
    }
}

