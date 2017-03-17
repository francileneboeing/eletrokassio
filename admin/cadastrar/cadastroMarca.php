<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/marcaDAO.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
            $(".l-cadastro").addClass("active");
            $(".l-cadastro-produto").addClass("active");
            $(".l-cadastro-produto-marca").addClass("active");
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
            <li>Marca</li>			
            <li>Adicionar</li>
            <li class="active">Cadastro de Marca</li>
        </ul>
        <!-- END BREADCRUMB -->		
        <?php
        $id = null;
        $descricao = null;
        $icativo = 1;
        $isChecked = "checked";

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 0) {
                $row = findByID($id);
                if ($row != null) {
                    $id            = formatNumber($row['id']);
                    $descricao     = $row['descricao'];
                    $icativo       = $row['icativo'];                    
                    $caminhoImagem = FOTOS_MARCA_ABSOLUTO.'/'.$row['descricao_foto'].'.'.$row['extensao_foto'];                    

                    if ($icativo != 1) {
                        $isChecked = "";
                    }
                }
            }
        } else {
            $id = findMaxID();
            $hiddenDiv     = "hidden";
            $requiredImage = "required";
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
                    <form class="form-horizontal" action="<?php echo DAO; ?>/marcaDAO.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="cadastroMarca">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Cadastro</strong> de Marca</h3>
                            </div>
                            <!-- ALERT! -->
                            <?php
                            if (!empty($_GET['return']) && $_GET['return'] == "sucess") {
                                echo '<div class="alert alert-success" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>Yeah! Marca adicionada com sucesso.';
                                echo '</div>';
                            } else if (!empty($_GET['return']) && $_GET['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>:( Algo aconteceu de errado. Contate o admistrador do sistema!';
                                echo '</div>';
                            }
                            ?>					
                            <div class="panel-body">
                                <p>Preencha os campos abaixo para adicionar uma nova marca.</p>
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
                                    <label class="col-md-3 col-xs-12 control-label">Marca<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="descricao" type="text" class="form-control" required="required" value ="<?php echo $descricao ?>">
                                        </div>
                                        <span class="help-block">Insira uma descrição para a Marca</span>
                                    </div>
                                </div>
                                <div class="form-group" <?php echo $hiddenDiv; ?>>
                                    <label class="col-md-3 col-xs-12 control-label">Imagem Atual</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div>                                            
                                            <img name="img" src="<?php echo $caminhoImagem; ?>">
                                        </div>                                        
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Imagem<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                              
                                        <input type="file" class="file btn-primary" name="img" id="file-simple" title="Procurar" value="<?php echo $caminhoImagem.' '.$requiredImage ?>" >                                        
                                        <span class="help-block">Selecione a imagem de logo da marca. <strong style="color:red;">O tamanho máximo recomendado é de 100kb.</strong> Tamanho ideal: <strong>150x200</strong></span>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <img src="<?php echo $caminhoImagem; ?>">
                                </div>															
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Ativo<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">																									
                                            <input type="checkbox" name="ativo" class="icheckbox" value= "1" <?php echo $isChecked; ?>/>
                                        </div>
                                        <span class="help-block">Deixar marcado caso marca ativa</span>
                                    </div>
                                </div>								
                                <br>
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo LISTAR ?>/listaMarca.php" class="btn btn-big btn-primary pull-left"><span class="fa fa-th-list"></span> Listar Marcas</a>								
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