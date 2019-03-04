@extends('template')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <h1>Families</h1>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" href="/family/create" title="Create a new family" role="button">
                Create a new family
            </a>
        </div>
    </div>
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
