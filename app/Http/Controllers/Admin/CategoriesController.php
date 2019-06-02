<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Categories\CategoryServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Instance from CategoriesServiceContract.
     * @var $categoriesService
     */
    protected $categoriesService;

    /**
     * CategoriesController constructor.
     * @param CategoryServiceContract $categoriesService
     */
    public function __construct(CategoryServiceContract $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoriesService->list()['data'];
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->categoriesService->store($data);
        flash('Category added successfully.')->success();
        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoriesService->show($id)['data'];
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->categoriesService->update($id, $data);

        flash('Category updated successfully.')->success();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoriesService->destroy($id);

        flash('Category deleted successfully.')->success();
        return redirect()->route('categories.index');
    }
}
