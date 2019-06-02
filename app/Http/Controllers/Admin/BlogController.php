<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Blog\BlogServiceContract;
use App\Contracts\Categories\CategoryServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Instance from BlogServiceContract.
     * @var $blogService
     */
    protected $blogService;

    /**
     * Instance from CategoriesServiceContract.
     * @var $categoriesService
     */
    protected $categoriesService;


    /**
     * BlogController constructor.
     * @param BlogServiceContract $blogService
     * @param CategoryServiceContract $categoriesService
     */
    public function __construct(BlogServiceContract $blogService, CategoryServiceContract $categoriesService)
    {
        $this->blogService = $blogService;
        $this->categoriesService = $categoriesService;
    }

    /**
     * Display a listing of the blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = $this->blogService->list()['data'];
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoriesService->list()['data'];
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->blogService->store($data);
        flash('Blog added successfully.')->success();
        return redirect()->route('blog.index');
    }


    /**
     * Show the form for editing the specified blog.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesService->list()['data'];
        $blog = $this->blogService->show($id)['data'];
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->blogService->update($id, $data);

        flash('Blog updated successfully.')->success();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->destroy($id);

        flash('Blog deleted successfully.')->success();
        return redirect()->route('blog.index');
    }
}
