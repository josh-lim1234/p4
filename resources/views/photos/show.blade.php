@extends('layouts.master')

@section('title')
    {{ $photo->title }}
@endsection


@section('content')
	<section class="post-news-area section-padding-100-0 mb-70">
	        <div class="container">
        <div class="top-header-area bg-img bg-overlay" style="background-image: url(/img/bg-img/header.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <div class="col-12 col-sm-6">
                        <!-- Top Social Info -->	
                    </div>
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
                       	@if(Auth::check() AND Auth::user()->name == $photo->user->name)
	                        <div class="top-search-area">
                                <button type="submit" class="btn"><a href='/photos/{{ $photo->id }}/edit'>EDIT</a></button>                    
                                <button type="submit" class="btn"><a href='/photos/{{ $photo->id }}/delete'>DELETE</a></button>
	                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>        	
	            <div class="row justify-content-center">
	                <!-- Post Details Content Area -->
	                <div class="col-12 col-lg-12 col-xl-12">
	                    <div class="post-details-content mb-100">
	                        <h4 class="post-title">{{ $photo->title }}</h4>	                  
	                        <div class="blog-thumbnail mb-50">
	                            <img src="{{ $photo->image }}" alt="{{ $photo->title }}">
	                        </div>
	                        <div class="blog-content">
	                            <a href="#" class="post-tag">From {{ $photo->restaurant->name }}</a>

	                            <div class="post-meta mb-50">
	                                <a href="#" class="post-date"> {{ $photo->created_at->format('m/d/y') }}</a>
	                                <a href="#" class="post-author">By {{ $photo->user->name }}</a>
	                            </div>
	                            <h4>Dietary Requirements</h4><p>|
								@foreach ($photo->diets as $diet)
									{{ $diet->name }} |	 
								@endforeach	                          
								</p>
	                            <h4>Cuisines</h4><p>| 
								@foreach ($photo->restaurant->cuisines as $cuisine)
									{{ $cuisine->name }} | 	 
								@endforeach	                          
								</p>		
	                            <p>{{ $photo->description }}</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	</section>
@endsection
