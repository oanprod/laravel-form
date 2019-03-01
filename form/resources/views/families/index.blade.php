@extends('template')
@section('content')
    <h1>Families</h1>

    @foreach ($families as $family)
        <p>{{ $family->name }}</p>
        <p>{{ $family->description }}</p>
        <p>{{ $family->category->description }}</p>
        <hr>
    @endforeach
@endsection
