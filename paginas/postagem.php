<!-- CABEÇALHO -->
<?php setHeader(); ?>

<title>Postagem | <?php setTitulo(); ?></title>

<!-- HOME -->
<?php getHome(); ?>
<h1>POSTAGEM <?php echo " <br> ".$_GET['id']." <br> ".$_GET['titulo']; ?></h1>

<!-- RODAPÉ -->
<?php setFooter(); ?>