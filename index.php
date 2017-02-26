<?php 
	require_once('config/ini.php');
	require_once('config/get.php');
?>

<!doctype html>
<!--	
    	Cliente: Feagro
		Desenvolvido por: BG Studio - Marketing é Arte
		Site: www.bgstudio.com.br
		Facebook: facebook.com.br/BGStudio3D	
-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="author" content="Eletro Kassio" />
<meta name="robot" content="all" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="language" content="PT" />
<meta name="description" content="">
<meta name="keywords" content=""> 
<link rel="icon" type="image/ico" href="img/icon.ico" />

<link rel="shortcut icon" href="<?php setHome(); ?>/paginas/images/favicon.png" type="image/x-icon"/>

</head>

<!-- PRELOAD -->
<!-- <div id="overlay">
<div class="spinner"></div> 
</div> -->
<!-- x preload x -->

<body id="page">

<!-- HOME -->
<?php getHome(); ?>

</body>
</html>