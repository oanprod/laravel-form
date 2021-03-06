<?php

namespace App\Http\Controllers;

use App\Color;
use App\Family;
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

        return view('products.index',  ['current' => 'products', 'products' => $products]);    }

    /**
     * Create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $families = Family::all();
        $colors = Color::all();

        return view('products.create', ['current' => 'products', 'families' => $families, 'colors' => $colors]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        $product = new Product();

        $product->name = request('name');
        $product->description = request('description');
        $product->family_id = request('family');
        $product->price = request('price');

        //Picture
        $destinationPath = 'images';
        $file = request('picture');
        $originalName = $file->getClientOriginalName();

        $file->move($destinationPath, $originalName);

        $product->picture = $destinationPath . '/' . $originalName;

        $product->save();

        //update pivot table
        foreach (request('colors') as $color) {
            $product->colors()->attach($color);
        }

        $products = Product::all();

        return view('products.index',  ['current' => 'products', 'products' => $products]);
    }
}
