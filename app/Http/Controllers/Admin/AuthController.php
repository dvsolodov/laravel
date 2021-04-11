<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $admin = [
        'login' => 'admin',
        'password' => '123',
    ];

    public function index($authMsg = null)
    {
        return view('admin/authForm', ['pageTitle' => 'Вход в панель администратора', 'authMsg' => $authMsg]);
    }

    public function auth(Request $request)
    {
        if ($request->login == $this->admin['login'] && $request->password == $this->admin['password']) {
            return view(
                'admin/panel', 
                [
                    'login' => $this->admin['login'],
                    'pageTitle' => 'Панель администратора',
                ]
            );
        } else {
            header('Location: ' . route('admin::auth::form'));
            exit();
        }
    }
}

