<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<!-- START PAGE CONTAINER -->
<div class="page-container">
	
	<!-- START PAGE SIDEBAR -->
	<?php include('../sidebar.php'); ?>
	<script>
	$(document).ready(function(){	
	$(".l-cadastro").addClass("active");
	$(".l-cadastro-produto").addClass("active");
	$(".l-cadastro-produto-categoria").addClass("active");
	});
	</script>
	
	<!-- PAGE CONTENT -->
	<div class="page-content">
		
		<!-- START X-NAVIGATION VERTICAL -->
		<?php include('../nav_vertical.php'); ?>
		<!-- START BREADCRUMB -->
		<ul class="breadcrumb">
			<li>Inicio</li>
			<li>Produto</li>
			<li class="active">Cadastro de Categoria</li>
		</ul>
		<!-- END BREADCRUMB -->
		
		<!-- PAGE CONTENT WRAPPER -->
		<div class="page-content-wrap">
			<div class="row">
				<div class="col-md-12">
					<script type="text/javascript">
					function notySuccess()){
					$(document).ready(function() {noty({text: 'Successful action', layout: 'topRight', type: 'success'})});
					}
					
					</script>
					<!-- COMEÇA FORMULÁRIO -->
					<form class="form-horizontal" action="<?php echo ADMIN; ?>/bd/insertsFunctions.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="acao" value="cadastraCategoriaProduto">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Cadastro</strong> de Categorias</h3>
							</div>
							<!-- ALERT! -->
							<?php
							if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") { ?>
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong style="margin-right: 5px;">Yeah! </strong>  Categoria adicionada com sucesso.
							</div>
							<?php } ?>
							<div class="panel-body">
								<p>Preencha os campos abaixo para adicionar uma nova categoria.</p>
							</div>
							<div class="panel-body">
								<div class="form-group" hidden="true">
									<label class="col-md-3 col-xs-12 control-label">Código<span class="red"> *</span></label>
									<div class="col-md-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input name="codigo" type="text" class="form-control" value ="0" required>
										</div>										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Descrição<span class="red"> *</span></label>
									<div class="col-md-6 col-xs-12">
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input name="descricao" type="text" class="form-control" required>
										</div>
										<span class="help-block">Insira uma Descrição para a categoria</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Categoria Pai<span class="red"> *</span></label>
									<div class="col-md-6 col-xs-12">
										<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
										<select name="categoriaPai" class="form-control select">
										<<option value="null">Nenhum</option>										
                                            <?php
                                                include ('bd/config.php');
                                                $consulta_categoria = mysql_query ("SELECT * FROM produto_categoria WHERE id_pai is NULL ORDER BY descricao;");
                                                while ($categoria = mysql_fetch_array ($consulta_categoria)) {
                                                    echo "<option value=\"".$categoria['id']."\">".$categoria['id']." - ".$categoria['descricao']."</option>";
                                                }
                                            ?>
                                            </select>
											
										</div>
										<span class="help-block">Informe este campo caso o mesmo seje uma subcategoria de uma categoria.</span>
									</div>
								</div>								
								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Ativo<span class="red"> *</span></label>
									<div class="col-md-6 col-xs-12">
										<div class="input-group">														
											<input name="ativo" class="check" type="checkbox" value="1">
										</div>
										<span class="help-block">Deixar marcado caso categoria ativa</span>
									</div>
								</div>								
								<br>
							</div>
							<div class="panel-footer">
								<a href="<?php echo ADMIN ?>/listar/listaProduto.php" class="btn btn-big btn-primary pull-left"><span class="fa fa-th-list"></span> Listar Produtos</a>								
								<button class="btn btn-big btn-primary pull-right">Cadastrar</button>
							</div>
						</div>
					</form>
					
				</div>
			</div>
			<div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
			<div class="block-full-width"></div>
			<!-- END DASHBOARD CHART -->
			
		</div>
		<!-- END PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<?php include('../footer.php'); ?>