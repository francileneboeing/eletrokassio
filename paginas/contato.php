<!-- CABEÇALHO -->
<?php setHeader(); ?>

<title>Contato | <?php setTitulo(); ?></title>

<!-- HOME -->
<?php getHome(); ?>
<hgroup>
	<div class="conteudo">
		<h1>Contato</h1>
	</div>
</hgroup>
<section class="contato">
	<div class="conteudo">
		<blockquote class="esq">
			<h1 class="int">Como nos encontrar</h1>
			<p>
				Estamos sempre prontos para ajudar você. Há muitas maneiras de entrar em contato conosco. Você pode ligar, enviar um e-mail, nos visitar ou preencher o formulário ao lado, que retornamos á você.	
			</p>
			<div class="fone">
				<span></span>
				<p>
					(48) 3653.1827
				</p>
			</div>
			<div class="mail">
				<span></span>
				<p>
					atendimento@eletrokassio.com.br<br>
					orcamento@eletrokassio.com.br
				</p>
			</div>
			<div class="local">
				<span></span>
				<p>
					Rua Santa Rosa, 64 - Centro<br>
					Rio Fortuna - Santa Catarina
				</p>
			</div>
		</blockquote>
		<blockquote class="dir">
			<h1 class="int">Entre em contato</h1>	
			<p>
				Se estiver com alguma dúvida preencha o formulário que responderemos em breve.
			</p>
			<form action="contato_submit" method="post" accept-charset="utf-8">
				<input type="text" name="nome" class="t100" placeholder="seu nome" required>
				<input type="mail" name="email" class="t50" placeholder="seu e-mail" required>
				<input type="text" name="telefone" class="t50 d" placeholder="seu telefone" required>
				<textarea placeholder="mensagem" required></textarea>
				<input type="submit" value="enviar" class="submit">
			</form>
		</blockquote>
	</div>
</section>
<section>
	<div class="conteudo">
		<h1>como chegar</h1>
	</div>
	<iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14073.118443659578!2d-49.115873!3d-28.137975!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x82885e3b28464a66!2sEletro+Kassio!5e0!3m2!1spt-BR!2sbr!4v1489023633287" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>
<!-- RODAPÉ -->
<?php setFooter(); ?>