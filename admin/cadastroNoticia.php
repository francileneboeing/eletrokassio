<?php include('restrito.php'); ?>
<?php include('header.php'); ?>

        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <?php include('sidebar.php'); ?>
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
               <?php include('nav_vertical.php'); ?>                  

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>Inicio</li>                    
                    <li>Notícia</li>
                    <li class="active">Cadastro de Notícia</li>
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
                            <form class="form-horizontal" action="bd/insertsFunctions.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="acao" value="cadastraNoticia">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Cadastro</strong> notícia</h3>
                                </div>

                                <!-- ALERT! -->
                                <?php
                                    if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right: 5px;">Yeah! </strong>  Notícia adicionada com sucesso.
                                    </div>
                                <?php } ?>
                                <?php if (!empty($_GET ['return']) && $_GET ['return'] == "imageNull") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right:5px;">OPS! </strong>  É essencial que você selecione uma imagem para esta notícia.
                                    </div>
                                <?php } ?>
                                <?php if (!empty($_GET ['return']) && $_GET ['return'] == "imageBig") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right:5px;">OPS! </strong>  Sua imagem ultrapassou 1mb, que tal salvá-la em um tamanho menor?
                                    </div>
                                <?php } ?>


                                <div class="panel-body">
                                    <p>Preencha os campos abaixo para adicionar uma nova notícia a determinada edição da Feagro.</p>
                                </div>
                                <div class="panel-body">  

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Edição<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="edicao" class="form-control select">
                                            <?php
                                                include ('bd/config.php');

                                                //consulta edicao
                                                $consulta_edicao = mysql_query ("SELECT * FROM edicao ORDER BY ano DESC");
                                                while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                    echo "<option value=\"".$edicao['ano']."\">".$edicao['ano']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <span class="help-block">Selecione a edição da Feagro.</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Título<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="titulo" type="text" class="form-control" required>
                                            </div>                                            
                                            <span class="help-block">Insira o título da notícia.</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Descrição<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea name="descricao" class="summernote"></textarea>
                                            <span class="help-block">Insira a descrição da notícia.</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Imagem<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="file btn-primary" name="img" id="file-simple" title="Procurar" required>
                                            <span class="help-block">Selecione uma imagem para esta notícia. <strong style="color:red;">O tamanho máximo recomendado é de 500kb.</strong></span>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tags</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <input type="text" class="tagsinput" value="Notícia"/>
                                        </div>
                                    </div> -->
                                    <br>

                                </div>
                                <div class="panel-footer">
                                    <a href="listaNoticia.php" class="btn btn-big btn-info"><span class="fa fa-th-list"></span> Listar Notícias</a>
                                    <!-- <button class="btn btn-big btn-default">Limpar</button>     -->
                                    <button class="btn btn-big btn-primary pull-right">Cadastrar</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div> 
                     
                    <!-- START DASHBOARD CHART -->
                    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
                    <div class="block-full-width"></div>                    
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

<?php include('footer.php'); ?>




