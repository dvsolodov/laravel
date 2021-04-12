<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    private $newsCategories = [
        'в мире' => 'world',
        'экономика' => 'business',
        'общество' => 'society',
        'коронавирус' => 'koronavirus',
        'культура' => 'culture',
        'технологии' => 'computers',
        'наука' => 'science',
    ];

    public function getAll()
    {
        return $this->newsCategories;
    }
}

