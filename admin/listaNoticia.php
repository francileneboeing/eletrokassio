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
                    <li class="active">Listagem de Notícia</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                                         
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">                                
                                            <h3 class="panel-title"><strong>Listagem</strong> notícia</h3>
                                            <ul class="panel-controls">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                            </ul>                                
                                        </div>
                                        <div class="panel-body">
                                        <!-- ALERT! -->
                                        <?php
                                            if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <strong style="margin-right: 5px;">Notícia deletada.</strong></div>
                                        <?php } ?>
                                            <table class="table datatable">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 100px;">Código</th>
                                                        <th style="width: 150px;">Edição</th>
                                                        <th>Notícia</th>
                                                        <th style="width: 200px;">Criada</th>
                                                        <th style="width: 210px;">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    include ('bd/config.php');
                                                    include ('limitaTexto.php');
                                                    $sql = mysql_query ( "SELECT * FROM noticia ORDER BY id_noticia DESC" );
                                                    while ( $noticia = mysql_fetch_array ( $sql ) ) {
                                                        $id_noticia = $noticia['id_noticia'];
                                                        $id_edicao = $noticia['id_edicao'];
                                                        //consulta edicao
                                                        $consulta_edicao = mysql_query ( "SELECT * FROM edicao WHERE id_edicao = '$id_edicao'" );
                                                        while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                            $ano_edicao = $edicao['ano'];
                                                        }
                                                        $titulo = $noticia['titulo'];
                                                        $dt_criacao = $noticia['dt_criacao'];
                                                        $status = $noticia['status'];
                                                        if($status == "1"){$status = "Ativo";}else{$status = "Inativo";}
                                                        
                                                        echo "<tr>";
                                                        echo "<td>".$id_noticia."</td>";
                                                        echo "<td>".$ano_edicao."</td>";
                                                        echo "<td>".limitarTexto($titulo, $limite = 200)."</td>";
                                                        echo "<td>".$dt_criacao."</td>";
                                                        echo "<td style=\"text-align:right;\">
                                                                <a class=\"btn btn-warning\" href=\"editaNoticia.php?id=".$id_noticia."\">
                                                                <span class=\"fa fa-edit\"></span> Editar</a>
                                                                <button type=\"button\" class=\"btn btn-danger mb-control\" onclick=\"ConfirmDeletar(".$id_noticia.");\" data-box=\"#message-box\">
                                                                <span class=\"fa fa-trash-o\"></span> Deletar</button>
                                                             </td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="cadastroNoticia.php" class="btn btn-big btn-primary pull-right"><span class="fa fa-plus"></span> Cadastrar Notícia</a>
                                    </div>
                                    <!-- END DATATABLE -->
                            
                        </div>
                    </div> 
                  
                   <!-- danger -->
                   <div class="message-box animated fadeIn" id="message-box">
                       <div class="mb-container">
                           <div class="mb-middle">
                               <div class="mb-title"><span class="fa fa-trash-o"></span> Deletar notícia? <?php echo $variavelphp; ?></div>
                               <div class="mb-content">
                                   <p id="p-message-box">
                                   
                                   </p>
                               </div>
                               <div class="mb-footer">
                                   <button onclick="Deletar();" class="btn btn-success btn-lg pull-right">SIM</button>
                                   <button style="margin-right:10px;" class="btn btn-danger btn-lg pull-right mb-control-close">Não</button>
                               </div>
                               <script type="text/javascript">
                                   var codigo;
                                   function ConfirmDeletar(id){
                                       document.getElementById("p-message-box").innerHTML = '<br>Só gostariamos de confirmar...<br>Você tem certeza que deseja deletar a notícia de código: '+id;
                                       codigo = id;
                                   }
                                   function Deletar(){
                                        //EDICA AÇÃO (módulo)
                                        var acao = "deletaNoticia";
                                        window.location= "bd/deletesFunctions.php?id="+codigo+"&acao="+acao;
                                   }   
                               </script>
                           </div>
                       </div>
                   </div>
                   <!-- end danger -->     
                
                    
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