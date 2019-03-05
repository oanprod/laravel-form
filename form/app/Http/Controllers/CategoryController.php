<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * List Forms
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $all = true;

        $categories = Category::all();

        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);    }

    /**
     * Create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('categories.create', ['current' => 'categories']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        $category = new Category();

        $category->name = request('name');
        $category->description = request('description');
        $category->save();

        $categories = Category::all();

        return view('categories.index',  ['current' => 'categories', 'categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update() {
        $all = false;
        $category = Category::find(request()->route('id'));

        $category->name = request('name');
        $category->description = request('description');
        $category->save();

        $categories = Category::where('id', request()->route('id'))->get();

        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete() {
        $all = true;
        $category = Category::find(request()->route('id'));

        $category->delete();

        $categories = Category::all();

        return view('categories.index',  ['current' => 'categories', 'categories' => $categories, 'all' => $all]);
    }
}
