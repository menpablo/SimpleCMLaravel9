<?php

namespace App\Services\VideoPost;

use App\Models\VideoPost;
use App\Traits\CrudTrait;

class VideoPostService
{
    use CrudTrait;

    protected $model;

    public function __construct(VideoPost $post)
    {
        $this->model = $post;
    }

    public function getByIdWithComments($id)
    {
        $query = $this->model->query();

        return $query->with('comments')->where('id', $id)->first();
    }
}
