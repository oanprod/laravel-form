@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h1>Products</h1>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" href="/product/create" title="Create a new product" role="button">
                Create a new product
            </a>
        </div>
    </div>

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
                <li>
                    <u>Picture :</u>
                    @if ($product->picture)
                        <img src="{{ $product->picture }}" style="width:10%; height:10%">
                    @else
                        No picture for this product
                    @endif
                </li>
             </ul>
        </li>
    @endforeach
    </ul>
@endsection
