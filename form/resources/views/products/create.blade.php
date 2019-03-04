@extends('template')
@section('content')
    <h1>Create a new product</h1>

    <form method="POST" action="/products" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="family">Family : </label>
            </div>
            <div class="col-md-3">
                <select name="family" id="family" style="width:100%">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="category">Colors : </label>
            </div>
            <div class="col-md-3">
                <select name="colors[]" id="category" style="width:100%" multiple>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="name">Name : </label>
            </div>
            <div class="col-md-3">
                <input type="text" name="name" id="name" style="width:100%" placeholder="Product name">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="price">Price : </label>
            </div>
            <div class="col-md-3">
                <input type="text" name="price" id="price" style="width:100%" placeholder="Product price">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="description">Description : </label>
            </div>
            <div class="col-md-3">
               <textarea type="text" name="description" style="width:100%" placeholder="Product description"></textarea>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="description">Picture : </label>
            </div>
            <div class="col-md-3">
                <input type="file" name="picture" style="width:100%">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <button type="submit">Create product</button>
            </div>
        </div>
    </form>
@endsection