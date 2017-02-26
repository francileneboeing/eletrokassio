<?php include('restrito.php'); ?>
<?php include('header.php'); ?>

        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <?php include('sidebar.php'); ?>
            <script>
                $(document).ready(function(){
                    $(".l_cont_site").addClass("active");
                    $(".l_banner").addClass("active");
                });
            </script>  
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
               <?php include('nav_vertical.php'); ?>                

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>Inicio</li>                    
                    <li>Banner</li>
                    <li class="active">Cadastro de Banner</li>
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
                            <input type="hidden" name="acao" value="cadastraBanner">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Cadastro</strong> banner</h3>
                                </div>

                                <!-- ALERT! -->
                                <?php
                                    if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right: 5px;">Yeah! </strong>  Banner adicionado com sucesso.
                                    </div>
                                <?php } ?>
                                <?php if (!empty($_GET ['return']) && $_GET ['return'] == "imageNull") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right:5px;">OPS! </strong>  É essencial que você selecione uma imagem para este banner.
                                    </div>
                                <?php } ?>
                                <?php if (!empty($_GET ['return']) && $_GET ['return'] == "imageBig") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right:5px;">OPS! </strong>  Sua imagem ultrapassou 1mb, que tal salvá-la em um tamanho menor?
                                    </div>
                                <?php } ?>


                                <div class="panel-body">
                                    <p>Preencha os campos abaixo para adicionar um novo banner.</p>
                                </div>
                                <div class="panel-body">  
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Título<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="titulo" type="text" class="form-control" required>
                                            </div>                                            
                                            <span class="help-block">Insira o título do banner.</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Subtitulo<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="descricao" type="text" class="form-control" required>
                                            </div>                                            
                                            <span class="help-block">Insira o subtitulo do banner.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nome do botão</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="botao" type="text" class="form-control">
                                            </div>                                            
                                            <span class="help-block">Insira um nome ao botão do banner. Ex.: Saiba mais.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Link do botão</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="link" type="text" class="form-control">
                                            </div>                                            
                                            <span class="help-block">Insira uma url para onde o botão irá redimensionar. Ex.: http://eletrokassio.com.br/contato.</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Imagem<span class="red"> *</span></label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                              
                                            <input type="file" class="file btn-primary" name="img" id="file-simple" title="Procurar" required>
                                            <span class="help-block">Selecione a imagem do banner. <strong style="color:red;">O tamanho máximo recomendado é de 500kb.</strong> Tamanho ideal: <strong>1920x430</strong></span>
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
                                    <a href="listaBanner.php" class="btn btn-big btn-info"><span class="fa fa-th-list"></span> Listar Banners</a>
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




