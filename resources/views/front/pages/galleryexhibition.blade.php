@extends('layouts.front')
@section('content')
<div class="inside_outer detail">
	<div class="container">
		<div class="banner_container">
			<div class="banner_content detail">
				<ul>
					<li><a href="{{url('/')}}">home</a></li>
					<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
					<li>exhibitions</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="inside_page">
		<div class="container">
			<div class="gallery_container">
				<!--<h2>Come & Feel the part of Excellency</h2>-->
				<ul>
					<li><a href="{{url('/galleryartwork')}}">Artworks</a></li>
					<li><a href="{{url('/galleryvideo')}}">Videos</a></li>
					<li><a class="active" href="{{url('/galleryexhibition')}}">Exhibitions</a></li>
					<li><a href="{{url('/upcomingexhibition')}}">Upcoming Exhibitions</a></li>
					
				</ul>	
				@php $gallery= fetchGallery('exhibitions') @endphp
				@if($gallery)
				<div class="gallery_inside">					 
					@php $i=1; @endphp
					@foreach($gallery as $key=>$value)
					<div class="gallery_art_sec">
						<div class="gallery_image docs-pictures">
							<img src="{!! asset('images/banner/'.$value->image) !!}">
							@php $exImage= getExhibitionImage($value->id); @endphp
							@php if(count($exImage)>0){ @endphp
							@foreach($exImage as $k=>$v)
								<img data-original src="{!! asset('images/exhibition/'.$v->filename) !!}">
							@endforeach
							
							@php } @endphp
							<div class="gallery_overlay">
								<h3>{{$value->title}}</h3>
							</div>
						</div>
						<!-- <div class="gallery_content">
							{!! $value->description !!}
						</div> -->
					</div>	
					@php if($i%2==0){ echo '</div><div class="gallery_inside">';} $i++; @endphp
					@endforeach				
				</div>
				@endif	
			</div>
		</div>
	</div>
</div>

 

@endsection