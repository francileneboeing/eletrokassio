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
                    <li>Banner</li>
                    <li class="active">Editar Banner</li>
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
                            <input type="hidden" name="acao" value="editaBanner">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Editar</strong> Banner</h3>
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
                                        <strong style="margin-right:5px;">OPS! </strong>  É essencial que você selecione uma imagem para este banner.
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
                                        $sql = mysql_query ( "SELECT * FROM banner WHERE id_banner = '$id'" );
                                        while ($Banner = mysql_fetch_array ($sql)) {
                                            $id = $Banner['id_banner'];
                                            $id_edicao = $Banner['id_edicao'];
                                            //consulta edicao
                                            $consulta_edicao = mysql_query ( "SELECT * FROM edicao WHERE id_edicao = '$id_edicao'" );
                                            while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                $ano_edicao = $edicao['ano'];
                                            }
                                            $titulo = $Banner['titulo'];
                                            $descricao = $Banner['descricao'];
                                            $botao = $Banner['botao'];
                                            $link = $Banner['link'];
                                            $imagem = $Banner['imagem'];
                                            $ordem = $Banner['ordem'];
                                            $dt_criacao = $Banner['dt_criacao'];
                                            $status = $Banner['status'];
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
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Ordem:</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="ordem" class="form-control select">
                                                <option value="<?php echo $ordem; ?>"><?php echo $ordem; ?></option>
                                                <?php
                                                    //consulta edicao
                                                    $consulta_banner = mysql_query ("SELECT * FROM banner WHERE id_edicao = '$id_edicao'");
                                                    $cont = mysql_num_rows($consulta_banner);
                                                    $i = 1;                                                    
                                                    while ($i <= $cont):
                                                        echo "<option value=\"".$i."\">".$i."</option>";
                                                        $i++;
                                                    endwhile;
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
                                        <label class="col-md-3 col-xs-12 control-label">Subtitulo</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="descricao"  value="<?php echo $descricao; ?>" type="text" class="form-control" required>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nome do Botão</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="botao" value="<?php echo $botao; ?>" type="text" class="form-control" required>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Link do Botão</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input name="link" value="<?php echo $link; ?>" type="text" class="form-control" required>
                                            </div>                                            
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
                                            <span class="help-block">Selecione uma imagem para esta Banner. O tamanho máximo permitido é de 500kb. Tamanho ideal: <strong>1920x430</strong></span>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                                <div class="panel-footer">
                                    <a href="listaBanner.php" class="btn btn-big btn-info"><span class="fa fa-th-list"></span> Listar Banners</a>
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




