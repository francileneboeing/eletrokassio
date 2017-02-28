<?php

	function getHome(){
		$pagina = $_GET['pagina'];
		$pagina = explode('/', $pagina);
		$pagina[0] = ($pagina[0] == NULL ? 'index' : $pagina[0]);

			if(file_exists('paginas/'.$pagina[0].'.php')){

				require_once('paginas/'.$pagina[0].'.php');

			}elseif(file_exists('paginas/'.$pagina[0].'/'.$pagina[1].'.php')){

				require_once('/paginas/'.$pagina[0].'/'.$pagina[1].'.php');

			}else{

				require_once('paginas/404.php');

			}
	}

	function setHeader() {
		require_once('paginas/header.php');
	}

	function setFooter() {
		require_once('paginas/footer.php');
	}

	function setHome() {
		echo BASE;
	}
	function setTitulo() {
		echo TITULO;
	}

?>