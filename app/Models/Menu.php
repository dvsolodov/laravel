<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    private $menu = [
        'Главная' => '/',
        'Каталог новостей' => '/news_catalog',
        'Обратная связь' => '/feedback',
    ];

    public function getAll()
    {
        return $this->menu;
    }
}

