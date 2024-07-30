@extends('layouts.front')
@section('content')
<div class="inside_outer detail">
	<div class="container">
		<div class="banner_container">
			<div class="banner_content detail">
				<ul>
					<li><a href="{{url('/')}}">home</a></li>
					<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
					<li>upcoming exhibitions</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="inside_page gallery">
		<div class="container">
			<div class="gallery_container"> 
				<ul>
					<li><a href="{{url('/galleryartwork')}}">Artworks</a></li>
					<li><a href="{{url('/galleryvideo')}}">Videos</a></li>
					<li><a href="{{url('/galleryexhibition')}}">Exhibitions</a></li>
					<li><a class="active"  href="{{url('/upcomingexhibition')}}">Upcoming Exhibitions</a></li>
				</ul>	
				<div class="gallery_video art docs-pictures">
				@php $gallery= fetchGallery('upcoming_exhibitions') @endphp
				@if($gallery)
					<ul>
					@foreach($gallery as $key=>$value)
						<li>
							<div class="video_box">
								<img data-original src="{!! asset('images/banner/'.$value->image) !!}">
							</div>
						</li>
					@endforeach				
					</ul>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection