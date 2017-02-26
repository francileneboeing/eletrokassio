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
                    <li class="active">Editar Notícia</li>
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
                            <form class="form-horizontal" action="bd/updatesFunctions.php" method="post" enctype="multipart/form-data">
                            <!-- ação do formulário -->
                            <input type="hidden" name="acao" value="editaNoticia">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Editar</strong> notícia</h3>
                                </div>

                                <!-- ALERT! -->
                                <?php
                                    if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") { ?>
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong style="margin-right: 5px;">Yeah! </strong>  As alterações foram salvas com sucesso.
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
                                        <strong style="margin-right:5px;">OPS! </strong>  Sua imagem ultrapassou o tamanho máximo permitido. Que tal salvá-la em um tamanho menor?
                                    </div>
                                <?php } ?>

                                <div class="panel-body">  
                                    <?php
                                        include ('bd/config.php');
                                        include ('limitaTexto.php');
                                        $id = $_GET['id'];
                                        $sql = mysql_query ( "SELECT * FROM noticia WHERE id_noticia = '$id'" );
                                        while ( $noticia = mysql_fetch_array ( $sql ) ) {
                                            $id = $noticia['id_noticia'];
                                            $id_edicao = $noticia['id_edicao'];
                                            //consulta edicao
                                            $consulta_edicao = mysql_query ( "SELECT * FROM edicao WHERE id_edicao = '$id_edicao'" );
                                            while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                $ano_edicao = $edicao['ano'];
                                            }
                                            $titulo = $noticia['titulo'];
                                            $descricao = $noticia['descricao'];
                                            $imagem = $noticia['imagem'];
                                            $dt_criacao = $noticia['dt_criacao'];
                                            $status = $noticia['status'];
                                            if($status == "1"){$status = "Ativo";}else{$status = "Inativo";}
                                        }
                                        ?>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Edição</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="edicao" class="form-control select">
                                                <option value="<?php echo $ano_edicao; ?>"><?php echo $ano_edicao; ?></option>
                                                <?php
                                                    //consulta edicao
                                                    $consulta_edicao = mysql_query ("SELECT * FROM edicao ORDER BY ano DESC");
                                                    while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                        echo "<option value=\"".$edicao['ano']."\">".$edicao['ano']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Título</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="titulo" value="<?php echo $titulo; ?>" type="text" class="form-control" required>
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Descrição</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea name="descricao" class="summernote"><?php echo $descricao; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-md-3 col-xs-12 control-label">Imagem</label>
                                        <div class="col-md-6 col-xs-12">      
                                            <img style="margin: 10px 0;" alt="" src="<?php echo $url."/uploads/".$imagem; ?>" width="" height="140">
                                            <input type="hidden" name="imagem" value="<?php echo $imagem; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-3 col-xs-12 control-label">Alterar?</label>
                                        <div class="col-md-6 col-xs-12">      
                                            <input type="file" class="file btn-primary" name="img" id="file-simple" title="Procurar">
                                            <span class="help-block">Selecione uma imagem para esta notícia. O tamanho máximo permitido é de 500kb.</span>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <div class="panel-footer">
                                    <a href="listaNoticia.php" class="btn btn-big btn-info"><span class="fa fa-th-list"></span> Listar Notícias</a>
                                    <!-- <button class="btn btn-big btn-default">Limpar</button>     -->
                                    <button class="btn btn-big btn-primary pull-right">Salvar</button>
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




