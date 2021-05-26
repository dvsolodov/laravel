<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'url',
        'category_id',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
