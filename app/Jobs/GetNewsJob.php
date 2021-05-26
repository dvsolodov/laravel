<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{
    Source,
    News
};
use App\Http\Controllers\Admin\ParserController;
use Orchestra\Parser\Xml\Facade as XmlParser;

class GetNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $xml = XmlParser::load($this->source->url); //'https://news.yandex.ru/army.rss'
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_link' => ['uses' => 'channel.link'],
            'items' => ['uses' => 'channel.item[title,description,pubDate]'],
        ]);

        foreach ($data['items'] as $item) {
            if (!is_null(News::where('title', $item['title'])->orWhere('description', $item['description'])->first())) {
                continue;
            }

            $news = new News();
            $news->title = $item['title'];
            $news->slug = str_replace(' ', '_', $item['title']);
            $news->description = $item['description'];
            $news->source_id = $this->source->id;
            $news->category_id = $this->source->category_id;
            $news->publish_date = date('Y-m-d G:i:s', strtotime($item['pubDate']));

            if (!$news->save()) {
                info($this->source->url . '| Сохранение новости: что-то пошло не так!!!');
            }
        }
                
    }
}
