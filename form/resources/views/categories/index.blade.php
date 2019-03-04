@extends('template')
@section('content')
    <h1>Categories</h1>

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
