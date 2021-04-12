<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Каталог новостей', 
            'newsCategory' => (new NewsCategory())->getAll(),
            'activePage' => 'Каталог новостей',
        ];

        return view('newsCatalog', $data);
    }
}

