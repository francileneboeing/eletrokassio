<!-- CABEÇALHO -->
<?php setHeader(); ?>
<title><?php setTitulo(); ?></title>

<!-- HOME -->
<?php getHome(); ?>

<script src="<?php setHome(); ?>/paginas/js/jquery-1.7.min.js" type="text/javascript" /></script>
<script src="<?php setHome(); ?>/paginas/js/unslider.min.js"></script>
<script>
		$(function() {
			$('.banner').unslider({
				speed: 400,               //  The speed to animate each slide (in milliseconds)
				delay: 5000,              //  The delay between slide animations (in milliseconds)
				complete: function() {},  //  A function that gets called after every slide animation
				keys: true,               //  Enable keyboard (left, right) arrow shortcuts
				dots: true,               //  Display dot navigation
				fluid: true              //  Support responsive design. May break non-responsive designs
			});});
</script>


	
	<div id="banner" class="banner">
		<ul>
			<li class="bloco-inicial">
					<div id="conteudo">
					<div class="banner"></div>
						<div id="cont-slide">
							<h1 class="titulo">AA</h1>
						</div>
					</div>
			</li>
			<li class="bloco-inicial">
					<div id="conteudo">
					<div class="banner"></div>
						<div id="cont-slide">
							<h1 class="titulo">BB</h1>
						</div>
					</div>
			</li>
			<li class="bloco-inicial">
					<div id="conteudo">
					<div class="banner"></div>
						<div id="cont-slide">
							<h1 class="titulo">CC</h1>
						</div>
					</div>
			</li>
		</ul>
	</div>

<!-- RODAPÉ -->
<?php setFooter(); ?>