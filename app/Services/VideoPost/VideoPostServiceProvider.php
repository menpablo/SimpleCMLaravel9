<?php

namespace App\Services\VideoPost;

use App\Models\VideoPost;
use Illuminate\Support\ServiceProvider;

class VideoPostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('VideoPostService', function ($app) {
            return new VideoPostService(new VideoPost());
        });
    }
}
