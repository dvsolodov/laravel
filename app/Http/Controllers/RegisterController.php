<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $data = [
            'pageTitle' => 'Регистрация аккаунта',
            'activePage' => 'Регистрация',
            'menu' => (new Menu())->get(),
        ];

        return view('registerForm', $data);
    }

    public function register(RegisterFormRequest $request)
    {
        $request->session()->regenerate();

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            if (isset($request->remember_me) && $request->remember_me == 1) {
                Auth::login($user, $remember = true);
            } else {
                Auth::login($user);
            }
        } else {
            return back()->with('regMsg', 'Что-то пошло не так!!!');
        }

        return redirect()->route('home');
    }
}
