<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<!-- Display Validation Errors -->
@include('common.errors')

<!-- New Task Form -->
<form action="{{ url('items') }}" method="POST">
    {{ csrf_field() }}

    Category :
    <select>
        @foreach ($categories as $category)
            <option value="{{ strtolower($category->name) }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <!-- Task Name -->
    Item Name : <input name="name"/>

    Item Value : <input name="value"/>

    <!-- Add Task Button -->
    <input type="submit" value="Add Item"/>
</form>

<!-- TODO: Current Tasks -->
@endsection