@extends('layouts.master')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">
            @include('photos._photo')
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
@endsection('content')
@section('content2')
<!-- ##### Catagory Area Start ##### -->
<div class="post-catagory section-padding-100-0 mb-70">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Post Catagory -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-post-catagory mb-30">
                    <img src="img/bg-img/4.jpg" alt="">
                    <!-- Content -->
                    <div class="catagory-content-bg">
                        <div class="catagory-content">
                            <a href="#" class="post-title">Restaurants</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Post Catagory -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-post-catagory mb-30">
                    <img src="img/bg-img/6.jpg" alt="">
                    <!-- Content -->
                    <div class="catagory-content-bg">
                        <div class="catagory-content">
                            <a href="#" class="post-title">Cuisines</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Catagory Area End ##### -->
    <!-- ##### Big Posts Area Start ##### -->
    <div class="big-posts-area mb-50">
        <hr>
        @if(Auth::check())
            <div class="container">
                <h1>My Posts</h1>
                <!-- Single Big Post Area -->
                <div class="row align-items-center">
                    @include('photos._post')
                </div>
            </div>
        @endif
    </div>
    <!-- ##### Big Posts Area End ##### -->
@endsection('content2')
