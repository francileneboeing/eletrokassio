<!doctype html>

<head>

	<!-- META TAGS EM ../index.php -->
	<link href="<?php setHome(); ?>/paginas/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="<?php setHome(); ?>/paginas/css/responsivo.css" rel="stylesheet" type="text/css">
	<link href="<?php setHome(); ?>/paginas/css/menu.css" rel="stylesheet" type="text/css">
	<script src="<?php setHome(); ?>/paginas/js/jquery-1.7.min.js" type="text/javascript" /></script>
	<!-- . . . . . . . . MENU . . . . . . . . .-->
	<script async src="<?php setHome(); ?>/paginas/js/slicknav.js"></script>
	<script>
	// Add Header Class On Scroll
		jQuery(function() {
			jQuery(window).scroll(function() {
			
				var $widnowHeight = jQuery('header').height() + 200;
			
				if(jQuery(this).scrollTop() > $widnowHeight) {
					jQuery('#header').addClass('scroll-background');
				} else {
					jQuery('#header').removeClass('scroll-background');
				}
			});
		});
	</script>
	<!-- x menu x -->
	<!-- . . . . . . . . SLIDE . . . . . . . . .-->
	<script src="<?php setHome(); ?>/paginas/js/unslider.min.js"></script>

</head>
<body>

<div id="topo">
	<div class="conteudo">
		<a class="logo" href="<?php setHome(); ?>" title="Eletro Kassio">
			<img src="<?php setHome(); ?>/paginas/images/logo.png" alt="Eletro Kassio">
		</a>
		<div class="top-topo">
			<form action="#" method="POST">
				<input type="text" name="busca" placeholder="O que você deseja encontrar?">
				<input type="submit" value="" class="submit">
			</form>
		</div>
		<div class="login-minhaobra"></div>
		<?php setMenu(); ?>
	</div>
</div>