<?php include('../restrito.php'); ?>
<?php include('../header.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

<!-- START PAGE SIDEBAR -->
<?php include('../sidebar.php'); ?>

<!-- PAGE CONTENT -->
<div class="page-content">

<!-- START X-NAVIGATION VERTICAL -->
<?php include('../nav_vertical.php'); ?>                  

<!-- START BREADCRUMB -->
<ul class="breadcrumb">

<li class="active">Adicionando...</li>
</ul>
<!-- END BREADCRUMB -->  

 

<!-- ##################### START INSERTS ##################### -->
<?php
switch ($_POST['acao']) {
	case "cadastraBanner":
		cadastraBanner();
		break;
	case "cadastraNoticia":
		cadastraNoticia();
		break;
	case "cadastraHospedagem":
		cadastraHospedagem();
		break;

}
function cadastraBanner() {
	
	include ('config.php');
	$edicao = addslashes($_POST['edicao']);
	//consulta edicao
	$consulta_edicao = mysql_query ("SELECT * FROM edicao WHERE ano = '$edicao'");
	while ($edicao = mysql_fetch_array ($consulta_edicao)) {
		$id_edicao = $edicao['id_edicao'];
		$ano_edicao = $edicao['ano'];
	}
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$consulta_banner = mysql_query ("SELECT * FROM banner WHERE id_edicao = '$id_edicao'");
	$total_banner = mysql_num_rows($consulta_banner);
	$ordem = $total_banner+1;
	$botao = addslashes($_POST['botao']);
	$link = addslashes($_POST['link']);

	$today = date("d/m/y")." | ".date("H:i");

	// Limita o tamanho da imagem
	if($_FILES['img']['size'] > 1000000){
		echo "<script>window.location= '../cadastroBanner.php?return=imageBig';</script>";
	} else {

		if(!empty($_FILES['img']['tmp_name'])){ // Se o array $_FILES não estiver vazio
				// Incluímos o arquivo com a classe
				include 'classUploadImagem.php';
				// Associamos a classe à variável $upload
				$upload = new UploadImagem();
				// Determinamos nossa largura máxima permitida para a imagem
				$upload->width = 2000;
				// Determinamos nossa altura máxima permitida para a imagem
				$upload->height = 2000;
					
				echo $upload->salvar("../uploads/", $_FILES['img']);

				//Pega nome e extensão do arquivo
				$file = $_FILES['img'];
				$extensao_aux = explode('.', $file['name']);
				$extensao = end($extensao_aux);
				
				//Gera nome 
				$rand = rand(0, 9999999);
				$novo_nome = $ano_edicao."_BANNER_".$rand.".".$extensao;
				$diretorio = "../uploads/";

				$ds_foto = "UPANDO.".$extensao;
				
				//Renomeia
				rename($diretorio.$ds_foto, $diretorio.$novo_nome);

				//Cadastra Banner
				$sql = mysql_query("INSERT INTO banner (id_banner, id_edicao, titulo, descricao, botao, link, imagem, ordem, dt_criacao, dt_atualizacao, status) 
						VALUES (NULL, '$id_edicao', '$titulo', '$descricao', '$botao', '$link', '$novo_nome', '$ordem', '$today', '', '1')", $bd) or die ('ERRO');
				mysql_close($bd);

				echo "<script>window.location= '../cadastroBanner.php?return=sucess';</script>";

		} else {
			echo "<script>window.location= '../cadastroBanner.php?return=imageNull';</script>";
		}

	} //tamanho imagem
}

function cadastraNoticia() {
	
	include ('config.php');
	$edicao = addslashes($_POST['edicao']);
	//consulta edicao
	$consulta_edicao = mysql_query ("SELECT * FROM edicao WHERE ano = '$edicao'");
	while ($edicao = mysql_fetch_array ($consulta_edicao)) {
	    $id_edicao = $edicao['id_edicao'];
	    $ano_edicao = $edicao['ano'];
	}
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);

	$today = date("d/m/y")." | ".date("H:i");

	// Limita o tamanho da imagem
	if($_FILES['img']['size'] > 1000000){
		echo "<script>window.location= '../cadastroNoticia.php?return=imageBig';</script>";
	} else {

		if(!empty($_FILES['img']['tmp_name'])){ // Se o array $_FILES não estiver vazio
				// Incluímos o arquivo com a classe
				include 'classUploadImagem.php';
				// Associamos a classe à variável $upload
				$upload = new UploadImagem();
				// Determinamos nossa largura máxima permitida para a imagem
				$upload->width = 2000;
				// Determinamos nossa altura máxima permitida para a imagem
				$upload->height = 2000;
					
				echo $upload->salvar("../uploads/", $_FILES['img']);

				//Pega nome e extensão do arquivo
				$file = $_FILES['img'];
				$extensao_aux = explode('.', $file['name']);
				$extensao = end($extensao_aux);
				
				//Gera nome 
				$rand = rand(0, 9999999);
				$novo_nome = $ano_edicao."_NOTICIA_".$rand.".".$extensao;
				$diretorio = "../uploads/";

				$ds_foto = "UPANDO.".$extensao;
				
				//Renomeia
				rename($diretorio.$ds_foto, $diretorio.$novo_nome);

				//Cadastra notícia
				$sql = mysql_query("INSERT INTO noticia (id_noticia, id_edicao, titulo, descricao, imagem, dt_criacao, dt_atualizacao, status) 
						VALUES (NULL, '$id_edicao', '$titulo', '$descricao', '$novo_nome', '$today', '', '1')", $bd) or die ('ERRO');
				mysql_close($bd);

				echo "<script>window.location= '../cadastroNoticia.php?return=sucess';</script>";

		} else {
			echo "<script>window.location= '../cadastroNoticia.php?return=imageNull';</script>";
		}

	} //tamanho imagem
}

function cadastraHospedagem() {
	
	include ('config.php');
	$titulo = addslashes($_POST['titulo']);
	$telefone = addslashes($_POST['telefone']);
	$site = addslashes($_POST['site']);
	$email = addslashes($_POST['email']);

	$today = date("d/m/y")." | ".date("H:i");

	//Cadastra hospedagem

	$sql = mysql_query("INSERT INTO hospedagem (id_hospedagem, titulo, telefone, site, email, dt_criacao, status) 
			VALUES (NULL, '$titulo', '$telefone', '$site', '$endereco', '$today', '1')", $bd) or die ('ERRO');
	mysql_close($bd);

	echo "<script>window.location= '../cadastroHospedagem.php?return=sucess';</script>";

}

?>



</div>
<!-- END PAGE CONTENT WRAPPER -->                                
</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<?php include('../footer.php'); ?>
