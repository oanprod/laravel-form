@extends('template')
@section('content')
    <h1>Products</h1>

    <ul>
    @foreach ($products as $product)
        <li>Product n°{{ $product->id }}
            <ul>
                <li><u>Name :</u> {{ $product->name }}</li>
                <li><u>Description :</u> {{ $product->description }}</li>
                <li>
                    <u>Family :</u> {{ $product->family->name }}
                    <!-- 1:n relationship -->
                </li>
                <li>
                    <u>Colors :</u>
                    <!-- n:n relationship -->
                    <ul>
                        @if (count($product->colors))
                            @foreach ($product->colors as $color)
                                <li>{{ $color->name }}</li>
                            @endforeach
                        @else
                            <li>No color for that product</li>
                        @endif
                    </ul>
                </li>
             </ul>
        </li>
    @endforeach
    </ul>
@endsection
