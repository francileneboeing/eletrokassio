<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<div class="page-container">
	<?php include('../sidebar.php'); ?>
	<script>
		$(document).ready(function(){
		$(".l-cadastro").addClass("active");
		$(".l-cadastro-produto").addClass("active");
		$(".l-cadastro-produto-categoria").addClass("active");
		});
	</script>
	<div class="page-content">
		
		<!-- START X-NAVIGATION VERTICAL -->
		<?php include('../nav_vertical.php'); ?>
		<!-- START BREADCRUMB -->
		<ul class="breadcrumb">
			<li>Inicio</li>
			<li>Cadastros</li>
			<li>Produto</li>
			<li>Categoria</li>
			<li>Listar</li>
			<li class="active">Listagem de Categoria/SubCategorias</li>
		</ul>
		<div class="page-content-wrap">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Listagem</h3>
							<ul class="panel-controls">
								<li><a href="<?php echo LISTAR ?>/listaCategoriaSubcategoria.php" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<table class="table datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Descrição</th>
										<th>Categoria Pai</th>
										<th>Status</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include('..bd/config.php');
									include('..limitaTexto.php');
									$sql = mysql_query ("SELECT * FROM produto_categoria ORDER BY id");
									while ( $categoria = mysql_fetch_array ( $sql ) ) {
										$id            	   = $categoria['id'];
										$descricao    	   = $categoria['descricao'];
										$idPai        	   = $categoria['id_pai'];
										$icAtivo           = $categoria['icativo'];
										$descricaoCategPai = null;
										$descriaoStatus    = null;
										if ($idPai > 0){
											$sqlPai = mysql_query("SELECT * FROM produto_categoria WHERE id = $idPai");
											if ($categoriaPai = mysql_fetch_array ($sqlPai )){
												$descricaoCategPai = $categoriaPai['descricao'];
											}
										}
										if ($icAtivo == 1){
											$descriaoStatus = "Ativo";
										}else{
											$descriaoStatus = "Inativo";
										}
										echo "<tr>";
										echo "<td>".$id."</td>";
										echo "<td>".$descricao."</td>";
										echo "<td>".$descricaoCategPai."</td>";
										echo "<td>".$descriaoStatus."</td>";										
										echo "<td style=\"text-align:right;\">
                                                <a class=\"btn btn-warning\" href=\"editaBanner.php?id=".$id_banner."\">
                                                <span class=\"fa fa-edit\"></span> Editar</a>
                                                <button type=\"button\" class=\"btn btn-danger mb-control\" onclick=\"ConfirmDeletar(".$id_banner.");\" data-box=\"#message-box\">
                                                <span class=\"fa fa-trash-o\"></span> Deletar</button>
                                             </td>";										
										echo "</tr>";
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
<?php include('../footer.php');?>