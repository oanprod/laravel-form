@extends('template')
@section('content')
    <h1>Create a new Category</h1>

    <form method="POST" action="/colors">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <input type="text" name="name" placeholder="Color name">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
               <input type="text" name="heat" placeholder="Color heat">
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-4">
                <button type="submit">Create color</button>
            </div>
        </div>
    </form>
@endsection