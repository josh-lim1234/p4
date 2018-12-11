        @foreach($photos as $photo)
<div class="single-slide">
    <!-- Blog Thumbnail -->
    <div class="blog-thumbnail">
    	<a href=><h4>{{ $photo->title }}</h4></a>
        <a href='/photos/{{ $photo->id }}'><img src='{{ $photo->image }}' alt='Cover image for the photo {{ $photo->title }}'></a>
        <ul>
        	<li>by {{ $photo->author }}</li>
        	<li>Added {{ $photo->created_at->format('m/d/y g:ia') }}</li>
    	</ul>
    </div>
</div>
       @endforeach
