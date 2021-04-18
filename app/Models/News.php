<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private $allNews = [
            [
                'link' => 'world',
                'cat' => 'В мире',
                'title' => 'Первая новость',
                'slug' => 'pervaya-novost-iz-v-mire',
                'desc' => 'Sit totam omnis repellat tempora dolor.',
                'text' => 'Sit totam omnis repellat tempora dolor. Esse officiis doloribus dolorem amet praesentium Vero magnam eaque maiores itaque fugiat facilis, neque! Velit nesciunt doloribus ea quae vitae Assumenda delectus eum ducimus.',
            ],
            [
                'link' => 'world',
                'cat' => 'В мире',
                'title' => 'Вторая новость',
                'slug' => 'vtoraya-novost-iz-v-mire',
                'desc' => 'Sit totam omnis repellat tempora dolor.',
                'text' => 'Sit totam omnis repellat tempora dolor. Esse officiis doloribus dolorem amet praesentium Vero magnam eaque maiores itaque fugiat facilis, neque! Velit nesciunt doloribus ea quae vitae Assumenda delectus eum ducimus.',
            ],
            [
                'link' => 'business',
                'cat' => 'Экономика',
                'title' => 'Первая новость',
                'slug' => 'pervaya-novost-iz-business',
                'desc' => 'Sit totam omnis repellat tempora dolor.',
                'text' => 'Sit totam omnis repellat tempora dolor. Esse officiis doloribus dolorem amet praesentium Vero magnam eaque maiores itaque fugiat facilis, neque! Velit nesciunt doloribus ea quae vitae Assumenda delectus eum ducimus.',
            ],
    ];

    public function getAllFromCategory(string $categoryName): array
    {
        $newsFromCategory = ['cat' => '', 'news' => []];

        foreach ($this->allNews as $newsCategory => $news) {

            if ($categoryName == $news['link']) {
                $newsFromCategory ['news'][] = [
                    'category' => $categoryName,
                    'id' => $news,
                    'title' => $news['title'],
                    'slug' => $news['slug'],
                    'desc' => $news['desc'],
                ];

                if (empty($newsFromCategory['category'])) {
                    $newsFromCategory['cat'] = $news['cat'];
                }
            }
        }

        return $newsFromCategory;
    }

    public function getOne(string $news): array
    {
        $fullNews = [];

        foreach ($this->allNews as $newsCategory => $n) {
            if ($n['slug'] == $news) {
                $fullNews = [
                    'link' => $n['link'],
                    'cat' => $n['cat'],
                    'title' => $n['title'],
                    'text' => $n['text'],
                ];
                break;
            }
        }

        return $fullNews;
    }
}

