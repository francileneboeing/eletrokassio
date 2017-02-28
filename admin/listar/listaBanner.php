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
                    <li class="active">Listagem de Banner</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                                         
                            <div class="row">
                                <div class="col-md-12">

                                    <!-- START DATATABLE -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">                                
                                            <h3 class="panel-title"><strong>Listagem</strong> banner</h3>
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
                                                <strong style="margin-right: 5px;">Banner deletado.</strong></div>
                                        <?php } ?>
                                            <table class="table datatable">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 100px;">Código</th>
                                                        <th style="width: 150px;">Edição</th>
                                                        <th style="width: 150px;">Ordem</th>
                                                        <th>Banner</th>
                                                        <th style="width: 200px;">Criada</th>
                                                        <th style="width: 210px;">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    include ('bd/config.php');
                                                    include ('limitaTexto.php');
                                                    $sql = mysql_query ( "SELECT * FROM banner ORDER BY id_banner DESC" );
                                                    while ( $banner = mysql_fetch_array ( $sql ) ) {
                                                        $id_banner = $banner['id_banner'];
                                                        $id_edicao = $banner['id_edicao'];
                                                        //consulta edicao
                                                        $consulta_edicao = mysql_query ( "SELECT * FROM edicao WHERE id_edicao = '$id_edicao'" );
                                                        while ($edicao = mysql_fetch_array ($consulta_edicao)) {
                                                            $ano_edicao = $edicao['ano'];
                                                        }
                                                        $titulo = $banner['titulo'];
                                                        $ordem = $banner['ordem'];
                                                        $dt_criacao = $banner['dt_criacao'];
                                                        $status = $banner['status'];
                                                        if($status == "1"){$status = "Ativo";}else{$status = "Inativo";}
                                                        
                                                        echo "<tr>";
                                                        echo "<td>".$id_banner."</td>";
                                                        echo "<td>".$ano_edicao."</td>";
                                                        echo "<td>".$ordem."</td>";
                                                        echo "<td>".limitarTexto($titulo, $limite = 200)."</td>";
                                                        echo "<td>".$dt_criacao."</td>";
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
                                    <div class="panel-footer">
                                        <a href="cadastroBanner.php" class="btn btn-big btn-primary pull-right"><span class="fa fa-plus"></span> Cadastrar Banner</a>
                                    </div>
                                    <!-- END DATATABLE -->
                            
                        </div>
                    </div> 
                  
                   <!-- danger -->
                   <div class="message-box animated fadeIn" id="message-box">
                       <div class="mb-container">
                           <div class="mb-middle">
                               <div class="mb-title"><span class="fa fa-trash-o"></span> Deletar banner? Essa ação não poderá ser desfeita. <?php echo $variavelphp; ?></div>
                               <div class="mb-content">
                                   <p id="p-message-box">
                                   
                                   </p>
                               </div>
                               <div class="mb-footer">                                   
                                   <button style="margin-right:10px;" class="btn btn-danger btn-lg pull-right mb-control-close">Não</button>
                                   <button onclick="Deletar();" class="btn btn-success btn-lg pull-left">SIM</button>
                               </div>
                               <script type="text/javascript">
                                   var codigo;
                                   function ConfirmDeletar(id){
                                       document.getElementById("p-message-box").innerHTML = '<br>Só gostariamos de confirmar...<br>Você tem certeza que deseja deletar o banner de código: '+id;
                                       codigo = id;
                                   }
                                   function Deletar(){
                                        //EDICA AÇÃO (módulo)
                                        var acao = "deletaBanner";
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