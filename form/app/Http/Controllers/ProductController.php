<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends BaseController
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
            $products = Product::where('id', $id)->get();
        } else {
            $products = Product::all();
        }

        return view('products.index',  ['products' => $products]);    }

    /**
     * Create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $categories = Category::all();
        $colors = Color::all();

        return view('products.create', ['categories' => $categories, 'colors' => $colors]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        $product = new Product();

        $product->name = request('name');
        $product->description = request('description');
        $product->category_id = request('category');
        $product->price = request('price');


        $product->save();

        $products = Product::all();

        return view('products.index',  ['products' => $products]);
    }
}
