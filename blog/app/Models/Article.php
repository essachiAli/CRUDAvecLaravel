<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'views', 'published',
    ];

    protected $casts = [
        'views' => 'integer',
        'published' => 'boolean'
    ];

    public function getRouteKey()
    {
        return 'slug';
    }
}
