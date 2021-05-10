<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\{
    EditNewsRequest,
    CreateNewsRequest,
};
use App\Models\{
        News,
        Category,
        Source,
};
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function showAll()
    {
        $data = [
            'pageTitle' => 'Панель администратора', 
            'news' => News::orderBy('publish_date', 'DESC')->paginate(10),
        ];

        return view('admin.allNews', $data); 
    }

    public function show(int $id)
    {
        $news = News::find($id);
        $data = [
            'pageTitle' => $news->title, 
            'news' => $news,
        ];

        return view('admin.oneNews', $data); 
    }

    public function showEditForm($id)
    {
        $news = News::find($id);
        $data = [
            'pageTitle' => "Редактирование новости: {$news->title}", 
            'news' => $news,
        ];

        return view('admin.editNewsForm', $data); 
    }

    public function edit(EditNewsRequest $request, $id)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        $news->slug = str_replace(' ', '_', $news->title);
        $news->description = $request->description;
        $news->text = $request->text;

        if ($request->hasFile('img')) {
            $news->img = $request->file('img')->store('images/news', 'public');
        }

        $news->save();

        return back()->with('editMsg', 'Новость отредактирована')->withInput();
    }

    public function showCreateForm()
    {
        $data = [
            'pageTitle' => __('newsCreateForm.pageTitle'), 
            'categories' => (new Category())->all(),
            'sources' => (new Source())->all(),
        ];

        return view('admin.createNewsForm', $data); 
    }

    public function create(CreateNewsRequest $request)
    {
        $news = new News();
        $news->fill($request->all());
        $news->slug = str_replace(' ', '_', $news->title);
        $news->publish_date = date('Y-m-d H:i:s', time());
        $news->save();

        return back()->with('createMsg', __('newsCreateForm.newsIsCreated'));
    }

    public function delete($id)
    {
        News::destroy($id);

        return back(); 
    }
}
