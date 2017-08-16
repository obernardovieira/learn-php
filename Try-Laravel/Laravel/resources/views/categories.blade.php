@extends('layouts.app')
@section('content')

    @include('common.errors')

    <form action="{{ url('categories') }}" method="POST">
        {{ csrf_field() }}
        <label for="name">Category Name</label><input id="name" name="name"/>
        <input type="submit" value="Add Category"/>
    </form>

@endsection