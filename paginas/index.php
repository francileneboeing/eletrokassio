<!-- CABEÇALHO -->
<?php setHeader(); ?>

<title><?php setTitulo(); ?></title>

<!-- HOME -->
<?php getHome(); ?>

<script src="<?php setHome(); ?>/paginas/js/jquery-1.7.min.js" type="text/javascript" /></script>
<script src="<?php setHome(); ?>/paginas/js/unslider.min.js"></script>
<script>
		$(function() {
			$('.slide').unslider({
				speed: 400,               //  The speed to animate each slide (in milliseconds)
				delay: 5000,              //  The delay between slide animations (in milliseconds)
				complete: function() {},  //  A function that gets called after every slide animation
				keys: true,               //  Enable keyboard (left, right) arrow shortcuts
				dots: true,               //  Display dot navigation
				fluid: true               //  Support responsive design. May break non-responsive designs
			});});
</script>


	
<div id="slide" class="slide">
	<ul>
		<li class="li-slide" style="background-image: url('<?php echo setHome(); ?>/paginas/images/banner-1.png');">
				<div class="conteudo">
					<div class="slide"></div>
					<blockquote class="cont-slide">
						<h1>Sinta-se bem</h1>
						<p>Profissionais especializados vão deixar a sua casa do seu jeito.</p>
						<a href="#">leia mais</a>
					</blockquote>
				</div>
		</li>
		<li class="li-slide">
				<div class="conteudo">
				<div class="slide"></div>
					<div class="cont-slide">
						<h1 class="titulo">SLIDE #2</h1>
					</div>
				</div>
		</li>
	</ul>
</div>
<!-- Important Owl stylesheet -->
<script type="text/javascript" src="<?php setHome(); ?>/paginas/js/modernizr.custom.28468.js"></script>
<link rel="stylesheet" href="<?php setHome(); ?>/paginas/css/slide.carousel.css">
<script src="<?php setHome(); ?>/paginas/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).ready(function() {
		$("#owl-slide").owlCarousel({
				autoPlay: false
			});
		});
		var owl = $("#owl-slide");
		// Custom Navigation Events
		$(".next").click(function(){
			owl.trigger('owl.next');
		})
		$(".prev").click(function(){
			owl.trigger('owl.prev');
		})
	});
	$(document).ready(function() {
		$(document).ready(function() {
		$("#owl-slide-2").owlCarousel({
				autoPlay: false,
				items:4,
			});
		});
		var owl_2 = $("#owl-slide-2");
		// Custom Navigation Events
		$(".next_2").click(function(){
			owl_2.trigger('owl.next');
		})
		$(".prev_2").click(function(){
			owl_2.trigger('owl.prev');
		})
	});
</script>
<section class="cat-destaque">
	<div class="conteudo">
		<h1>na Eletro Kassio tem</h1>
		<div id="owl-slide" class="owl-carousel">
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>materiais elétricos</h2>
				</a>
			</div>
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>louças sanitárias</h2>
				</a>
			</div>
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>materiais elétricos</h2>
				</a>
			</div>
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>louças sanitárias</h2>
				</a>
			</div>
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>materiais elétricos</h2>
				</a>
			</div>
			<div class="item">
				<a href="#">
					<p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p>
					<h2>louças sanitárias</h2>
				</a>
			</div>
		</div>
		<div class="customNavigation">
			<a class="btn prev"></a>
			<a class="btn next"></a>
		</div>
	</div>
</section>
<section class="prod-destaque">
	<div class="conteudo">
		<h1>produtos em destaque</h1>
		<div id="owl-slide-2" class="owl-carousel">
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
			<div class="item">
				<a href="#1.1"><p style="background-image: url('<?php setHome(); ?>/paginas/images/cat-1.png');"></p></a>
				<a href="#1.2"><h4>Torneira monocomando - cromada (cód. 599292)</h4></a>
				<a href="#2"><h2>+ detalhes</h2></a>
				<a href="#3"><h2>> orçar</h2></a>
			</div>
		</div>
		<div class="customNavigation">
			<a class="btn prev_2"></a>
			<a class="btn next_2"></a>
		</div>
	</div>
</section>

<section class="minhaobra">
	
</section>
<section class="blog">
	<div class="conteudo">
		<h1>blog</h1>
		<blockquote>
			<img src="<?php echo setHome(); ?>/paginas/images/foto-blog.png">
			<h2>Como deixar sua casa bem iluminada</h2>
			<a href="#">+</a>
		</blockquote>
		<blockquote>
			<img src="<?php echo setHome(); ?>/paginas/images/foto-blog.png">
			<h2>Como deixar sua casa bem iluminada</h2>
			<a href="#">+</a>
		</blockquote>
		<blockquote>
			<img src="<?php echo setHome(); ?>/paginas/images/foto-blog.png">
			<h2>Como deixar sua casa bem iluminada</h2>
			<a href="#">+</a>
		</blockquote>
		<div class="clear"></div>
	</div>
</section>
<section class="newsletter"></section>
<section>
	<div class="conteudo">
		<h1>localização</h1>
	</div>
	<iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14073.118443659578!2d-49.115873!3d-28.137975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82885e3b28464a66!2sEletro+Kassio!5e0!3m2!1spt-BR!2sbr!4v1489023633287" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<!-- RODAPÉ -->
<?php setFooter(); ?>