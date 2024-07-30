@extends('layouts.front')
@section('content')
<div class="docSlider">

	<section class="Mv Start firstSlide">
		<div class="Outer">
			<div class="Inner">
				<div class="slider_container">
					
					
					<!-- -->
					<div class="owl-carousel main owl-theme">
						@php 
							$gallery= fetchGallery('banners');
 
						@endphp
						@if($gallery)
						@foreach($gallery as $key=>$value)
						<div class="item">
							<img src="{!! asset('images/banner/'.$value->image) !!}">
							<div class="banner_content">
								<div class="banner_content_inside">
									{!! $value->description !!}
									<a href="{{ $value->url }}">see more</a>
								</div>	
							</div>	
						</div>
						@endforeach
						@endif
						<!-- div class="item">	
							<img src="{{ asset('front/images/banner01.jpg') }}">
							<div class="banner_content">
								<h1>the crown jewel of our collection</h1>
								<h4>fine hair mop</h4>
								<a class="seemore_btn01" href="{{url('/category/brushes') }}">see more</a>
							</div>
						</div -->
					<!--	<div class="item">	
							<img src="{{ asset('front/images/banner02.jpg') }}">
							<div class="banner_content">
								<h1>an amalgamation of rigidity & ease of use</h1>
								<h4>wooden painting canvas pannel</h4>
								<a class="seemore_btn02" href="{{url('/category/artist-canvas') }}">see more</a>
							</div>	
						</div>
						<div class="item">	
							<img src="{{ asset('front/images/banner03.jpg') }}">
							<div class="banner_content">
								<h1>precision designed single-piece blade</h1>
								<h4>densified wood painting knives</h4>
								<a class="seemore_btn03" href="{{url('/category/painting-knives') }}">see more</a>
							</div>
						</div>
						<div class="item">	
							<img src="{{ asset('front/images/banner04.jpg') }}">
							<div class="banner_content">
								<h1>a fusion of aesthetics & functionality</h1>
								<h4>travel bag for artists (oil & acrylic)</h4>
								<a class="seemore_btn04" href="{{url('/category/accessories') }}">see more</a>
							</div>
						</div>
						<div class="item">	
							<img src="{{ asset('front/images/banner05.jpg') }}">
							<div class="banner_content">
								<h1>HANDMADE FROM 100% RECYCLED PURE COTTON RAG</h1>
								<h4>Deckle Edge Paper</h4>
								<a class="seemore_btn05" href="{{url('/category/handmade-paper') }}">see more</a>
							</div>
						</div>
						<div class="item">	
							<img src="{{ asset('front/images/banner06.jpg') }}">
							<div class="banner_content">
								<h1>deep focus on sustainability & eco-friendly growth</h1>
								<h4>quality & certification</h4>
								<a class="seemore_btn06" href="#">see more</a>
							</div>
						</div>
					-->
					</div>
					<!-- -->
					<div class="stage">
						<div class="box bounce-1"><img src="{{ asset('front/images/drop_img.png') }}"><span>Scroll</span></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="Intro">
		<div class="Outer">
			<div class="Inner">
				<div class="main_wrap">
				
				<div class="testimonial_sec">
					<div class="testimonial_left">
						<div class="testimonial_inner">
							<h4>Welcome to Panart</h4>
							<h3>We Are Crafters of Painting Accessories</h3>
							<p>"Panart's mission to service the global artist community hinges on the three main planks of quality, affordability and respect for the environment. All products showcased bear their genesis to a deep domain knowledge of the artist’s environment and have been specially tuned to enhance performance.</p>
							<a href="{{url('/cms/about-us')}}">Discover More</a>
						</div>
					</div>
					<div class="testimonial_right">
						<div class="testimonial_box">
							<div class="testimonial_box_inner">
								<h3>Testimonials</h3>
								<div class="bxslider testimonial">
									<div>
										<div class="testimonial_content">
											<img src="{{ asset('front/images/content_icon.png') }}">
											<p>The flat synthetic filaments of the Echo Synthetic brushes form a sharp edge at the top and allow a wide range of brush strokes. I have been using these brushes for half a year now, almost exclusively. Now I know how much the quality of the tool matters, even if I learned to appreciate it only late. Thanks Panart!<br><span>- Yo Reuhmer, Pleinair Painter, Germany</span></p>
										</div>
									</div>
									<div>
										<div class="testimonial_content">
											<img src="{{ asset('front/images/content_icon.png') }}">
											<p>Panart brushes are a delight to use thanks to their softness and precision. Panart painting knives have just the right flexibility, and thanks to the various forms available they’re perfect in every situation. Aside from being extremely useful, these tools are aesthetically beautiful also. When using instruments with such a sleek design, it really makes a difference in the creative experience.<br><span>- Mario Minarini, Figurative Painter, Italy</span></p>
										</div>
									</div>
									
									<div>
										<div class="testimonial_content">
											<img src="{{ asset('front/images/content_icon.png') }}">
											<p>Panart brushes and painting knives have a unique and smart design. The handles of the Densified Range of painting knives are not just aesthetically pleasing, the arched handles provide a very comfortable grip.<br><span>- Irene Veltman, Contemporary Artist, The Netherlands</span></p>
										</div>
									</div>
									<div>
										<div class="testimonial_content">
											<img src="{{ asset('front/images/content_icon.png') }}">
											<p>I love the irregular surface of the beautiful handmade paper from Panart. I’ve used both the 300gsm and the 600gsm and it feels like an indulgence each time. I specialise in miniature painting and their 0 round and 5/0 brushes I have are ideal for the job. Top quality products which I can highly recommend.<br><span>- Bronwyn Royce, Watercolour Artist, United Kingdom</span></p>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="video_sec">
							<a href="{{url('/galleryartwork')}}"><img src="{{ asset('front/images/video_btn.png') }}"><span>Media Gallery</span></a>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>

	<section class="Key">
		<div class="Outer">
			<div class="Inner">
				<div class="main_wrap">
			
				<div class="artist_tabbing_mobile">
					<div class="news-ltr">
						<div class="divRow first">
							<div class="top">Artist Brushes</div>
							<div class="cntnt">
								<div class="brush_image">
									<img src="{{ asset('front/images/brushes.png') }}">
								</div>
								<div class="brush_content_inner">
									<a href="{{url('/category/brushes')}}">View All</a>
								</div>
							
							</div>
						</div>

						<div class="divRow">
							<div class="top">Artist Canvas</div>
								<div class="cntnt">
									<div class="brush_image">
										<img src="{{ asset('front/images/canvas.png') }}">
									</div>
									<div class="brush_content_inner">
										<a href="{{url('/category/artist-canvas')}}">View All</a>
									</div>
								</div>
						</div>
						<div class="divRow">
							<div class="top">Painting Knives</div>
								<div class="cntnt">
									<div class="brush_image">
										<img src="{{ asset('front/images/Painting-Knives.png') }}">
									</div>
									<div class="brush_content_inner">
										<a href="{{url('/category/painting-knives')}}">View All</a>
									</div>
								</div>
						</div>
						<div class="divRow">
							<div class="top">Handmade Paper</div>
								<div class="cntnt">
									<div class="brush_image">
										<img src="{{ asset('front/images/Handmade-Paper.png') }}">	
									</div>
									<div class="brush_content_inner">
										<a href="{{url('/category/handmade-paper')}}">View All</a>
									</div>
								</div>
						</div>
						<div class="divRow">
							<div class="top">Accessories</div>
								<div class="cntnt">
									<div class="brush_image">
										<img src="{{ asset('front/images/Accessories.png') }}">
									</div>
									<div class="brush_content_inner">
										<a href="{{url('/category/accessories')}}">View All</a>
									</div>
								</div>
						</div>
					</div>
				
				</div>
				
				
				<!-- -->
				<div class="artist_tabbing">
					<div class="artist_tabbing-inner">
						<div class="tab">
							<div class="tab_inner">
							 <button class="tablinks" onclick="openCity(event, 'brush03')" id="defaultOpen">Artist Brushes<img src="{{ asset('front/images/redarow_btn.png') }}"></button>	
							  <button class="tablinks" onclick="openCity(event, 'brush01')">Artist Canvas<img src="{{ asset('front/images/redarow_btn.png') }}"></button>
							  <button class="tablinks" onclick="openCity(event, 'brush02')">Painting Knives<img src="{{ asset('front/images/redarow_btn.png') }}"></button>
							  <button class="tablinks" onclick="openCity(event, 'brush04')">Handmade Paper<img src="{{ asset('front/images/redarow_btn.png') }}"></button>
							  <button class="tablinks" onclick="openCity(event, 'brush05')">Accessories<img src="{{ asset('front/images/redarow_btn.png') }}"></button>
							</div>
						</div>
						
						<div id="brush03" class="tabcontent">
						  <div class="brush_container">
								<div class="brush_content">
									<div class="brush_content_inner">
										<h3>Artist Brushes</h3>
										<p>Each Panart artist brush is handcrafted and put through stringent quality checks to ensure compliance with international standards. The result – a painting brush that will be your companion for a lifetime.</p>
										<ul>
											<li>Finest Handpicked Filaments</li>
											<li>Remarkable Paint Pick-up & Release</li>
											<li>Exceptional Shape Retention & Spring Back</li>
											<li>Each Tuft 100% Handmade</li>
										</ul>
										<a href="{{url('/category/brushes')}}">View All</a>
									</div>	
								</div>	
								<div class="brush_image">
									<img src="{{ asset('front/images/brushes.png') }}">
								</div>
							</div>
						</div>

						<div id="brush01" class="tabcontent">
							<div class="brush_container">
								<div class="brush_content">
									<div class="brush_content_inner">
										<h3>Artist Canvas</h3>
										<p>Panart’s collection of artist canvases are highly versatile and reliantly durable. We offer canvas products in the form of canvas rolls, stretched canvas, canvas panels, and canvas pads.</p>
										<ul>
											<li>Made From Special Quality Fabrics</li>
											<li>Primed with Acrylic Titanium Gesso</li>
											<li>Acid-Free Sizing</li>
											<li>Varied Sizes & Weights</li>
										</ul>
										<a href="{{url('/category/artist-canvas')}}">View All</a>
									</div>	
								</div>	
								<div class="brush_image">
									<img src="{{ asset('front/images/canvas.png') }}">
								</div>
							</div>
						</div>

						<div id="brush02" class="tabcontent">
						  <div class="brush_container">
								<div class="brush_content">
									<div class="brush_content_inner">
										<h3>Painting Knives</h3>
										<p>Panart’s precision-designed painting knives boast of a single piece construction of the blade that allows for a unique amalgamation of flexibility and stiffness.</p>
										<ul>
											<li>Rounded Edge Blades</li>
											<li>High Flat Shoulder Design</li>
											<li>Excellent Maneuverability</li>
											<li>Ergonomic Shape</li>
										</ul>
										<a href="{{url('/category/painting-knives')}}">View All</a>
									</div>	
								</div>	
								<div class="brush_image">
									<img src="{{ asset('front/images/Painting-Knives.png') }}">
								</div>
							</div>
						</div>

						
					
						<div id="brush04" class="tabcontent">
						  <div class="brush_container">
								<div class="brush_content">
									<div class="brush_content_inner">
										<h3>Handmade Paper</h3>
										<p>Panart’s collection of handmade paper is made from 100% recycled cotton rag; free of wood pulp; and environmentally sustainable.</p>
										<ul>
											<li>Acid-Free Construction</li>
											<li>Great Bursting & Tearing Strength</li>
											<li>Varied Sizes & Weights</li>
											<li>Eco-friendly & Sustainable</li>
										</ul>
										<a href="{{url('/category/handmade-paper')}}">View All</a>
									</div>	
								</div>	
								<div class="brush_image">
									<img src="{{ asset('front/images/Handmade-Paper.png') }}">
								</div>
							</div>
						</div>

						<div id="brush05" class="tabcontent">
						 <div class="brush_container">
								<div class="brush_content">
									<div class="brush_content_inner">
										<h3>Accessories</h3>
										<p>A fusion of aesthetics and functionality – Panart’s entire range of brush bags and wraps, aprons, pencil cases, and tote bags serve a simple purpose - enhancing the artist's convenience.</p>
										<ul>
											<li>Smart & Functional Design</li>
											<li>Excellent Durability</li>
											<li>Complete Protective Storage</li>
											<li>Remarkably Easy-To-Use</li>
										</ul>
										<a href="{{url('/category/accessories')}}">View All</a>
									</div>	
								</div>	
								<div class="brush_image">
									<img src="{{ asset('front/images/Accessories.png') }}">
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<!--- -->
				</div>
			</div>
		</div>
	</section>

	<section class="Key">
		<div class="Outer">
			<div class="Inner">
				<div class="product_outer">
					<div class="main_wrap">
						
						<div class="products_container">
							<div class="product_heading">
								<h2>latest<br> products</h2>
							</div>
							<div class="product_slider">
							<div class="product_slider_inner">
								<div class="owl-carousel product owl-theme">
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Cool_Craft.jpg') }}">
											
											<div class="producthover_box">
												<h3>Handmade Paper</h3>
												<h4>Deckle-Edge Paper - White</h4>
												
												<a href="{{url('/detail/deckle-edge-paper-sheets/handmadepaper-deckle-edge-paper-white')}}">Know More</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Travel_Bag.jpg') }}">
											
											<div class="producthover_box">
												<h3>Travel Bag For Artists</h3>
												<h4>Aquarelle Kit</h4>
												
												<a href="{{url('/detail/travel-bags-cases/travel-bag-for-artists-aquarelle')}}">Know More</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Linen_Panel.jpg') }}">
											
											<div class="producthover_box">
												<h3>100% Linen Canvas Panel</h3>
												<h4>Transparent Primed</h4>
												
												<a href="{{url('/detail/canvas-panels/canvas-panels-100-linentransparent-primed')}}">Know More</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Birch_Painting_Knives.jpg') }}">
											
											<div class="producthover_box">
												<h3>Painting Knives</h3>
												<h4>Densified Wood Range</h4>
												
												<a href="{{url('/product/painting-knives/densified-wood-range')}}">Know More</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Linen_Pencil_Case.jpg') }}">
											
											<div class="producthover_box">
												<h3>Linen Pencil Case</h3>
												<h4>48 Pencils</h4>
												
												<a href="{{url('/detail/pencil-cases/linen-pencil-case-48-pencils')}}">Know More</a>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="product_box me">
											<img src="{{ asset('front/images/Campus_Echo_Synthetic.jpg') }}">
											
											<div class="producthover_box">
												<h3>Campus Range-Echo Synthetic</h3>
												<h4>Acrylic Painting Brushes</h4>
												
												<a href="{{url('/detail/campus-range/echo-synthetic-acrylic-painting-brushes')}}">Know More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="anchor" class="Anchor">
		<div class="Outer">
			<div class="Inner">
				<div class="main_wrap">
					
					<div class="instagram_container">
						<div class="instagram_inner">
							<div class="insta_left">
								<ul>
									<li><a href="#"><img src="{{ asset('front/images/instagrameimg01.png') }}"></a></li>
									<li><a href="#"><img src="{{ asset('front/images/instagrameimg02.png') }}"></a></li>
								</ul>
							</div>	
							<div class="insta_mid">
								<ul>
									<li><a href="#"><img src="{{ asset('front/images/instagrameimg03.png') }}"></a></li>
									<!--<li><a href="#"><img src="{{ asset('front/images/instagrameimg04.png') }}"></a></li>-->
								</ul>
							</div>
							<div class="insta_right">
								<ul>
									<li><a href="https://www.instagram.com/panartglobal/" target="_blank"><img src="{{ asset('front/images/instagram_icon.png') }}"></a></li>
									<li><a href="#"><img src="{{ asset('front/images/instagrameimg05.png') }}"></a></li>
									<li><a href="#"><img src="{{ asset('front/images/instagrameimg06.png') }}"></a></li>
								</ul>
							</div>
							<div class="instagram_content">
								<span>INSTAGRAM</span>
								<h1>Follow us @panartglobal </h1>
								<p>Become a part of our stories! Join the adventure.</p>
								<a href="https://www.instagram.com/panartglobal/" target="_blank">Follow Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="Mv Start">
		<div class="Outer">
			<div class="Inner">
				<div class="main_wrap">
                @include('front.common.footer')
				</div>
			</div>
		</div>
	</section>
	
</div>



@endsection