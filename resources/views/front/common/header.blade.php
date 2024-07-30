<div class="header_container">
	<div class="logo_box">
		<a href="{{url('/')}}"><!--<img src="images/logo.png">--></a>
	</div>
	<div class="header_right">
		<ul>
			<li><a class="mail_icon" href="{{url('/contact')}}"></a></li>
			<li><a href="{{url('/contact')}}">Connect With Us</a></li>
			<li class="li_border"></li>
			<!--<li><a class="search_icon" href="javascript:void(0)"></a></li>-->
			<li class="menu_border"><img src="{{ asset('front/images/menu_devider.png')}}"></li>
			<li><a class="menu_icon" href="javascript:void(0)" onclick="openNav()"></li>
		</ul>
	</div>
	<div class="header_menu">
		<a class="close_mobile" href="javascript:void(0)"><img src="{{ asset('front/images/search_close.png')}}"></a>
		<ul>
		<!--@php $category = getParentCategory() @endphp
		@foreach($category as $key=>$value)
			<li><a href="{{url('/category/'.$value->slug)}}"> {{$value->name}}</a></li>
			@endforeach-->
			<li><a href="{{url('/category/brushes')}}">Artist Brushes</a></li>
				<li><a href="{{url('/category/artist-canvas')}}">Artist Canvas</a></li>
				<li><a href="{{url('/category/painting-knives')}}">Painting Knives</a></li>
				<li><a href="{{url('/category/handmade-paper')}}">Handmade Paper</a></li>
				<li><a href="{{url('/category/accessories')}}">Accessories</a></li>
				<li><a href="{{url('/category/easel')}}">Easel</a></li>
		</ul>	
	</div>
	
	<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>	
	
	<div class="megamenu_top">
	<a class="mega_logo" href="{{url('/')}}"><img src="{{ asset('front/images/logo.png')}}"></a>

	<div class="megamenu_left">
		<ul>
		    <li><a href="{{url('/category/brushes')}}">Artist Brushes</a></li>
			<li><a href="{{url('/category/artist-canvas')}}">Artist Canvas</a></li>
			<li><a href="{{url('/category/painting-knives')}}">Painting Knives</a></li>
			<li><a href="{{url('/category/handmade-paper')}}">Handmade Paper</a></li>			
			<li><a href="{{url('/category/accessories')}}">Accessories</a></li>
			
		</ul>
	</div>
	</div>
	
	  
	  <div class="megamenu_container">
		<div class="megamenu_inside">
			<div class="megamenu_right">
				<div class="address_box menu">
					<ul>
						<li><a href="{{url('/cms/about-us')}}">About Us</a></li>
						<li><a href="{{url('/cms/quality')}}">Quality</a></li>
						<li><a href="https://panartglobal.com/ecatalogue/flipbook.html">E catalogue</a></li>
						<!--<li><a href="{{url('/ecatalogue')}}">E catalogue</a></li>-->
						<li><a href="{{url('/galleryartwork')}}">Gallery</a></li>
						<li><a href="{{url('/upcomingexhibition')}}">Upcoming Exhibitions</a></li>
						<li><a href="{{url('/contact')}}">Contact Us</a></li>
					</ul>
				</div>
				<div class="mega_social">
				<ul>
					
					
					<!--<li><a href="https://in.pinterest.com/panartglobal/" target="_blank"><img src="http://linuxdevserver.centralindia.cloudapp.azure.com/panart/public/front/images/social03black.png"></a></li>-->
					<li><a href="https://www.instagram.com/panartglobal/" target="_blank"><img src="{{url('/front/images/mega01.png')}}"></a></li>
					<li><a href="https://www.facebook.com/panartglobal/" target="_blank"><img src="{{url('/front/images/mega02.png')}}"></a></li>
					<li><a href="https://twitter.com/panartglobal" target="_blank"><img src="{{url('/front/images/mega03.png')}}"></a></li>
				</ul>
			</div>
				
				<div class="address_box">
					<h4>reach us at</h4>
					<p>SDF # E - 7, Noida Special Economic Zone Noida - 201 305 (Uttar Pradesh) India </p>
					<ul>
						<li><a href="mailto:info@panartglobal.com">info@panartglobal.com</a></li>	
						<li><a href="tel:01204094921">+91-120-4094921</a></li>	
					</ul>
				</div>
			</div>	
		</div>
		<div class="megamenu_inside">
			<!--<div class="event_sec">
				<div class="event_sec_border">
					<div class="event_left">
						<img src="{{ asset('front/images/gallery01.jpg')}}">
					</div>
					<div class="event_right">
						<a href="#"><img src="{{ asset('front/images/arow_icon.png')}}"></a>
						<h3>Events</h3>
						<span>June 25,2020</span>
						<h4>creativeworld 2019 frankfurt germany</h4>
					</div>
				</div>
			</div>-->
			
		</div>
	  </div>
	</div>
	
	<div class="search_container">
		<a class="search_logo" href="{{url('/')}}"><img src="{{ asset('front/images/logo.png')}}"></a>
		<a class="close_srch" href="javascript:void(0)"><img src="{{ asset('front/images/search_close.png')}}"></a>
		<div class="search_box">
			<input type="text" placeholder="Search" id="searchString" >
		</div>
		<ul id="searchResultList"></ul>
	</div>
</div>