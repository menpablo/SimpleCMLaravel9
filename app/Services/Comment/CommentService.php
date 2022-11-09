<?php

namespace App\Services\Comment;

use App\Models\Comment;
use App\Models\Interfaces\Post;
use App\Traits\CrudTrait;

class CommentService
{
    use CrudTrait;

    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    public function addCommentToPost(Post $post, $comentData)
    {
        $comment = $this->save($comentData);

        return $post->comments()->save($comment);
    }
}
