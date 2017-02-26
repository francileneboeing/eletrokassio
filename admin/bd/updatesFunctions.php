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

<li class="active">Atualizando...</li>
</ul>
<!-- END BREADCRUMB -->  

 

<!-- ##################### START UPDATES ##################### -->

<?php
include ("../restrito.php");

if(!empty($_POST['acao'])){
	switch ($_POST['acao']) {
		case "editaBanner":
			editaBanner();
			break;
		case "editaNoticia":
			editaNoticia();
			break;
		case "editaHospedagem";
			editaHospedagem();
			break;
		case "editaContatos":
			editaContatos();
			break;
		case "editaLocalizacaoMapa":
			editaLocalizacaoMapa();
			break;
		case "editaMapa":
			editaMapa();
			break;
	}
}
if (!empty($_GET['acao'])){
	switch ($_GET['acao']) {
		case "alteraStatusNoticia":
			alteraStatusNoticia();
			break;
	}
}
function editaBanner() {
	
	include ('config.php');
	
	$id = addslashes($_POST['id']);
	$edicao = addslashes($_POST['edicao']);
	//consulta edicao
	$consulta_edicao = mysql_query ("SELECT * FROM edicao WHERE ano = '$edicao'");
	while ($edicao = mysql_fetch_array ($consulta_edicao)){
		$id_edicao = $edicao['id_edicao'];
		$ano_edicao = $edicao['ano'];
	}
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$ordem = addslashes($_POST['ordem']);
	$botao = addslashes($_POST['botao']);
	$link = addslashes($_POST['link']);
	$imagem = addslashes($_POST['imagem']);
	$today = date("d/m/y")." | ".date("H:i");
	
	if(!empty($_FILES['img']['tmp_name'])){ // Se o array $_FILES não estiver vazio
		
		//edita img anterior do diretorio
		if(unlink("../uploads/".$imagem)){		
		
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
			$sql = mysql_query("UPDATE banner SET id_edicao='$id_edicao', titulo='$titulo', descricao='$descricao', botao='$botao', link='$link', imagem='$novo_nome', ordem='$ordem', dt_atualizacao='$today' WHERE id_banner = '$id'");
			mysql_close($bd);

			echo "<script>window.location= '../editaBanner.php?return=sucess&id=".$id."';</script>";
			
		} else {
			echo "ERRO"; 
		}
		
	}else {

		$sql = mysql_query("UPDATE banner SET id_edicao='$id_edicao', titulo='$titulo', descricao='$descricao', botao='$botao', link='$link', ordem='$ordem', dt_atualizacao='$today' WHERE id_banner = '$id'");
		mysql_close($bd);

		echo "<script>window.location= '../editaBanner.php?return=sucess&id=".$id."';</script>";
	}
}
function editaNoticia() {
	
	include ('config.php');
	
	$id = addslashes($_POST['id']);
	$edicao = addslashes($_POST['edicao']);
	//consulta edicao
	$consulta_edicao = mysql_query ("SELECT * FROM edicao WHERE ano = '$edicao'");
	while ($edicao = mysql_fetch_array ($consulta_edicao)) {
		$id_edicao = $edicao['id_edicao'];
		$ano_edicao = $edicao['ano'];
	}
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$imagem = addslashes($_POST['imagem']);
	$today = date("d/m/y")." | ".date("H:i");
	
	if(!empty($_FILES['img']['tmp_name'])){ // Se o array $_FILES não estiver vazio
		
		//edita img anterior do diretorio
		if(unlink("../uploads/".$imagem)){		
		
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
			$sql = mysql_query("UPDATE noticia SET id_edicao='$id_edicao', titulo='$titulo', descricao='$descricao', imagem='$novo_nome', dt_atualizacao='$today' WHERE id_noticia = '$id'");
			mysql_close($bd);
			echo "<script>window.location= '../editaNoticia.php?return=sucess&id=".$id."';</script>";
			
		} else {
			echo "ERRO"; 
		}
		
	}else {

		$sql = mysql_query("UPDATE noticia SET id_edicao='$id_edicao', titulo='$titulo', descricao='$descricao', dt_atualizacao='$today' WHERE id_noticia = '$id'");
		mysql_close($bd);

		echo "<script>window.location= '../editaNoticia.php?return=sucess&id=".$id."';</script>";
	}
}

function editaHospedagem() {
	include ('config.php');

	$id = addslashes($_POST['id']);
	$titulo = addslashes($_POST['titulo']);
	$telefone = addslashes($_POST['telefone']);
	$site = addslashes($_POST['site']);
	$email = addslashes($_POST['email']);

	$sql = mysql_query ( "UPDATE hospedagem SET titulo='$titulo', telefone='$telefone', site='$site', email='$email' WHERE id_hospedagem = '$id'" );
	mysql_close($bd);

	echo "<script>window.location= '../editaHospedagem.php?return=sucess&id=".$id."';</script>";	
}

function alteraStatusNoticia() {
	include ('config.php');
	
	$id = $_GET['id'];
	$status = $_GET['status'];
	$sql = mysql_query ( "UPDATE noticias SET status = '$status' WHERE id = '$id'" );
	mysql_close($bd);
	echo "<script>window.location= '../listaNoticia.php?return=status';</script>";	
}

function editaContatos(){
	include ('config.php');

	$telefone_1 = addslashes($_POST['telefone_1']);
	$telefone_2 = addslashes($_POST['telefone_2']);
    $email = addslashes($_POST['email']);
    $email_form_contato = addslashes($_POST['email_form_contato']);
    $endereco = addslashes($_POST['endereco']);

	$sql = mysql_query ( "UPDATE estrutura_padrao SET telefone_1 = '$telefone_1', telefone_2 = '$telefone_2', email='$email', email_form_contato='$email_form_contato', endereco='$endereco'" );
	mysql_close($bd);
	echo "<script>window.location= '../editaContatos.php?return=sucess';</script>";	
}

function editaLocalizacaoMapa(){
		include ('config.php');

		$mapa = addslashes($_POST['mapa']);

		$sql = mysql_query ( "UPDATE estrutura_padrao SET mapa='$mapa'" );
		mysql_close($bd);
		echo "<script>window.location= '../editaMapaLocalizacao.php?return=sucess';</script>";	
}

function editaMapa(){
		include ('config.php');

		$estandes = addslashes($_POST['estandes']);

		$sql = mysql_query ( "UPDATE mapa SET estandes='$estandes' WHERE id_mapa='001'" );
		mysql_close($bd);

		echo "<script>window.location= '../editaMapa.php?return=sucess';</script>";	
}

?>


</div>
<!-- END PAGE CONTENT WRAPPER -->                                
</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<?php include('../footer.php'); ?>
