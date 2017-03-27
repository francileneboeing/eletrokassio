<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/produtoDAO.php'); ?>
<?php include('../dao/categoriaProdutoDAO.php'); ?>
<?php include('../dao/marcaDAO.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
            $(".l-cadastro").addClass("active");
            $(".l-cadastro-produto").addClass("active");
            $(".l-cadastro-produto-produto").addClass("active");            
        });        
    </script>    

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php include('../nav_vertical.php'); ?>
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Cadastros</li>
            <li>Produto</li>
            <li>Marca</li>			
            <li>Adicionar</li>
            <li class="active">Cadastro de Produto</li>
        </ul>
        <!-- END BREADCRUMB -->		
        <?php
        $produtoDAO          = new ProdutoDAO();
        $marcaDAO            = new MarcaDAO();
        $categoriaProdutoDAO = new CategoriaProdutoDAO();
        
        $id = null;
        $descricao = null;
        $icativo = 1;
        $isChecked = "checked";
        $isProdutoSelected = '';
        $isServicoSelected = '';

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 0){
                $produto = $produtoDAO->findByIDProduto($id);
                if ($produto !== null){
                    $id                 = formatNumber($id);
                    $descricao          = $produto['descricao'];
                    $descricaoAbreviada = $produto['desc_abreviada'];
                    $valor              = $produto['vl_produto'];
                    $qtdEstoque         = $produto['qtd_estoque'];
                    $tipo               = $produto['tp_produto'];
                    $idSubcategoia      = $produto['id_subcategoria'];
                    $idMarca            = $produto['id_marca'];
                    $icativo            = $produto['icativo'];
                    if ($icativo != 1) {
                        $isChecked = "";
                    }
                    if ($tipo === 1){
                        $isProdutoSelected = "selected";
                    }else{
                        $isServicoSelected = "selected";
                    }
                }
            }
        } else {
            $id = $produtoDAO->findMaxIDProduto();
        }
        ?>
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <script type="text/javascript">
                        function notySuccess()) {
                            $(document).ready(function () {
                                noty({text: 'Successful action', layout: 'topRight', type: 'success'})
                            });
                        }
                    </script>
                    <!-- COMEÇA FORMULÁRIO -->
                    <form class="form-horizontal" action="<?php echo DAO; ?>/produtoDAO.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="cadastroProduto">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Cadastro</strong> de Produto</h3>
                            </div>
                            <!-- ALERT! -->
                            <?php
                            if (!empty($_GET['return']) && $_GET['return'] == "sucess") {
                                echo '<div class="alert alert-success" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>Yeah! Produto adicionado com sucesso.';
                                echo '</div>';
                            }else if (!empty($_GET['return']) && $_GET['return'] == "error" && $_GET['description'] == "nullValues") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong> Preencha os campos obrigatórios!';
                                echo '</div>';
                            }else if (!empty($_GET['return']) && $_GET['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>:( Algo aconteceu de errado. Contate o admistrador do sistema!';
                                echo '</div>';
                            }
                            ?>					
                            <div class="panel-body">
                                <p>Preencha os campos abaixo para adicionar um novo produto.</p>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Código <span class="red" >*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="id" type="text" class="form-control" required="required" readonly value="<?php echo $id; ?>">
                                        </div>										
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Descrição <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="descricao" type="text" class="form-control" required="required"  value="<?php echo $descricao; ?>">
                                        </div>	
                                        <span class="help-block">Descrição do Produto</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Descrição Abreviada <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="descricaoAbreviada" type="text" class="form-control" maxlength="10" required="required" value="<?php echo $descricaoAbreviada; ?>">
                                        </div>										
                                        <span class="help-block">Descrição Abreviada do Produto</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Valor <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="valor" type="text" class="money form-control"required="required" value="<?php echo $valor; ?>">
                                        </div>										
                                        <span class="help-block">Insira o Valor do Produto</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Quantidade Estoque <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="qtdEstoque" type="text" class="decimal-2 form-control"required="required" value="<?php echo $qtdEstoque; ?>">
                                        </div>										
                                        <span class="help-block">Insira o Valor do Produto</span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tipo<span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <select name="tipo" class="form-group select" required>
                                                <option value="1" <?php echo $isProdutoSelected ?>>Produto</option>
                                                <option value="2" <?php echo $isServicoSelected ?>>Serviço</option>
                                            </select>
                                        </div>
                                        <span class="help-block">Selecione o tipo</span>
                                    </div>
                                </div>                                 
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">SubCategoria<span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <select name="idSubCategoria" class="form-group select" data-live-search="true" required>
                                                <option selected disabled>Nenhum</option>
                                                <?php
                                                $result = $categoriaProdutoDAO->findAllOnlySubCategoria();
                                                if ($result->num_rows > 0) {
                                                    while ($sucategoria = $result->fetch_assoc()) {
                                                        if ($idSubcategoia == $sucategoria['id']) {
                                                            echo "<option value=\"" . $sucategoria['id'] . "\" selected>" . $sucategoria['id'] . " - " . $sucategoria['descricao'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"" . $sucategoria['id'] . "\">" . $sucategoria['id'] . " - " . $sucategoria['descricao'] . "</option>";
                                                        }
                                                    }
                                                }
                                                ?>	                                                    
                                            </select>
                                        </div>
                                        <span class="help-block">Selecione a qual Marca o produto pertence</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Marca<span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <select name="idMarca" class="form-group select" data-live-search="true" required>
                                                <option selected disabled>Nenhum</option>
                                                <?php
                                                $result = $marcaDAO->findAllMarca();
                                                if ($result->num_rows > 0) {
                                                    while ($marca = $result->fetch_assoc()) {
                                                        if ($idMarca == $marca['id']) {
                                                            echo "<option value=\"" . $marca['id'] . "\" selected>" . $marca['id'] . " - " . $marca['descricao'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"" . $marca['id'] . "\">" . $marca['id'] . " - " . $marca['descricao'] . "</option>";
                                                        }
                                                    }
                                                }
                                                ?>	                                                    
                                            </select>                                            
                                        </div>
                                        <span class="help-block">Selecione a qual SubCategoria o produto pertence</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Ativo<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">																									
                                            <input type="checkbox" name="ativo" class="icheckbox" value= "1" <?php echo $isChecked; ?>/>
                                            <span class="help-block">Deixar marcado caso produto ativa</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br>                                
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo LISTAR ?>/listaProduto.php" class="btn btn-big btn-primary pull-left"><span class="fa fa-th-list"></span> Listar Produtos</a>								
                                <button class="btn btn-big btn-primary pull-right">Salvar</button>
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