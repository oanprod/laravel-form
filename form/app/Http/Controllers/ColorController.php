<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ColorController extends BaseController
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
            $colors = Color::where('id', $id)->get();
        } else {
            $colors = Color::all();
        }

        return view('colors.index',  ['colors' => $colors]);    }

    /**
     * Create form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('colors.create');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store() {
        $color = new Color();

        $color->name = request('name');
        $color->heat = request('description');


        $color->save();

        $colors = Color::all();

        return view('colors.index',  ['colors' => $colors]);
    }
}