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
<div class='container'>
    <div class="post-a-comment-area mb-30 clearfix">
        <h4 class="mb-50">Edit {{ $photo->title }}</h4>
        <div class="contact-form-area">
                <form method='POST' action='/photos/{{ $photo->id }}'>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="row">
                    <p>*Required</p>
                    <div class="col-12">
                        <input type='text'
                               name='image'
                               id='image'
                               value='{{ old('image', $photo->image) }}'
                               class="form-control" 
                               placeholder="Image URL*">
                        @include('modules.field-error', ['field' => 'image'])
                    </div>
                    <div class="col-12">
                        <textarea
                               name='description'
                               class="form-control"
                               id='description'            
                               placeholder="Description">
                               {{ old("description", $photo->description) }}
                        </textarea>
                        @include('modules.field-error', ['field' => 'description'])
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type='text' name='title' id='name' value='{{ old('title', $photo->title) }}' class="form-control" placeholder="Title*">
                        @include('modules.field-error', ['field' => 'title'])
                    </div>
                    <div class="col-12 col-lg-6">
                        <select name='restaurant_id' class="form-control">
                            <option value='' >Restaurant*</option>
                            @foreach($restaurants as $restaurant)
                                <option value='{{ $restaurant->id }}' {{ (old('restaurant_id', $photo->restaurant->id) == $restaurant->id) ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        @include('modules.field-error', ['field' => 'restaurant_id'])                              
                    </div>
                    <div class="col-12"> 
                        <label>Diets*</label>
                        <ul class='checkboxes'>
                    @foreach($diets as $dietId => $dietName)
                        <li><label><input {{ (in_array($dietId, $dietsForThisPhoto)) ? 'checked' : '' }}
                                          type='checkbox'
                                          name='diets[]'
                                          value='{{ $dietId }}'> {{ $dietName }}</label></li>
                    @endforeach
                        </ul>
                        @include('modules.field-error', ['field' => 'diets'])     
                    </div>
                    <div class="col-12">
                        <input type='submit' value='Save changes' class='btn btn-primary'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
