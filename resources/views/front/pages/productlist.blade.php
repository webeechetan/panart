@extends('layouts.front')
@section('content')
<div class="inside_outer detail category">
  <div class="container">
    <div class="banner_content detail">
      <ul>
        <li><a href="{{url('/')}}">home</a></li>
        <li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
        <li><a href="#">products</a></li>
        <li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
        <li><a href="{{url('/category/'.$pcategory->slug)}}">{{ucfirst($pcategory->name)}}</a></li>
        <li><img src="{{ asset('front/images/breadcrum_icon01.png')}}"></li>
        <li>{{ ucfirst(strtolower($category->name))}}</li>
      </ul>      
    </div>        
        <div class="brush_category_container">
  <h3>{{ $category->name}}</h3>
  {!!$category->description!!}
  <div class="category_inner">
        @if(count($product)>0)
        @php $i=1; @endphp
        @foreach($product as $value)
    <div class="category_box">
		<a class="category-out" href="{{url('detail/'.$category->slug.'/'.$value['slug'])}}">
      <div class="category_image">
        <img src="{{ asset('images/products/') }}/{{$value['image']}}">
      </div>
      <h2>{{$value['title']}}</h2>
      <!-- <h4>Oil-Water-Acrylic</h4> All {{$value['title']}}-->
      <a href="{{url('detail/'.$category->slug.'/'.$value['slug'])}}">View Products<img src="{{ asset('front/images/range_btn.png')}}"></a>
	  </a>
    </div>
        @php if($i%2==0){ echo '</div>
		
		<div class="category_inner">';} $i++; @endphp
    @endforeach     
        @else
            <div class="category-box"> <p>Not Found!!! </p></div>
        @endif
  </div>
</div>
    </div>
</div>

@endsection