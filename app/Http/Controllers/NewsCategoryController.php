<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class NewsCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Каталог новостей', 
            'newsCategory' => (new Category())->all(),
            'activePage' => 'Каталог новостей',
        ];
        
        return view('newsCatalog', $data);
    }
}

