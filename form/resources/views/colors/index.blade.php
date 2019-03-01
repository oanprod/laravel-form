@extends('template')
@section('content')
    <h1>Colors</h1>

    @foreach ($colors as $color)
        <p>{{ $color->name }}</p>
        <p>{{ $color->heat }}</p>

        @foreach ($color->products()->get() as $product)
            {{ $product->name }}
            <br />
        @endforeach

        <hr>
    @endforeach
@endsection
