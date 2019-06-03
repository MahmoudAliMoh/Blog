<?php

namespace App\Http\Controllers;

use App\Contracts\Comments\CommentServiceContract;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Instance from CommentsServiceContract
     * @var $commentsService
     */
    protected $commentsService;


    /**
     * CommentsController constructor.
     * @param CommentServiceContract $commentsService
     */
    public function __construct(CommentServiceContract $commentsService)
    {
        $this->middleware('auth');
        $this->commentsService = $commentsService;
    }


    /**
     * Store comment.
     *
     * @param $id
     * @param $request
     * @return mixed
     */
    public function store($id, Request $request)
    {
        $data = $request->all();
        $this->commentsService->store($id, $data);

        flash('Comment added successfully.')->success();
        return redirect()->back();
    }
}
