<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;


class NewsCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Каталог новостей', 
            'newsCategory' => (new Category())->all(),
            'activePage' => 'Каталог новостей',
            'menu' => (new Menu())->get(),
        ];
        
        return view('newsCatalog', $data);
    }
}

