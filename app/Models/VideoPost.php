<?php

namespace App\Models;

use App\Models\Interfaces\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPost extends Model implements Post
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
