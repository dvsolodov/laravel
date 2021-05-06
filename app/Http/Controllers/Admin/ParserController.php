<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RssSourceRequest;
use App\Models\{
    News,
    Category,
    Source,
};
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Добавление новостей',
        ];

        return view('admin.addNewsForm', $data);
    }

    public function store(RssSourceRequest $request)
    {
        $xml = XmlParser::load($request->rssSource); //'https://news.yandex.ru/army.rss'
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_link' => ['uses' => 'channel.link'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]'],
        ]);

        $source = new Source();
        $source->url = $data['channel_link'];

        $category = new Category();
        $category->name = $data['channel_title']; 
        $category->slug = str_replace(' ', '_', $data['channel_title']);

        if (!$source->save()) {
            return back()->with('rssMsg', 'Что-то пошло не так!!!');
        }

        if (!$category->save()) {
            return back()->with('rssMsg', 'Что-то пошло не так!!!');
        }

        foreach ($data['items'] as $item) {

            $news = new News();
            $news->title = $item['title'];
            $news->slug = str_replace(' ', '_', $item['title']);
            $news->description = $item['description'];
            $news->source_id = $source->id;
            $news->category_id = $category->id;
            $news->publish_date = date('Y-m-d G:i:s', strtotime($item['pubDate']));

            if (!$news->save()) {
                return back()->with('rssMsg', 'Что-то пошло не так!!!');
            }
        }

        return redirect()->route('admin::news::show::all');
    }
}
