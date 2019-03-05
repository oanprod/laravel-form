@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h1>Categories</h1>
        </div>
        @if ($all)
            <div class="col-md-2">
                <a class="btn btn-primary" href="/category/create" title="Create a new category" role="button">
                    Create a new category
                </a>
            </div>
        @endif
    </div>

    <ul>
        @foreach ($categories as $category)
            <li>
                @if ($all)
                    <a href="/category/{{ $category->id }}">Category n°{{ $category->id }}</a>
                @else
                    Category n°{{ $category->id }}
                @endif
                <ul>
                    <li><b>Name :</b> {{ $category->name }}</li>
                    <li><b>Description :</b> {{ $category->description }}</li>
                    <li>
                        <b>Families :</b>
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
                @if (!$all)
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <a class="btn btn-primary" href="/category/{{ $category->id }}/update" title="Update category {{ $category->id }}" role="button">
                                Update
                            </a>
                            <a class="btn btn-danger" href="/category/{{ $category->id }}/delete" title="Delete category {{ $category->id }}" role="button">
                                Delete
                            </a>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
