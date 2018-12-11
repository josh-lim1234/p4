@extends('layouts.master')

@section('title')
    Edit {{$photo->title}}
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Edit {{ $photo->title }}</h1>

    <form method='POST' action='/photos/{{ $photo->id }}'>
        <div class='details'>* Required fields</div>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title', $photo->title) }}'>
        @include('modules.field-error', ['field' => 'title'])

        <label for='restaurant_id'>* Restaurant</label>
        <select name='restaurant_id'>
            <option value=''>Choose one...</option>
            @foreach($restaurants as $restaurant)
                <option value='{{ $restaurant->id }}' {{ (old('restaurant_id', $photo->restaurant->id) == $restaurant->id) ? 'selected' : '' }}>{{ $restaurant->name }}</option>
            @endforeach
        </select>
        @include('modules.field-error', ['field' => 'restaurant'])

        <label for='image'>* Image</label>
        <input type='text' name='image' id='image' value='{{ old('image', $photo->image) }}'>
        @include('modules.field-error', ['field' => 'image'])

        <label>Diets</label>
        <ul class='checkboxes'>
            @foreach($diets as $dietId => $dietName)
                <li><label><input {{ (in_array($dietId, $dietsForThisPhoto)) ? 'checked' : '' }}
                                  type='checkbox'
                                  name='diets[]'
                                  value='{{ $dietId }}'> {{ $dietName }}</label></li>
            @endforeach
        </ul>

        <input type='submit' value='Save changes' class='btn btn-primary'>
    </form>


@endsection