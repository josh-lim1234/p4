@extends('layouts.master')

@section('title')
    Add a photo
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif
<div class='container'>
    <div class="post-a-comment-area mb-30 clearfix">
        <h4 class="mb-50">Add a New Post</h4>
        <div class="contact-form-area">
            <form method='POST' action='/photos'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for='title'>* Title</label>
                        <input type='text' name='title' id='name' value='{{ old('title') }}' class="form-control" placeholder="Title*">
                        @include('modules.field-error', ['field' => 'title'])
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for='restaurant_id'>* Restaurant</label>
                        <select name='restaurant_id' class="form-control">
                            <option value='' >Choose one...</option>
                            @foreach($restaurants as $restaurant)
                                <option value='{{ $restaurant->id }}' {{ (old('restaurant_id') == $restaurant->id) ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'restaurant_id'])                              
                    </div>
                    <div class="col-12">
                        <label for='image'>* Image URL</label>
                        <input type='text'
                               name='image'
                               id='image'
                               value='{{ old('image') }}' class="form-control" placeholder="Image URL">
                        @include('modules.field-error', ['field' => 'image'])
                    </div>
                    <div class="col-12">
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                    <div class="col-12"> 
                        <label>Diets</label>
                        <ul class='checkboxes'>
                            @foreach($diets as $dietId => $dietName)
                                <li><label><input
                                    {{ (in_array($dietId, old('diets', []) )) ? 'checked' : '' }}
                                    type='checkbox'
                                    name='diets[]'
                                    value='{{ $dietId }}'> {{ $dietName }}</label></li>
                            @endforeach
                        </ul>   
                    </div>
                 
                    <div class="col-12">
                        <button class="btn bueno-btn mt-30" type="submit" value='Add'>Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection