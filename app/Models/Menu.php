<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    use HasFactory;

    private $menu = [
        'Главная' => '/',
        'Каталог новостей' => '/news_catalog',
        'Обратная связь' => '/feedback',
        'Регистрация' => '/register',
        'Вход' => '/login',
        'Войти через Mail.ru' => '/auth/vk',
        'Профиль' => '/profile',
        'Выйти' => '/logout',
    ];

    public function get()
    {
        $userMenu = [];

        foreach ($this->menu as $page => $link) {
            if (Auth::check() && ($link == '/register' || $link == '/login' || $link == '/auth/vk')) {
                continue;
            }

            if (!Auth::check() && ($link == '/profile' || $link == '/logout')) {
                continue;
            }

            $userMenu[$page] = $link;
        }

        return $userMenu;
    }
}

