@foreach($cuisines as $cuisine)
<!-- Single Post Catagory -->
<div class="col-12 col-sm-6 col-lg-4">
    <div class="single-post-catagory mb-30">
        <img src="{{$cuisine->image}}" alt="{{$cuisine->name}}">
        <!-- Content -->
        <div class="catagory-content-bg">
            <div class="catagory-content">
                <a href="#" class="post-tag"></a>
                <a href="#" class="post-title">{{$cuisine->name}}</a>
            </div>
        </div>
    </div>
</div>
@endforeach            