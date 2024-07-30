<!doctype html>
 <html lang="en">
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="../../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../../extras/modernizr.2.5.3.min.js"></script>
</head>
<body>
	<header style="display: flex;">
		<div class="logo">
			<img src="logo.png" alt="logo">
		</div>
	</header>
<div class="flipbook-viewport">
	<div class="container">
		<div class="flipbook">
			<div class="page" style="background-image:url(pages/0001.jpg)"></div>
			<div class="double" style="background-image:url(pages/0002.jpg)"></div>
			<div class="double" style="background-image:url(pages/0003.jpg)"></div>
			<div class="double" style="background-image:url(pages/0004.jpg)"></div>
			<div class="double" style="background-image:url(pages/0005.jpg)"></div>
			<div class="double" style="background-image:url(pages/0006.jpg)"></div>
			<div class="page" style="background-image:url(pages/0007.jpg)"></div>
			<div class="page" style="background-image:url(pages/0008.jpg)"></div>
			<div class="double" style="background-image:url(pages/0009.jpg)"></div>
			<div class="double" style="background-image:url(pages/0010.jpg)"></div>
			<div class="double" style="background-image:url(pages/0011.jpg)"></div>
			<div class="double" style="background-image:url(pages/0012.jpg)"></div>
			<div class="double" style="background-image:url(pages/0013.jpg)"></div>
			<div class="page" style="background-image:url(pages/0014.jpg)"></div>
			<div class="double" style="background-image:url(pages/0015.jpg)"></div>
			<div class="double" style="background-image:url(pages/0016.jpg)"></div>
			<div class="double" style="background-image:url(pages/0017.jpg)"></div>
			<div class="double" style="background-image:url(pages/0018.jpg)"></div>
			<div class="page" style="background-image:url(pages/0019.jpg)"></div>
			<div class="double" style="background-image:url(pages/0020.jpg)"></div>
			<div class="double" style="background-image:url(pages/0021.jpg)"></div>
			<div class="double" style="background-image:url(pages/0022.jpg)"></div>
			<div class="double" style="background-image:url(pages/0023.jpg)"></div>
			<div class="page" style="background-image:url(pages/0024.jpg)"></div>
			<div class="page" style="background-image:url(pages/0025.jpg)"></div>
			<div class="double" style="background-image:url(pages/0026.jpg)"></div>
			<div class="double" style="background-image:url(pages/0027.jpg)"></div>
			<div class="double" style="background-image:url(pages/0028.jpg)"></div>
			<div class="double" style="background-image:url(pages/0029.jpg)"></div>
			<div class="double" style="background-image:url(pages/0030.jpg)"></div>
			<div class="page" style="background-image:url(pages/0031.jpg)"></div>
			<div class="page" style="background-image:url(pages/0032.jpg)"></div>
			<div class="double" style="background-image:url(pages/0033.jpg)"></div>
			<div class="double" style="background-image:url(pages/0034.jpg)"></div>
			<div class="double" style="background-image:url(pages/0035.jpg)"></div>
			<div class="double" style="background-image:url(pages/0036.jpg)"></div>
			<div class="double" style="background-image:url(pages/0037.jpg)"></div>
			<div class="page" style="background-image:url(pages/0038.jpg)"></div>
			<div class="double" style="background-image:url(pages/0039.jpg)"></div>
			<div class="double" style="background-image:url(pages/0040.jpg)"></div>
			<div class="double" style="background-image:url(pages/0041.jpg)"></div>
			<div class="double" style="background-image:url(pages/0042.jpg)"></div>
			<div class="page" style="background-image:url(pages/0043.jpg)"></div>
			<div class="double" style="background-image:url(pages/0044.jpg)"></div>
			<div class="double" style="background-image:url(pages/0045.jpg)"></div>
			<div class="double" style="background-image:url(pages/0046.jpg)"></div>
			<div class="double" style="background-image:url(pages/0047.jpg)"></div>
			<div class="page" style="background-image:url(pages/0048.jpg)"></div>
			<div class="page" style="background-image:url(pages/0049.jpg)"></div>
			<div class="page" style="background-image:url(pages/0050.jpg)"></div>
		</div>
	</div>
</div>
<footer class="footer">
	<div style="display: flex;">
	  <button onclick="turnPage('prev')">&#x2190;</button>
	  <input type="text" id="pageNumberInput" placeholder="">
	  <button onclick="turnPage('next')">&#x2192;</button>
	</div>
  </footer>

  <script type="text/javascript">
    var flipSound = new Audio('sound.mp3'); // Replace 'sound.mp3' with the actual path to your sound file

    function loadApp() {
      var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      var screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

      // Set the maximum dimensions for your flipbook
      var maxWidth = 1600;
      var maxHeight = 450;

      // Calculate the actual dimensions based on screen size
      var width = Math.min(screenWidth, maxWidth);
      var height = Math.min(screenHeight, maxHeight);

      // Create the flipbook
      $('.flipbook').turn({
        width: width,
        height: height,
        elevation: 50,
        gradients: true,
        autoCenter: true,
        when: {
          turned: function (e, page) {
            playFlipSound();
            updatePageNumber(page);
          }
        }
      });

      updatePageNumber(1); // Initialize the input field with the current page number
    }

    function turnPage(direction) {
      var flipbook = $('.flipbook');
      if (direction === 'prev') {
        var currentPage = flipbook.turn('page');
        if (currentPage > 1) {
          flipbook.turn('previous');
        }
      } else if (direction === 'next') {
        flipbook.turn('next');
      }
    }

    function updatePageNumber(page) {
      var flipbook = $('.flipbook');
      var currentPage = page || flipbook.turn('page');
      var doublePage = getDoublePage(currentPage);
      $('#pageNumberInput').val(doublePage);
    }

    function getDoublePage(page) {
      // If the page is odd, show only that page
      if (page == 1 || page == 50) {
        return page;
      } else if (page % 2 === 0) {
        // If the page is even, show the actual page number
        return page + '-' + (page + 1) + '/' + '50';

      } else {
        // If the page is odd, show the range of double pages
        return page - 1 + '-' + (page) + '/' + '50';
      }
    }

    $(document).ready(function () {
      // Keyboard navigation
      $(document).keydown(function (e) {
        if (e.keyCode === 37) {
          turnPage('prev'); // Left arrow key
        } else if (e.keyCode === 39) {
          turnPage('next'); // Right arrow key
        }
      });

      $('#pageNumberInput').on('input', function () {
        var pageNumber = parseInt($(this).val(), 10);
        if (!isNaN(pageNumber) && pageNumber > 0) {
          $('.flipbook').turn('page', pageNumber);
        }
      });

      // Clear input when clicked
      $('#pageNumberInput').on('focus', function () {
        $(this).val('');
      });
    });

    function playFlipSound() {
      flipSound.pause();
      flipSound.currentTime = 0;
      flipSound.play();
    }

    // Event listener for flip sound end
    flipSound.addEventListener('ended', function () {
      flipSound.pause();
    });

    yepnope({
      test: Modernizr.csstransforms,
      yep: ['../../lib/turn.js'],
      nope: ['../../lib/turn.html4.min.js'],
      both: ['css/basic.css'],
      complete: loadApp
    });
  </script>
  

</body>
</html>