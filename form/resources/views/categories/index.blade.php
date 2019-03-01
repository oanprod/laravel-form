@extends('template')
@section('content')
    <h1>Categories</h1>

    @foreach ($categories as $category)
        <p>{{ $category->name }}</p>
        <p>{{ $category->description }}</p>


        @foreach ($category->products() as $product)
            {{ dd($product) }}
        @endforeach
        <hr>
    @endforeach
@endsection
