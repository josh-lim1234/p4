@extends('layouts.master')

@push('head')
    <link href='/css/photos/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $photo->title }}
@endsection

@section('content')
    <div class="container">
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $photo->title }}</strong>?</p>

        <img src='{{ $photo->image }}' class='image' alt='Image for {{ $photo->title }}'>

        <form method='POST' action='/photos/{{ $photo->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
        </form>

        <p class='cancel'>
            <a href='/photos/{{ $photo->id }}'>No, I changed my mind.</a>
        </p>
    </div>
@endsection