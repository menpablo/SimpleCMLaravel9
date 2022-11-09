<?php

namespace App\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('CommentService', function ($app) {
            return new CommentService(new Comment());
        });
    }
}
