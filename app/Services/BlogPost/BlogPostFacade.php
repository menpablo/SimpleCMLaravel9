<?php

namespace App\Services\BlogPost;

use Illuminate\Support\Facades\Facade;

class BlogPostFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BlogPostService';
    }
}
