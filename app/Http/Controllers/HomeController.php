<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Главная страница', 
            'activePage' => 'Главная',
            'menu' => (new Menu())->get(),
        ];

        return view('home', $data);
    }
}
