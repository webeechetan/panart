$(document).ready(function() {
	$('.bxslider').bxSlider({
		auto: true,
	  mode: 'fade',
	  captions: true,
	  autoControls: true,
	  autoHover: true,
	 // adaptiveHeight: true,
	  
	});	
	
	
	$('.bxslider.testimonial').bxSlider({
		auto: true,
	  mode: 'fade',
	  captions: true,
	  autoControls: true,
	  autoHover: true,
	 
	});	
	
 
	/*$('.explore').on('click', function(event) {
		var target = $('.events_heading');
		if( target.length ) {
			event.preventDefault();
			$('html, body').top().animate({
				scrollTop: target.offset().top - 70
			}, 1000);
		}
	});*/


$('.owl-carousel.main').owlCarousel({
    loop:true,
    margin:5,
    nav:true,
	 autoplay:true,
    autoplayTimeout:5000,
	animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

  
$('.owl-carousel.product').owlCarousel({
    loop:true,
    margin:5,
    nav:true,
	 autoplay:true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})




/*var wndWdth = $(window).height();
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
			var frstSlide = $('.banner_container,.inside_outer');
			var offset = frstSlide.offset();
			pos = offset.top;
			if (pos < -minsHgt) {
				$('.header_container').addClass('inner')
			} else {
				$('.header_container').removeClass('inner')
			}
		}, 100);

	});
	
	
var wndWdth = $(window).height();
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
	





$('.marquue_loop').liMarquee({
	direction: 'left',	
	loop:-1,			
	scrolldelay: 0,		
	scrollamount:100,	
	circular: true,		
	drag: true			
});


 
	
	
	
	


 $(document).ready(function() {
     
      $(".owl-carousel.news").owlCarousel({
    items:4,
	nav:true,
    loop:true,
    margin:0,
	//stagePadding: 150,
    //autoplay:true,
	//autoWidth:true,
	autoHeight:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	e.target // newly activated tab
	e.relatedTarget // previous active tab
	$(".owl-carousel").trigger('refresh.owl.carousel');
  });
});

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


if($(window).width() < 768) {
$('.owl-carousel.main').owlCarousel({
    loop:true,
    margin:5,
    nav:true,
	 autoplay:true,
    autoplayTimeout:5000,
	//animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
}





});


//new WOW().init();