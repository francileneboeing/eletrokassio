<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/categoriaProdutoDAO.php'); ?>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
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
        <ul class="breadcrumb"
            <li>Inicio</li>
            <li>Cadastros</li>
            <li>Produto</li>
            <li>Categoria</li>			
            <li>Adicionar</li>
            <li class="active">Cadastro de Categoria</li>
        </ul>
        <!-- END BREADCRUMB -->		
        <?php
        $categoriaProdutoDAO = new CategoriaProdutoDAO();
        $id = null;
        $descricao = null;
        $icativo = 1;
        $idPai = null;
        $isChecked = "checked";
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 0) {
                $row = $categoriaProdutoDAO->findByIDCategoria($id);
                if ($row != null) {
                    $id = formatNumber($row['id']);
                    $descricao = $row['descricao'];
                    $icativo = $row['icativo'];
                    $idPai = $row['id_pai'];
                    if ($icativo != 1) {
                        $isChecked = "";
                    }
                }
            }
        } else {
            $id = $categoriaProdutoDAO->findMaxIDCategoria();
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
                    <form class="form-horizontal" action="<?php echo DAO; ?>/categoriaProdutoDAO.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="cadastraCategoriaProduto">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Cadastro</strong> de Categoria/Subcategoria</h3>
                            </div>
                            <!-- ALERT! -->
                            <?php
                            if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") {
                                echo '<div class="alert alert-success" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>Yeah! Categoria adicionada com sucesso.';
                                echo '</div>';
                            } else if (!empty($_GET ['return']) && $_GET ['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>:( Algo aconteceu de errado. Contate o admistrador do sistema!';
                                echo '</div>';
                            }
                            ?>					
                            <div class="panel-body">
                                <p>Preencha os campos abaixo para adicionar uma nova categoria.</p>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Código</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="codigo" type="text" class="form-control" required="required" readonly value="<?php echo $id; ?>">
                                        </div>										
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Categoria<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="descricao" type="text" class="form-control" required="required" value ="<?php echo $descricao ?>">
                                        </div>
                                        <span class="help-block">Insira uma descrição para a categoria</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Categoria Pai<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <select name="categoriaPai" class="form-control select" data-live-search="true">
                                                <option value="null">Nenhum</option>
                                                <?php
                                                $result = $categoriaProdutoDAO->findAllOnlyCategoria();
                                                if ($result->num_rows > 0) {
                                                    while ($categoria = $result->fetch_assoc()) {
                                                        if ($idPai == $categoria['id']) {
                                                            echo "<option value=\"" . $categoria['id'] . "\" selected>" . $categoria['id'] . " - " . $categoria['descricao'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"" . $categoria['id'] . "\">" . $categoria['id'] . " - " . $categoria['descricao'] . "</option>";
                                                        }
                                                    }
                                                }
                                                ?>									                                          
                                            </select>											
                                        </div>
                                        <span class="help-block">Informe este campo caso o mesmo seja uma subcategoria de uma categoria.</span>
                                    </div>
                                </div>								
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Ativo<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">																									
                                            <input type="checkbox" name="ativo" class="icheckbox" value= "1" <?php echo $isChecked; ?>/>
                                        </div>
                                        <span class="help-block">Deixar marcado caso categoria ativa</span>
                                    </div>
                                </div>								
                                <br>
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo LISTAR ?>/listaCategoriaSubcategoria.php" class="btn btn-big btn-primary pull-left"><span class="fa fa-th-list"></span> Listar Categorias</a>								
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