@extends('template')
@section('content')
    <h1>Delete a category</h1>

    <form method="POST" action="/category/{{ $category->id }}/delete">

        {{ csrf_field() }}

        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
               Are you sure you want to delete category named {{ $category->name }} ?
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-5">
                <a  class="btn btn-primary"href="/category/{{ $category->id }}/" title="Go back to category">No</a>
                <button class="btn btn-danger" type="submit">Yes</button>
            </div>
        </div>
    </form>
@endsection