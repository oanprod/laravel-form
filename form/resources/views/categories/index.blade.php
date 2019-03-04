@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h1>Categories</h1>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" href="/category/create" title="Create a new category" role="button">
                Create a new category
            </a>
        </div>
    </div>

    <ul>
        @foreach ($categories as $category)
            <li>Category n°{{ $category->id }}
                <ul>
                    <li><u>Name :</u> {{ $category->name }}</li>
                    <li><u>Description :</u> {{ $category->description }}</li>
                    <li>
                        <u>Families :</u>
                        <!-- n:n relationship -->
                        <ul>
                            @if (count($category->families))
                                @foreach ($category->families as $family)
                                    <li>{{ $family->name }}</li>
                                @endforeach
                            @else
                                <li>No family in that category</li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
