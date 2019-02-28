@extends('template')
@section('content')
    <h1>Categories</h1>

    @foreach ($products as $product)
        <p>{{ $product->name }}</p>
        <p>{{ $product->description }}</p>
        <p>{{ $product->category->name }}</p>
        <hr>
    @endforeach
@endsection
