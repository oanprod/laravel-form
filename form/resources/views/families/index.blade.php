@extends('template')
@section('content')
    <h1>Families</h1>

    <ul>
        @foreach ($families as $family)
            <li>Family n°{{ $family->id }}
                <ul>
                    <li><u>Name :</u> {{ $family->name }}</li>
                    <li><u>Descritpion :</u> {{ $family->description }}</li>
                    <li>
                        <u>Categories :</u>
                        <!-- n:n relationship -->
                        <ul>
                            @if (count($family->categories))
                                @foreach ($family->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            @else
                                <li>No category in that family</li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <u>Products :</u>
                        <!-- n:1 relationship -->
                        <ul>
                            @if (count($family->products))
                                @foreach ($family->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            @else
                                <li>No product in that family</li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
