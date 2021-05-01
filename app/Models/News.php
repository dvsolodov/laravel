<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'text',
        'category_id',
        'source_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function source()
    {
        return $this->belongsTo(Source::class); 
    }

    public function getAllFromCategory(string $categoryName): array 
    {
        $data = [];
        $category = Category::where('slug', $categoryName)->first();
        $data['news'] = $category->news()->get();        
        $data['cat'] = $category->name; 

        return $data;
    }

    public function getOne(string $news): object 
    {
        return self::where('slug', $news)->first();
    }
}

