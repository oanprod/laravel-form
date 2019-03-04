@extends('template')
@section('content')
    <h1>Create a new family</h1>

    <form method="POST" action="/families">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="categories">Categories : </label>
            </div>
            <div class="col-md-3">
                <select name="categories[]" id="categories" style="width:100%" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="name">Name : </label>
            </div>
            <div class="col-md-2">
                <input type="text" name="name" id="name" placeholder="Product name">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="description">Description : </label>
            </div>
            <div class="col-md-2">
               <textarea type="text" name="description" placeholder="Product description"></textarea>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-4">
                <button type="submit">Create family</button>
            </div>
        </div>
    </form>
@endsection