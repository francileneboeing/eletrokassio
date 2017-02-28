<!-- CABEÇALHO -->
<?php setHeader(); ?>


<title><?php setTitulo(); ?></title>


<!-- HOME -->
<?php getHome(); ?>



<h1>INDEX</h1>



<!-- <div class="banner">
	<ul>
		<li>
			<div class="inner">
				<h1>The jQuery slider that just slides.</h1>
				<p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>
				<a class="btn" href="#download">Download</a>
			</div>
		</li>
		<li>
			<div class="inner">
				<h1>The jQuery slider that just slides.</h1>
				<p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>
				<a class="btn" href="#download">Download</a>
			</div>
		</li>
		<li>
			<div class="inner">
				<h1>The jQuery slider that just slides.</h1>
				<p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>
				<a class="btn" href="#download">Download</a>
			</div>
		</li>
		<li>
			<div class="inner">
				<h1>The jQuery slider that just slides.</h1>
				<p>No fancy effects or unnecessary markup, and it’s less than 3kb.</p>
				<a class="btn" href="#download">Download</a>
			</div>
		</li>
	</ul>
	<ol class="arrows">
		<li class="dot">1</li>
		<li class="dot">2</li>
		<li class="dot">3</li>
		<li class="dot">4</li>
	</ol>
</div>

<script src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//unslider.com/unslider.js"></script>
<script>
	
			if(window.chrome) {
				$('.banner li').css('background-size', '100% 100%');
			}

			$('.banner').unslider({
				arrows: false,
				fluid: true,
				dots: true
			});

			//  Find any element starting with a # in the URL
			//  And listen to any click events it fires
			$('a[href^="#"]').click(function() {
				//  Find the target element
				var target = $($(this).attr('href'));

				//  And get its position
				var pos = target.offset(); // fallback to scrolling to top || {left: 0, top: 0};

				//  jQuery will return false if there's no element
				//  and your code will throw errors if it tries to do .offset().left;
				if(pos) {
					//  Scroll the page
					$('html, body').animate({
						scrollTop: pos.top,
						scrollLeft: pos.left
					}, 1000);
				}

				//  Don't let them visit the url, we'll scroll you there
				return false;
			});

		
</script> -->
<!-- RODAPÉ -->
<?php setFooter(); ?>