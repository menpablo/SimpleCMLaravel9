<?php

namespace App\Services\VideoPost;

use Illuminate\Support\Facades\Facade;

class VideoPostFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'VideoPostService';
    }
}
