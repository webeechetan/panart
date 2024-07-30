@extends('layouts.front')
@section('content')
<div class="inside_outer detail">
<div class="container">
	<div class="banner_container">
		<div class="banner_content detail">
			<ul>
				<li><a href="{{url('/')}}">home</a></li>
				<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
				<li>about us</li>
			</ul>
		</div>
	</div>
	<!-- <div class="about_image">
		<img src="{{ asset('front/images/brush_img.png')}}">
	</div> -->
	{!! $info->short_description !!}
	<!-- <div class="about_box">
		<h2>about us</h2>
		<p>Nothing excites an artist more than the ability to translate their imagination onto a medium to be appreciated by connoisseurs and peers alike. It is essential to recreate the entire spectrum of colour and a plethora of shapes that are conceived in the mind's eye for a work of art to reflect an artist's pure expression.</p>
		<p>At Panart, with our in-depth domain knowledge and vast manufacturing experience in the art supplies industry, we have created and curated a repertoire of premium artistry tools that can help an artist push possibilities in art even further. Lovingly handcrafted and finished to perfection, each product is an amalgamation of aesthetics, functionality, skill, and precision.</p>
		<p>Made in an ultra-modern manufacturing set up and conforming to international quality certifications like ISO 9001, ISO 14001, and OHSAS 18001, our products have set new benchmarks for quality. We are confident that you will be delighted by the standards and variety of artistry tools that we offer.</p>
	</div> -->
</div>
	{!! $info->description !!}
<!-- <div class="container">
	<div class="mission_container">
		<div class="mission_heading">
			<h1>mission</h1>
		</div>
		<div class="mission_content">
			<p>Our purpose at Panart - to service the global artist community - hinges on three main planks of <span>quality</span>, <span>affordability</span>, and <span>respect</span> for the environment. Our products bear their genesis to the in-depth understanding of an artist’s setting and are specifically tuned to enhance the practice of their art.</p>
		</div>
	</div>
</div>


<div class="container">
	<div class="director_container">
		<div class="director_left">
			<img src="{{ asset('front/images/director_img.png')}}">
		</div>
		<div class="director_content">
			<h4>Message From Our</h4>
			<h1>Managing Director</h1>
			<p>Nothing excites an artist more than the ability to translate their imagination onto a medium to be appreciated by connoisseurs and peers alike. It is essential to recreate the entire spectrum of colour and a plethora of shapes that are conceived in the mind's eye for a work of art to reflect an artist's pure expression.</p>
			<p>At Panart, with our in-depth domain knowledge and vast manufacturing experience in the art supplies industry, we have created and curated a repertoire of premium artistry tools that can help an artist push possibilities in art even further. Lovingly handcrafted and finished to perfection, each product is an amalgamation of aesthetics, functionality, skill, and precision.</p>
			<p>Made in an ultra-modern manufacturing set up and conforming to international quality certifications like ISO 9001, ISO 14001, and OHSAS 18001, our products have set new benchmarks for quality. We are confident that you will be delighted by the standards and variety of artistry tools that we offer.</p>
			<span>Signature</span>
		</div>
	</div>
</div> -->
 
</div> 
@endsection