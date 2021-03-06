<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

}

