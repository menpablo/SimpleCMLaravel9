<?php

namespace App\Services\BlogPost;

use App\Models\BlogPost;
use Illuminate\Support\ServiceProvider;

class BlogPostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('BlogPostService', function ($app) {
            return new BlogPostService(new BlogPost());
        });
    }
}
