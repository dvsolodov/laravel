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
            && $request->login == $user->name 
            && password_verify($request->password, $user->password)
        ) {
            return redirect()->route('admin::news::index');
        } else {
            return back()->withInput();
        }
    }
}

