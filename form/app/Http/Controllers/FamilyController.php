<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Family;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Zend\Diactoros\Request;

class FamilyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * List Forms
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $id = request()->route('id');

        if ($id) {
            $families = Family::where('id', $id)->get();
        } else {
            $families = Family::all();
        }

        return view('families.index',  ['families' => $families]);
    }

    /**
     * Create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $categories = Category::all();

        return view('families.create', ['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        $family = new Family();

        $family->name = request('name');
        $family->description = request('description');
        $family->save();

        foreach (request('categories') as $category) {
            $family->categories()->attach($category);
        }

        $families = Family::all();

        return view('families.index',  ['families' => $families]);
    }
}
