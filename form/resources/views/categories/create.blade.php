@extends('template')
@section('content')
    <h1>Create a new category</h1>

    <form method="POST" action="/categories">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="family">Category : <em style="color:darkred">*</em></label>
            </div>
            <div class="col-md-3">
                <input type="text" name="name" placeholder="Category name" required>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-2">
                <label for="family">Description : <em style="color:darkred">*</em></label>
            </div>
            <div class="col-md-3">
               <textarea type="text" name="description" style="width:100%" placeholder="Category description" required></textarea>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <em style="color:darkred">* Mandatory fields</em>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <button class="btn btn-primary" type="submit">Create category</button>
            </div>
        </div>
    </form>
@endsection