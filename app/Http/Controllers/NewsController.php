<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Menu;

class NewsController extends Controller
{

    public function categoryNews($category)
    {
        $newsFromCategory = (new News())->getAllFromCategory($category);
        $data = [
            'pageTitle' => "Новости категории \"{$newsFromCategory['cat']}\"", 
            'news' => $newsFromCategory,
            'activePage' => 'Каталог новостей',
            'menu' => (new Menu())->get(),
        ];

        return view('categoryNews', $data);
    }

    public function newsCard($category, $news)
    {
        $fullNews = (new News())->getOne($news);
        $data = [
            'pageTitle' => "Новость из категории \"{$fullNews->category()->first()->name}\"", 
            'fullNews' => $fullNews,
            'activePage' => 'Каталог новостей',
            'menu' => (new Menu())->get(),
        ];

        return view('newsCard', $data);
    }
}

