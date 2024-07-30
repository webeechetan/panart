<div class="header_container">
	<div class="logo_box">
		<a href="{{url('/')}}"><!--<img src="images/logo.png">--></a>
	</div>
	<div class="header_right">
		<ul>
			<li><a class="mail_icon" href="#"></a></li>
			<li><a href="#">Connect With Us</a></li>
			<li class="li_border"></li>
			<li><a class="search_icon" href="#"></a></li>
			<li class="menu_border"><img src="{{ asset('front/images/menu_devider.png')}}"></li>
			<li><a class="menu_icon" href="javascript:void(0)" onclick="openNav()"></li>
		</ul>
	</div>
	<div class="header_menu">
		<ul>
		@php $category = getParentCategory() @endphp
		@foreach($category as $key=>$value)
			<li><a href="{{url('/category/'.$value->slug)}}"> {{$value->name}}</a></li>
			<!-- <li><a href="#">Canvas</a></li>
			<li><a href="#">Painting Knives</a></li>
			<li><a href="{{url('/category/brushes')}}">Brushes</a></li>
			<li><a href="#">Handmade Paper</a></li>
			<li><a href="#">Accessories</a></li> -->
		@endforeach
		</ul>	
	</div>
	
	<div id="mySidenav" class="sidenav">
		<a class="mega_logo" href="{{url('/')}}"><img src="{{ asset('front/images/logo.png')}}"></a>	
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div class="megamenu_container">
		<div class="megamenu_inside">
			<div class="megamenu_left">
				<ul>
					<li><a class="active" href="#">Artist Brushes</a></li>
					<li><a href="#">Artist Canvas</a></li>
					<li><a href="#">Painting Knives</a></li>
					<li><a href="#">Accessories</a></li>
					<li><a href="#">Handmade Paper</a></li>
				</ul>
			</div>
			<div class="megamenu_right">
				<div class="address_box">
					<h3>Panart Global</h3>
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Events</a></li>
						<li><a href="#">Quality</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Tips & Techniques</a></li>
						<li><a href="#">Contact US</a></li>
					</ul>
				</div>
				<div class="address_box">
					<h4>Say "Hello" to Panart</h4>
					<p>SDF # E - 7, Noida Special Economic Zone Noida - 201 305 (Uttar Pradesh) India </p>
					<ul>
						<li><a href="mailto:info@panartglobal.com">info@panartglobal.com</a></li>	
						<li><a href="tel:1204055800">+(91)-(120)-4055800</a></li>	
					</ul>
				</div>
			</div>	
		</div>
		<div class="megamenu_inside">
			<div class="event_sec">
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
			<div class="mega_social">
				<ul>
					<li><a href="#"><img src="{{url('/front/images/social01black.png')}}"></a></li>
					<li><a href="#"><img src="{{url('/front/images/social02black.png')}}"></a></li>
					<li><a href="#"><img src="{{url('/front/images/social03black.png')}}"></a></li>
					<li><a href="#"><img src="{{url('/front/images/social04black.png')}}"></a></li>
				</ul>
			</div>
		</div>
	  </div>
	</div>
	
	
</div>