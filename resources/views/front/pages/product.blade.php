@extends('layouts.front')
@section('content')
<div class="inside_outer detail">
	<div class="container">
		<div class="banner_content detail">
			<ul>
				<li><a href="{{url('/')}}">home</a></li>
				<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
				<li><a href="#">products</a></li>
				<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
				<li><a href="{{url('/category/'.$pcategory->slug)}}">{{ucfirst($pcategory->name)}}</a></li>
				<li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
        <li><a href="{{url('product/'.$pcategory->slug.'/'.$category->slug)}}">{{ ucfirst(strtolower($category->name))}}</a></li>
        @php if(strtolower($product->title)!=strtolower($category->name) ){ @endphp
        <li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
				<li> {{ ucfirst(strtolower($product->title))}} </li>
        @php } @endphp
			</ul>
			<a href="{{url('/category/'.$pcategory->slug)}}"><img src="{{ asset('front/images/red_icon.png')}}">Back to {{$pcategory->name}}</a>
		</div>
		
		<?php //dd($productGallery);die; ?>
		<div class="detail_container">
            <div class="brush_detail">
				<span class="Scroll_box">Scroll</span>
                <div class="detail_right">
                @foreach($productGallery as $key=>$prd)
                    <div class="mySlides">
                        <!-- <span>{{ $prd->title }}</span> -->
                        <img src="{!! asset('images/products/'.$prd->image ) !!}">
                    </div>
                @endforeach
                </div>
                @if (count($productGallery) > 1)
                <!--<div class="row detail-thumbnail" id="testDiv">-->
				<div class="row detail-thumbnail">
				<div class="row detail-thumbnail_inner">
				
                @foreach($productGallery as $key=>$prd)
				
                    <div class="column_box">
                    <img class="demo cursor" src="{!! asset('images/products/thumb/'.$prd->thumb_image ) !!}" onclick="currentSlide({{ $key+1 }})" alt="{{ $prd->title }}">
                    <span>{{ $prd->title }}</span>
                    </div>
					
                @endforeach
                </div>
                </div>
				@endif
            </div>
		
            <div class="detail_content">
                <span>{{$category->name}}</span>
                <!-- <div class="product-details"> -->
               {{-- @foreach($product as $key=>$prd) --}}
                    <div class="product-details" >
                        <h2>{{ $product->title }}</h2>
                        <!-- <h3>Oil Paint Brush</h3> -->
                        {!! $product->short_description !!}
                        {!! $product->description !!}
                    </div>
                {{-- @endforeach --}}
                <!-- </div> -->
                @if(count($productRelated)>0)
                <div class="Related_box">
                    <h4>Related Products</h4>  
                    <ul>
                      @php $url = 'javascript:;'; @endphp
                      @foreach($productRelated as $key=>$prd)
                      @php $cat= fetchCategorySubcategory($prd['category_id']);

                        if($cat){
                          $cUrl= implode("/",$cat);
                          $url = url('detail/'.$cUrl .'/'.$prd['slug']);
                        }
                      
                      @endphp
                        <li><a href="{{ $url }}"><img src="{!! asset('images/products/thumb/'.$prd ['thumb_image']) !!}">{{$prd->title}}</a></li>
                      @endforeach
                    </ul> 
                </div>
                @endif
            </div>
		</div>
		
	</div>	
</div> 
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  //var captionText = document.getElementById("caption");
  //var productDetails = document.getElementsByClassName("product-details");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      //productDetails[i].style.display="none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
     // productDetails[i].className=productDetails[i].className.replace(" active","");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
 // productDetails[slideIndex-1].style.display = "block";

  //captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

@endsection