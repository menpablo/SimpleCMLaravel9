<?php

namespace App\Services\BlogPost;

use App\Models\BlogPost;
use App\Traits\CrudTrait;

class BlogPostService
{
    use CrudTrait;

    protected $model;

    public function __construct(BlogPost $post)
    {
        $this->model = $post;
    }

    public function getByIdWithComments($id)
    {
        $query = $this->model->query();

        return $query->with('comments')->where('id', $id)->first();
    }
}
