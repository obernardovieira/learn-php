@extends('layouts.app')
@section('content')

    @include('common.errors')

    <a href="{{ url('/categories') }}">Categories</a>
    <a href="{{ url('/items') }}">Items</a>

@endsection