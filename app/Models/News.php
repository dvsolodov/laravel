<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getAllFromCategory(string $categoryName): array 
    {
        $data = [];
        $data['news'] = \DB::table('news')
            ->join('sources', 'news.source_id', '=', 'sources.id')
            ->join('category', 'news.category_id', '=', 'category.id')
            ->select('title', 'description as text', 'news.slug as slug', 'sources.url as url', 'category.name as category', 'category.slug as catSlug')
            ->where('category.slug', $categoryName)
            ->get();
        $data['cat'] = \DB::table('category')
            ->select('name')
            ->where('slug', $categoryName)
            ->get();

        return $data;
    }

    public function getOne(string $news): object 
    {
        $data = \DB::table('news')
            ->join('sources', 'news.source_id', '=', 'sources.id')
            ->join('category', 'news.category_id', '=', 'category.id')
            ->select('title', 'text', 'news.slug as slug', 'sources.url as url', 'category.name as category', 'category.slug as catSlug')
            ->where('news.slug', $news)
            ->first();

        return $data;
    }
}

