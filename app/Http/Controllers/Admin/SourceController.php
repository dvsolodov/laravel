<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RssSourceRequest;
use App\Models\{
    Category,
    Source,
};
use App\Jobs\GetNewsJob;

class SourceController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Добавление rss-источника',
            'categories' => Category::all(),
        ];

        return view('admin.addSourceForm', $data);
    }

    public function store(RssSourceRequest $request)
    {
        $source = new Source();
        $source->fill($request->all());

        if ($source->save()) {
            GetNewsJob::dispatch($source);
            return redirect()
                ->route('admin::source::add::form')
                ->with('sourceMsg', 'Добавлен rss-источник: ' . $source->url);
        } else {
            return back()->with('sourceMsg', 'Что-то пошло не так!!!');
        }

    }

}
