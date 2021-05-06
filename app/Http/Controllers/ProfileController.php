<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Models\Menu;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfileForm()
    {
        $data = [
            'pageTitle' => 'Профиль пользователя',
            'activePage' => 'Профиль',
            'menu' => (new Menu())->get(),
            'user' => User::find(\Auth::user()->id),
        ];

        return view('profileForm', $data);
    }

    public function edit(ProfileFormRequest $request)
    {
        $user = \Auth::user();
        $user->fill($request->all());
        $user->password = \Hash::make($request->password);
        
        if ($user->save()) {
            $editMsg = 'Профиль сохранен';
        } else {
            $editMsg = 'Что-то пошло не так!!!';
        }

        return back()->with('editMsg', $editMsg);
    }

}
