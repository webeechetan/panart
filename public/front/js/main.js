$(function () {

  'use strict';

  var console = window.console || { log: function () {} };
  var $images = $('.docs-pictures');
  var $toggles = $('.docs-toggles');
  var $buttons = $('.docs-buttons');
  var options = {
        // inline: true,
        url: 'data-original',
        build: function (e) {
          console.log(e.type);
        },
        built: function (e) {
          console.log(e.type);
        },
        show: function (e) {
          console.log(e.type);
        },
        shown: function (e) {
          console.log(e.type);
        },
        hide: function (e) {
          console.log(e.type);
        },
        hidden: function (e) {
          console.log(e.type);
        },
        view: function (e) {
          console.log(e.type);
        },
        viewed: function (e) {
          console.log(e.type);
        }
      };

  function toggleButtons(mode) {
    if (/modal|inline|none/.test(mode)) {
      $buttons.
        find('button[data-enable]').
        prop('disabled', true).
          filter('[data-enable*="' + mode + '"]').
          prop('disabled', false);
    }
  }

  $images.on({
    'build.viewer': function (e) {
      console.log(e.type);
    },
    'built.viewer':  function (e) {
      console.log(e.type);
    },
    'show.viewer':  function (e) {
      console.log(e.type);
    },
    'shown.viewer':  function (e) {
      console.log(e.type);
    },
    'hide.viewer':  function (e) {
      console.log(e.type);
    },
    'hidden.viewer': function (e) {
      console.log(e.type);
    },
    'view.viewer':  function (e) {
      console.log(e.type);
    },
    'viewed.viewer': function (e) {
      console.log(e.type);
    }
  }).viewer(options);

  toggleButtons(options.inline ? 'inline' : 'modal');

  $toggles.on('change', 'input', function () {
    var $input = $(this);
    var name = $input.attr('name');

    options[name] = name === 'inline' ? $input.data('value') : $input.prop('checked');
    $images.viewer('destroy').viewer(options);
    toggleButtons(options.inline ? 'inline' : 'modal');
  });

  $buttons.on('click', 'button', function () {
    var data = $(this).data();
    var args = data.arguments || [];

    if (data.method) {
      if (data.target) {
        $images.viewer(data.method, $(data.target).val());
      } else {
        $images.viewer(data.method, args[0], args[1]);
      }

      switch (data.method) {
        case 'scaleX':
        case 'scaleY':
          args[0] = -args[0];
          break;

        case 'destroy':
          toggleButtons('none');
          break;
      }
    }
  });

});

		$(document).ready(function() {
		// $('a[href*="#"]:not([href="#"])').click(function(e) {
		// 		e.preventDefault(); 
		// 		e.stopPropagation();
  // e.stopImmediatePropagation();				
  // //if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
  //   var target = $(this.hash);
  //   target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
  //   if (target.length) {
  //     $('html, body').animate({
  //       scrollTop: target.offset().top-70
  //     }, 1000);
  //     return false;
  //   }
  // //}
		// });




$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop() + $('.header').height() + $('.project-menu-inner').height() + 150;
		// Assign active class to nav links while scolling
     	$('.post-fix').each(function(i) {
	           if ($(this).position().top <= scrollDistance) {
					    //console.log('1111','aaaaaaa')
						$('a.navigation__link').removeClass('active');
						$('a.navigation__link').eq(i).addClass('active');
				}
		});
}).scroll();


});



