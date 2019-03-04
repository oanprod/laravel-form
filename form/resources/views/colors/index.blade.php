@extends('template')
@section('content')
    <h1>Colors</h1>

    <ul>
        @foreach ($colors as $color)
            <li>Color n°{{ $color->id }}
                <ul>
                    <li><u>Name :</u> {{ $color->name }}</li>
                    <li><u>Heat :</u> {{ $color->heat }}</li>
                    <li>
                        <u>Products :</u>
                        <!-- n:n relationship -->
                        <ul>
                            @if (count($color->products))
                                @foreach ($color->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            @else
                                <li>No product in that familiy</li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
