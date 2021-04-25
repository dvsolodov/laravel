<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    public function categoryNews($category)
    {
        $newsFromCategory = (new News())->getAllFromCategory($category);
        $data = [
            'pageTitle' => "Новости категории \"{$newsFromCategory['cat'][0]->name}\"", 
            'news' => $newsFromCategory,
            'activePage' => 'Каталог новостей',
        ];

        return view('categoryNews', $data);
    }

    public function newsCard($category, $news)
    {
        $fullNews = (new News())->getOne($news);
        $data = [
            'pageTitle' => "Новость из категории \"{$fullNews->category}\"", 
            'fullNews' => $fullNews,
            'activePage' => 'Каталог новостей',
        ];

        return view('newsCard', $data);
    }
}

