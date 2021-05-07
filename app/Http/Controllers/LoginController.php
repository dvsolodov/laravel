<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;
use Socialite;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'pageTitle' => 'Вход в аккаунт',
            'activePage' => 'Вход',
            'menu' => (new Menu())->get(),
        ];

        return view('loginForm', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember_me)) {
            $request->session()->regenerate();
            $user = User::where('email', $request->email)->first();

            if (isset($request->remember_me) && $request->remember_me == 1) {
                Auth::login($user, $remember = true);
            } else {
                Auth::login($user);
            }

            return redirect()->route('home');
        }

        return back()->with('loginMsg', 'Неправильный логин или пароль');

    }

    public function loginVk()
    {
        if (Auth::check()) {
            return back();
        }

        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk()
    {
        $vkUser = Socialite::driver('vkontakte')->user();
        $user = User::where('id_in_soc', $vkUser->getId())
            ->where('type_auth', 'vk')
            ->first();

        if (is_null($user)) {
            $user = new User();
            $user->fill([
                'name' => $vkUser->getName(),
                'email' => $vkUser->getEmail() ?? '',
                'password' => \Hash::make($vkUser->getId()),
                'id_in_soc' => $vkUser->getId(),
                'type_auth' => 'vk',
                'avatar' => $vkUser->getAvatar(),
            ])->save();
        }

        Auth::login($user);

        return redirect()->route('home');
        
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
