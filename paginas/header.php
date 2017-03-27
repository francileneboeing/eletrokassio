<!doctype html>

<head>

	<!-- META TAGS EM ../index.php -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo BASE; ?>/paginas/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo BASE; ?>/paginas/css/menu.css" rel="stylesheet" type="text/css">
	<link href="<?php echo BASE; ?>/paginas/css/responsivo.css" rel="stylesheet" type="text/css">
	<script src="<?php echo BASE; ?>/paginas/js/jquery-1.7.min.js" type="text/javascript" /></script>
	<!-- . . . . . . . . MENU . . . . . . . . .-->
	<script async src="<?php echo BASE; ?>/paginas/js/slicknav.js"></script>
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
	<script src="<?php echo BASE; ?>/paginas/js/unslider.min.js"></script>

</head>
<body>
<div id="topo">
	<div class="conteudo">
		<a class="logo" href="<?php echo BASE; ?>" title="Eletro Kassio">
			<img src="<?php echo BASE; ?>/paginas/images/logo.png" alt="Eletro Kassio">
		</a>
		<div class="top-topo">
			<form action="#" method="POST">
				<input type="text" name="busca" placeholder="O que você deseja encontrar?">
				<input type="submit" value="" class="submit">
			</form>
			<div class="carrinho">
				<p>Solicitar<br> Orçamento</p>
				<a class="carinho" href="#"><p>20</p></a>
			</div>
		</div>
		<div class="login-minhaobra"><p>Olá, <a href="#">faça seu login!</a></p></div>
		
		<?php setMenu(); ?>	
	</div>
</div>