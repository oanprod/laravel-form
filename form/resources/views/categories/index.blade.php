@extends('template')
@section('content')
    <h1>Categories</h1>

    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <p>{{ $category->description }}</p>

        @foreach ($category->families as $family)
            <p>{{ $family->name }}</p>
        @endforeach

        <hr>
    @endforeach
@endsection
