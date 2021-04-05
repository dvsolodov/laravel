<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $newsCategory = [
            'в мире' => 'world',
            'экономика' => 'business',
            'общество' => 'society',
            'коронавирус' => 'koronavirus',
            'культура' => 'culture',
            'технологии' => 'computers',
            'наука' => 'science',
        ];

        return view(
            'newsCatalog', 
            [
                'pageTitle' => 'Каталог новостей', 
                'newsCategory' => $newsCategory,
                'activePage' => 'Каталог новостей',
            ]
        );
    }
}

