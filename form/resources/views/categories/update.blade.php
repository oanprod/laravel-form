@extends('template')
@section('content')
    <h1>Update a new category</h1>

    <form method="POST" action="/category/{{ $category->id }}/update">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="family">Category : <em style="color:darkred">*</em></label>
            </div>
            <div class="col-md-3">
                <input type="text" name="name" placeholder="Category name" value="{{ $category->name }}" required>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="family">Description : <em style="color:darkred">*</em></label>
            </div>
            <div class="col-md-3">
               <textarea type="text" name="description" style="width:100%" placeholder="Category description" required>{{ $category->description }}</textarea>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <em style="color:darkred">* Mandatory fields</em>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <button class="btn btn-primary" type="submit">Update category</button>
            </div>
        </div>
    </form>
@endsection