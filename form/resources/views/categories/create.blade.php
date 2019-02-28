@extends('template')
@section('content')
    <h1>Create a new Category</h1>

    <form method="POST" action="/categories">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <input type="text" name="name" placeholder="Category name">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
               <textarea type="text" name="description" placeholder="Category description"></textarea>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-4">
                <button type="submit">Create category</button>
            </div>
        </div>
    </form>
@endsection