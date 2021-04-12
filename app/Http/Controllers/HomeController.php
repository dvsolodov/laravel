<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Главная страница', 
            'activePage' => 'Главная',
        ];

        return view('home', $data);
    }
}
