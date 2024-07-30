@extends('layouts.front')
@section('content')
<div class="inside_outer detail">

<div class="container">
	<div class="banner_container">
		<div class="banner_content detail">
			<ul>
				<li><a href="{{url('/')}}">home</a></li>
				<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
				<li>video</li>
			</ul>
		</div>
	</div>
</div>




<div class="inside_page gallery">
	<div class="container">
		<div class="gallery_container">
			<!--<h2>Come & Feel the part of Excellency</h2>-->
			<ul>
				<li><a href="{{url('/galleryartwork')}}">Artworks</a></li>
				<li><a class="active" href="{{url('/galleryvideo')}}">Videos</a></li>
				<li><a href="{{url('/galleryexhibition')}}">Exhibitions</a></li>
				<li><a href="{{url('/upcomingexhibition')}}">Upcoming Exhibitions</a></li>
			</ul>	
			<div class="gallery_video video">
				@php $gallery= fetchGallery('videos') @endphp
				@if($gallery)
				<ul>
					@foreach($gallery as $key=>$value)
					<li>
						<div class="video_box">
							<!-- <img src="{!! asset('images/banner/'.$value->image) !!}"> -->
							<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$value->url}}?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							<!-- <a class="video_btn" href="#"><img src="{{ asset('front/images/vido_btn.png')}}"></a> -->
						</div>
						<p>{!! $value->description !!}</p>
					</li>
					@endforeach			
				</ul>
				@endif
			</div>
		</div>
	</div>
</div>


</div> 


 
@section('content')