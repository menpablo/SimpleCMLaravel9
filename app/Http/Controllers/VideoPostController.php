<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\VideoPostRequest;
use App\Models\BlogPost;
use App\Models\VideoPost;
use App\Services\Comment\CommentFacade;
use App\Services\VideoPost\VideoPostFacade;
use Nette\NotImplementedException;

class VideoPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoPostFacade::paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        throw new NotImplementedException();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoPostRequest $request)
    {
        return VideoPostFacade::save($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VideoPost $video)
    {
        $video->comments;

        return $video;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        throw new NotImplementedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoPostRequest $request, $id)
    {
        return VideoPostFacade::update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoPost $video)
    {
        return $video->delete($video->id);
    }

    public function listComments(BlogPost $post)
    {
        return $post->comments;
    }

    public function addComment(BlogPost $post, CommentRequest $request)
    {
        return CommentFacade::addCommentToPost($post, $request->all());
    }
}
