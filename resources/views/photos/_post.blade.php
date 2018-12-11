@foreach($myphotos as $photo)
	<div class="row align-items-center">
	    <div class="col-12 col-md-6">
	        <div class="big-post-thumbnail mb-50">
	            <img src="{{$photo->image}}" alt="">
	        </div>
	    </div>
	    <div class="col-12 col-md-6">
	        <div class="big-post-content text-center mb-50">
	            <a href="#" class="post-tag">From <b>{{$photo->restaurant->name}}</b></a>
	            <a href="#" class="post-title">{{$photo->title}}</a>
	            <div class="post-meta">
	                <a href="#" class="post-date"> {{ $photo->created_at->format('m/d/y') }}</a>
	                <a href="#" class="post-author">By {{ $photo->user->name }}</a>
	            </div>
	            <p>{{$photo->description}}</p>
	            <a href="/photos/{{$photo->id}}" class="btn bueno-btn">Read More</a>
	        </div>
	    </div>
	</div>
@endforeach