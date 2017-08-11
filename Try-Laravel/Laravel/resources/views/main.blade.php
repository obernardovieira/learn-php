
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <a href="{{ url('/categories') }}">Categories</a>
    <a href="{{ url('/items') }}">Items</a>

    <!-- TODO: Current Tasks -->
@endsection