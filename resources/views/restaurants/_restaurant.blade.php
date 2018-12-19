@foreach($restaurants as $restaurant)
<!-- Single Blog Post -->
<div class="single-blog-post style-1 d-flex flex-wrap mb-30">
    <!-- Blog Thumbnail -->
    <div class="blog-thumbnail">
        <img src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
        <div class="top-search-area">
            <button type="submit" class="btn"><a href='/restaurants/{{ $restaurant->id }}/edit'>EDIT</a></button>                    
        </div>        
    </div>
    <!-- Blog Content -->
    <div class="blog-content">
        <a href="#" class="post-title">{{$restaurant->name}}</a>
        <div class="post-meta">
            <p>Added {{ $restaurant->created_at->format('m/d/y g:ia') }}</p>
            |
            @foreach ($restaurant->cuisines as $cuisine)
                {{ $cuisine->name }} |   
            @endforeach
        </div>
        <p>{{$restaurant->description}}</p>
    </div>
</div>
@endforeach                    