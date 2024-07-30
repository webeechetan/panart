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
				<li>{{ ucfirst(strtolower($category[0]->name))}}</li>
			</ul>			 
		</div>
       
        <div class="brush_category_container">
	<h3>{{ $category[0]->name}}</h3>
	{!!$category[0]->description!!}
	<div class="category_inner">
        @if(count($subcategory)>0)
        @php $i=1; $j=1; @endphp
        @foreach($subcategory as $scategory)
        
       
		<div class="category_box">
			<a class="category-out" href="{{url('product/'.$category[0]->slug.'/'.$scategory->slug)}}">
			<div class="category_image">
				<img src="{{ asset('images/category/') }}/{{$scategory->image}}">
			</div>
			<h2>{{$scategory->name}}</h2>
			<!-- <h4>Oil-Water-Acrylic</h4> {{$scategory->name}}-->
			<a href="{{url('product/'.$category[0]->slug.'/'.$scategory->slug)}}">View All Products<img src="{{ asset('front/images/range_btn.png')}}"></a>
			</a>
		</div>
        @php   $class='';if($j%2!=0){$class='odd' ;} 
    	if($i%2==0){ echo '</div><div class="category_inner">'; $j++;}  $i++; @endphp
        	
		@endforeach	
		
        @else
            <div class="category-box"> <p>Not Found!!! </p></div>
        @endif
	</div>
</div>
    </div>
</div>

@endsection