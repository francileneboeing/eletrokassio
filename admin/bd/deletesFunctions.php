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
<li class="active">Deletando...</li>
</ul>
<!-- END BREADCRUMB -->  

<!-- ##################### START INSERTS ##################### -->

<?php
switch ($_GET['acao']) {
	case "deletaBanner":
		deletaBanner();
		break;
	case "deletaNoticia":
		deletaNoticia();
		break;
	case "deletaHospedagem":
		deletaHospedagem();
		break;
}
function deletaBanner() {
	
	include ('config.php');
	$id = $_GET['id'];
	

	$sql = mysql_query("SELECT * FROM banner WHERE id_banner = '$id'");
	while ( $banner = mysql_fetch_array ( $sql ) ) {
		$ds_imagem = $banner['imagem'];
		//Deleta img anterior do diretorio
		if(unlink("../uploads/".$ds_imagem)){
			$sql = mysql_query("DELETE FROM banner WHERE id_banner = '$id' ", $bd) or die ('ERRO');
			mysql_close($bd);	
			echo "<script>window.location= '../listaBanner.php?return=sucess';</script>";
		}else{ 
			echo "ERROR AO EXCLUIR FOTO!"; 
		}
	}
}
function deletaNoticia() {
	
	include ('config.php');
	$id = $_GET['id'];
	echo $id;
	

	$sql = mysql_query ( "SELECT * FROM noticia WHERE id_noticia = '$id'" );
	while ( $noticia = mysql_fetch_array ( $sql ) ) {
		$ds_imagem = $noticia['imagem'];
		//Deleta img anterior do diretorio
		if(unlink("../uploads/".$ds_imagem)){
			$sql = mysql_query("DELETE FROM noticia WHERE id_noticia = '$id' ", $bd) or die ('ERRO');
			mysql_close($bd);	
			echo "<script>window.location= '../listaNoticia.php?return=sucess';</script>";
		}else{ 
			echo "ERROR AO EXCLUIR FOTO!"; 
		}
	}
}
function deletaHospedagem() {
	
	include ('config.php');
	$id = $_GET['id'];
	
	$sql = mysql_query("DELETE FROM hospedagem WHERE id_hospedagem = '$id' ", $bd) or die ('ERRO');
	mysql_close($bd);	
	echo "<script>window.location= '../listaHospedagem.php?return=sucess';</script>";

}		
?>




</div>
<!-- END PAGE CONTENT WRAPPER -->                                
</div>            
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<?php include('../footer.php'); ?>
