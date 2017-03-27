<!-- CABEÇALHO -->
<?php setHeader(); ?>

<title><?php setTitulo(); ?></title>

<!-- HOME -->
<?php getHome(); ?>

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
					<blockquote class="cont-slide">
						<h1>Sinta-se bem</h1>
						<p>Profissionais especializados vão deixar a sua casa do seu jeito.</p>
						<a href="#">leia mais</a>
					</blockquote>
				</div>
		</li>
		<!-- <li class="li-slide">
				<div class="conteudo">
					<div class="cont-slide">
						<h1 class="titulo">SLIDE #2</h1>
					</div>
				</div>
		</li> -->
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
<section class="minhaobra top">
	<div class="conteudo">
		<p>
			Sent eum quaeseritis molesciis et lam non nihiciisquia dolupturerum hillam aut qui alissinci quatio mil eatia ipiteni enient late dolo milibus voluptatur sima cuptaep udaerfe ratur? Quis accae explatur susciti coribusa sum, consequ idebisque voluptatur? Excepellab ilitat deriorum hite delectur ad maximpo rumquas ut hit fugia voluptam a di comnist, ex ex ex exceaquia eum facidunt am quaecumque saectur aut omnim ratio. Et et, quo blaccusda ent.<br>
			Nem volor aut quos exceaquunt utemquam, ullabores et laut ut aspe postiis mo et volorrum explat.
			Git es magnimus, volorepra doles el inciatur ressit explacc usdaepero et.
		</p>
		<div class="clear"></div>
	</div>
</section>
<section class="minhaobra">
	<div class="conteudo">
		<iframe class="video" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FEletroKassio%2Fvideos%2F825180717596788%2F&show_text=0&width=560" width="560" height="315" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
	</div>
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
<section class="newsletter">
	<div class="conteudo"><!-- 
		<img src="<?php //echo setHome(); ?>/paginas/images/newslleter.jpg"> -->
		<form action="" method="#">
			<h2>Cadastre-se</h2>
			<input type="text" name="nome" placeholder="seu nome" required>
			<input type="mail" name="email" placeholder="seu e-mail" required>
			<input class="submit" type="submit" value="enviar">
		</form>
	</div>
</section>
<section>
	<div class="conteudo">
		<h1>localização</h1>
	</div>
	<iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14073.118443659578!2d-49.115873!3d-28.137975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82885e3b28464a66!2sEletro+Kassio!5e0!3m2!1spt-BR!2sbr!4v1489023633287" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<!-- RODAPÉ -->
<?php setFooter(); ?>