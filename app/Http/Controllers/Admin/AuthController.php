<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index($authMsg = null)
    {
        $data = [
            'pageTitle' => 'Вход в панель администратора', 
            'authMsg' => $authMsg,
        ];

        return view('admin/authForm', $data);
    }

    public function auth(Request $request)
    {
        $user = (new User())->getOneByLogin($request->login);

        if (isset($user)
            && $request->login == $user['login'] 
            && $request->password == $user['password']
        ) {
            return view(
                'admin/panel', 
                [
                    'login' => $user['login'],
                    'pageTitle' => 'Панель администратора',
                ]
            );
        } else {
            header('Location: ' . route('admin::auth::form'));
            exit();
        }
    }
}

