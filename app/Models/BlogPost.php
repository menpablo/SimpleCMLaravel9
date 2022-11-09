<?php

namespace App\Models;

use App\Models\Interfaces\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model implements Post
{
    protected $fillable = [
        'title',
        'body',
    ];

    use HasFactory;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
