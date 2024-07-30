<div class="footer_container">
	<div class="top_footer">
		<div class="footer_left">
			<ul>
				<h3>Panart Global</h3>
				<li><a href="{{url('/cms/about-us')}}">About Us</a></li>
				<li><a href="{{url('/cms/quality')}}">Quality</a></li>
				<!--<li><a href="http://linuxdevserver.centralindia.cloudapp.azure.com/panart/public/galleryexhibition">Events</a></li>-->
				<li><a href="{{url('/galleryartwork')}}">Gallery</a></li>
				<li><a href="{{url('/upcomingexhibition')}}">Upcoming Exhibitions</a></li>
				<!--<li><a href="#">Tips & Techniques</a></li>-->
				<li><a href="{{url('/contact')}}">Contact Us</a></li>
			</ul>
			<ul>
				<h3>Product Category</h3>
				<!--@php $category = getParentCategory() @endphp
				@foreach($category as $key=>$value)
				<li><a href="{{url('/category/'.$value->slug)}}"> {{$value->name}}</a></li>
				@endforeach-->
				<li><a href="{{url('/category/brushes')}}">Artist Brushes</a></li>
				<li><a href="{{url('/category/artist-canvas')}}">Artist Canvas</a></li>
				<li><a href="{{url('/category/painting-knives')}}">Painting Knives</a></li>
				<li><a href="{{url('/category/handmade-paper')}}">Handmade Paper</a></li>
				<li><a href="{{url('/category/accessories')}}">Accessories</a></li>
			</ul>
		</div>
		
		<div class="footer_mid">
			<a href="{{url('/')}}"><img src="{{ asset('front/images/footer_logo.png')}}"></a>
			<ul>
				<li><a href="https://www.facebook.com/panartglobal/" target="_blank"><img src="{{ asset('front/images/social01.png')}}"></a></li>
				<li><a href="https://twitter.com/panartglobal" target="_blank"><img src="{{ asset('front/images/social02.png')}}"></a></li>
				<li><a href="https://in.pinterest.com/panartglobal/" target="_blank"><img src="{{ asset('front/images/social03.png')}}"></a></li>
				<li><a href="https://www.instagram.com/panartglobal/" target="_blank"><img src="{{ asset('front/images/social04.png')}}"></a></li>
			</ul>	
		</div>
		<div class="footer_right">
			<h4>Subscribe to our newsletter and follow Panart Family</h4>
			<span>Keep in touch with us and learn about our news and events</span>
			<div class="input_box">
				<div id="newmsg"></div>
				<form method="POST" id="newsletter" autocompelte="off">
					@csrf
					<input class="type_text" type="text" name="email" placeholder="enter email address">
					<input class="sbt_btn" type="submit" value="submit">
				</form>
			</div>
		</div>
	</div>
	
	<div class="mid_footer">
		<ul>
			<li>Say "<span>Hello</span>" to Panart</li>
			<li>SDF # E - 7, Noida Special Economic Zone Noida - 201 305 (Uttar Pradesh) India </li>
			<li><a href="mailto:info@panartglobal.com">info@panartglobal.com</a><a href="tel:1204094921">+91-120-4094921</a></li>
		</ul>
	</div>
	
	<div class="bottom_footer">
		<ul>
			<li><a href="{{url('/cms/privacy-policy')}}">Privacy Policy</a></li>
			<!--<li><a href="#">Cookie Policy</a></li>-->
			<li><a href="{{url('/cms/terms-condition')}}">Terms & Conditions</a></li>
		</ul>
		<p>Copyright©2020 Panart. All rights reserved.</p>
		<span>Design & Developed By: <a href="http://natter.co.in/" target="_blank">Natter</a></span>
	</div>
	
</div>
@if(Request::is('/'))
<!-- <script src="{{ asset('front/js/docSlider.min.js')}}"></script> -->
<script>
if($(window).width() > 768) {
docSlider.init({});
}
</script>

<!--<script>docSlider.init({});</script>-->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
$('.docSlider-inner').bind('mousewheel', function(){
	var frstSlide = $('.firstSlide');
	var offset = frstSlide.offset();
	pos = offset.top;
	console.log(pos);
	if( pos < -1 ) {
		$('.header_container').addClass('active')
	} else {
		$('.header_container').removeClass('active')
	}
});



var wndWdth = $(window).height();
	var minsHgt =  wndWdth/2; 
	$('.docSlider-inner').bind('wheel', function () {
		
		setTimeout(() => {
			var frstSlide = $('.firstSlide');
			var offset = frstSlide.offset();
			pos = offset.top;
			console.log(pos);
			if (pos < -minsHgt) {
				$('.header_container').addClass('inner')
			} else {
				$('.header_container').removeClass('inner')
			}
		}, 350);

	});

var wndWdth = $(window).height();
	var minsHgt =  wndWdth/2; 
	$('.inside_body').bind('wheel', function () {
		
		setTimeout(() => {
			var frstSlide = $('.banner_container,.inside_outer,.main');
			var offset = frstSlide.offset();
			pos = offset.top;
			if (pos < -minsHgt) {
				$('.header_container').addClass('inner')
			} else {
				$('.header_container').removeClass('inner')
			}
		}, 100);

	});
	
	
/*var wndWdth = $(window).height();
	var minsHgt =  wndWdth/2; 
	$('.inside_body').bind('wheel', function () {
		
		setTimeout(() => {
			var frstSlide = $('.banner_container,.main');
			var offset = frstSlide.offset();
			pos = offset.top;
			if (pos < -minsHgt) {
				$('.header_container').addClass('inner')
			} else {
				$('.header_container').removeClass('inner')
			}
		}, 100);

	});*/
</script>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
  AOS.init();
</script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#newsletter").validate({
		rules: {
			email: {
				required : true
			}
		},
		messages: {
				email: {
					required: "Email is required"
				}
            },
		
		submitHandler: function(form){
			  jQuery.ajax({
			    url: "{{ route('newsletter') }}",
			    data: $(form).serialize(),
			    type: "POST",
			    success: function(data) {			   
			      if(data.success){
			        $("#newmsg").show().html(data.msg);
			        $('#newsletter')[0].reset();
			      } else {
			        $("#newmsg").show().html(data.msg);
                  }
			    
			    }
			  });
		}
    });
    })

</script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
$(".search_icon").click(function(){
  $(".search_container").addClass("active");
});

$(".close_srch").click(function(){
  $(".search_container").removeClass("active");
});
</script>
<script>
$(document).ready(function(){  
	$('#searchString').keyup(function(){ 
		var searchString = $(this).val();
		 
		$.ajax({ 
			url: "{{url('search')}}",
			data: {search:searchString},
			success: function(output) {
			$('#searchResultList').html(output);
		}
		});
	});
});

</script>
<script>
$('#testDiv').slimscroll({
  height: '500px',
  //width: '300px'
  
});

</script>

<script>
$(".row.detail-thumbnail").hover(
  function () {
    $(".Scroll_box").addClass("active");
  },
  function () {
    $(".Scroll_box").removeClass("active");
  }
);
</script>


<script>
		$('.cntnt').css({'display':'none'});
		//$('.cntnt').slideUp();
		$('.divRow.first .cntnt').css({'display':'block'});
		$('.divRow.first .top').addClass('actv');
		$('.top').click(function(){
			$('.top').removeClass('actv');
			$(this).addClass('actv');
			//$('.cntnt').slideUp();
			if($(this).next('.cntnt').css('display')=='block'){
				
				$('.cntnt').slideUp();
				$('.top').removeClass('actv');
			}
			else{
				$('.cntnt').slideUp();
				$(this).next('.cntnt').slideDown('.cntnt');
			}
		});
	</script>


<script>
var wdth = $(window).width()
if( wdth > 768 ) {
    $('body').on({'touchmove': function(e) { 
        var wndWdth = $(window).height();
        var minsHgt =  wndWdth/2; 
        setTimeout(() => {
            var frstSlide = $('.banner_container,.inside_outer,.main');
            var offset = frstSlide.offset();
            pos = offset.top;
            if (pos < -minsHgt) {
                $('.header_container').addClass('inner')
            } else {
                $('.header_container').removeClass('inner')
            }
        }, 100);
        
    

    }})
}
</script>	
	
<script>
var wdth = $(window).width()
if( wdth < 768 ) {
    $('body').on({'touchmove': function(e) { 
        var wndWdth = $(window).height();
        var minsHgt =  wndWdth/2; 
        setTimeout(() => {
            var frstSlide = $('.banner_container,.inside_outer,.main');
            var offset = frstSlide.offset();
            pos = offset.top;
            if (pos < -minsHgt) {
                $('.header_container').addClass('inner')
            } else {
                $('.header_container').removeClass('inner')
            }
        }, 100);
        
    

    }})
}
</script>	
	
	





