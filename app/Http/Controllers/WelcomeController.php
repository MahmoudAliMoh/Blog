<?php

namespace App\Http\Controllers;


use App\Contracts\Blog\BlogServiceContract;

class WelcomeController extends Controller
{

    /**
     * Instance from BlogServiceContract
     * @var $blogService
     */
    protected $blogService;


    /**
     * WelcomeController constructor.
     * @param BlogServiceContract $blogService
     */
    public function __construct(BlogServiceContract $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Show the application welcom page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = $this->blogService->list()['data'];
        return view('welcome', compact('blog'));
    }

    public function show($id)
    {
        $item = $this->blogService->show($id)['data'];
        return view('show', compact('item'));
    }
}
