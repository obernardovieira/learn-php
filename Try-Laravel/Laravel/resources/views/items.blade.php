@extends('layouts.app')
@section('content')

    @include('common.errors')

    <form action="{{ url('items') }}" method="POST">
        {{ csrf_field() }}
        <label for="category">Category</label>
        <select id="category" name="category">
            @foreach ($categories as $category)
                <option value="{{ strtolower($category->name) }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="name">Item Name</label><input id="name" name="name"/>
        <label for="value">Item Value</label><input id="value" name="value" type="number"/>
        <input type="submit" value="Add Item"/>

    </form>

@endsection