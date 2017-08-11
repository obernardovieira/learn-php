<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="{{ url('categories') }}" method="POST">
        {{ csrf_field() }}

        <!-- Task Name -->
        Category Name : <input name="name"/>

        <!-- Add Task Button -->
        <input type="submit" value="Add Category"/>
    </form>

    <!-- TODO: Current Tasks -->
@endsection