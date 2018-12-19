@extends('layouts.master')

@section('name')
    Edit {{$restaurant->name}}
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif
<div class='container'>
    <div class="post-a-comment-area mb-30 clearfix">
        <h4 class="mb-50">Edit {{ $restaurant->name }}</h4>
        <div class="contact-form-area">
                <form method='POST' action='/restaurants/{{ $restaurant->id }}'>
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="row">
                    <p>*Required</p>
                    <div class="col-12">
                        <input type='text'
                               name='image'
                               id='image'
                               value='{{ old('image', $restaurant->image) }}'
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
                               {{ old("description", $restaurant->description) }}
                        </textarea>
                        @include('modules.field-error', ['field' => 'description'])
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type='text' name='name' id='name' value='{{ old('name', $restaurant->name) }}' class="form-control" placeholder="Title*">
                        @include('modules.field-error', ['field' => 'name'])
                    </div>
                    <div class="col-12"> 
                        <label>Cuisines*</label>
                        <ul class='checkboxes'>
                    @foreach($cuisines as $cuisineId => $cuisineName)
                        <li><label><input {{ (in_array($cuisineId, $cuisinesForThisRestaurant)) ? 'checked' : '' }}
                                          type='checkbox'
                                          name='cuisines[]'
                                          value='{{ $cuisineId }}'> {{ $cuisineName }}</label></li>
                    @endforeach
                        </ul>
                        @include('modules.field-error', ['field' => 'cuisines'])     
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
