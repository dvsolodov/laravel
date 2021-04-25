<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Панель администратора', 
            'news' => News::orderBy('category_id')->get(),
        ];

        return view('admin.panel', $data); 
    }

    public function show(int $id)
    {
        $news = News::find($id);
        $data = [
            'pageTitle' => $news->title, 
            'news' => $news,
        ];

        return view('admin.news', $data); 
    }

    public function showEditForm($id)
    {
        $news = News::find($id);
        $data = [
            'pageTitle' => "Редактирование новости: {$news->title}", 
            'news' => $news,
        ];

        return view('admin.editForm', $data); 
    }

    public function edit(Request $request, $id)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->slug = str_replace(' ', '_', $news->title);
        $news->description = $request->description;
        $news->text = $request->text;
        $news->category_id = $request->category_id;
        $news->source_id = $request->source_id;
        $news->publish_date = $request->publish_date;
        $news->save();

        return back()->with('editMsg', 'Новость отредактирована')->withInput();
    }

    public function delete($id)
    {
        News::destroy($id);

        return back(); 
    }
}
