@extends('layouts.master')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <!-- ##### Catagory Post Area Start ##### -->
    <div class="catagory-post-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Area -->
                <div class="col-12 col-lg-8 col-xl-9">
                    @include('restaurants._restaurant')
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Catagory Post Area End ##### -->
@endsection('content')
@section('content2')
@endsection('content2')
