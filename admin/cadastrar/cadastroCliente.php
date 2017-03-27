<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/clienteDAO.php'); ?>
<?php include('../dao/municipioDAO.php'); ?>

<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
            $(".l-cadastro").addClass("active");
            $(".l-cadastro-cliente").addClass("active");
            alteraMascara();
        });
        function alteraMascara() {
            var fieldTipo = document.getElementById("tipo");
            $('#cpfcnpj').removeAttr('placeholder');
            if (fieldTipo.value == 1) {
                $('#cpfcnpj').removeClass("cnpj");
                $('#cpfcnpj').addClass(" cpf");
                //fieldCpfCnpj.className += " cpf";
            } else {
                $('#cpfcnpj').removeClass("cpf");
                $('#cpfcnpj').addClass(" cnpj");
            }
        }
    </script>    

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php include('../nav_vertical.php'); ?>
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Cadastros</li>
            <li>Cliente</li>
            <li>Adicionar</li>
            <li class="active">Cadastro de Cliente</li>
        </ul>
        <!-- END BREADCRUMB -->		
        <?php
        $municipioDAO = new MunicipioDAO();
        $clienteDAO   = new ClienteDAO();
        $isChecked   = 'checked';
        $enviarEmail = 'checked';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 0){
                $cliente = $clienteDAO->findByIDCliente($id);
                if ($cliente !== null){
                    $id          = formatNumber($cliente['id']);
                    $nome        = $cliente['nome'];
                    $tipo        = $cliente['tp_cliente'];
                    $cpfCnpj     = $cliente['cpf_cnpj'];
                    $endereco    = $cliente['endereco'];
                    $bairro      = $cliente['bairro'];
                    $numero      = $cliente['numero'];
                    $cep         = $cliente['cep'];
                    $telefone    = $cliente['telefone'];
                    $idMunicipio = $cliente['id_municipio'];
                    $email       = $cliente['email'];
                    $enviarEmail = $cliente['icenviaemail'];
                    $ativo       = $cliente['icativo'];                    
                    if ($ativo != 1) {
                        $isChecked = "";
                    }
                    if ($enviarEmail != 1){
                        $enviarEmail = "";
                    }else{
                        $enviarEmail = 'checked';
                    }
                    echo 'ativo: '.$ativo.' enviar: '.$enviarEmail;
                    if ($tipo == 1){
                        $isCpfSelected = "selected";
                    }else{
                        $isCnpjSelected = "selected";
                    }
                }
            }
        } else {
            $id = $clienteDAO->findMaxIDCliente();
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
                    <form class="form-horizontal" action="<?php echo DAO; ?>/clienteDAO.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="acao" value="cadastroCliente">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Cadastro</strong> de Cliente</h3>
                            </div>
                            <!-- ALERT! -->
                            <?php
                            if (!empty($_GET['return']) && $_GET['return'] == "sucess") {
                                echo '<div class="alert alert-success" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>Yeah! Cliente adicionado com sucesso.';
                                echo '</div>';
                            } else if (!empty($_GET['return']) && $_GET['return'] == "error" && $_GET['description'] == "nullValues") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong> Preencha os campos obrigatórios!';
                                echo '</div>';
                            } else if (!empty($_GET['return']) && $_GET['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                echo '<strong style="margin-right: 5px;"> </strong>:( Algo aconteceu de errado. Contate o admistrador do sistema!';
                                echo '</div>';
                            }
                            ?>					
                            <div class="panel-body">
                                <p>Preencha os campos abaixo para adicionar um novo Cliente.</p>
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
                                    <label class="col-md-3 col-xs-12 control-label">Nome <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="nome" type="text" class="form-control" required="required"  value="<?php echo $nome; ?>">
                                        </div>	
                                        <span class="help-block">Nome do Cliente</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tipo<span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <select id="tipo" name="tipo" class="form-group select" required onchange="alteraMascara()">
                                                <option value="1" <?php echo $isCpfSelected ?>>CPF</option>
                                                <option value="2" <?php echo $isCnpjSelected ?>>CNPJ</option>
                                            </select>
                                        </div>
                                        <span class="help-block">Selecione o tipo</span>
                                    </div>
                                </div>                                 
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">CPF/CNPJ <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input id="cpfcnpj" name="cpfcnpj" type="text" class="form-control"  required="required" value="<?php echo $cpfCnpj; ?>">
                                        </div>										
                                        <span class="help-block">CPF ou CNPJ do cliente</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Endereço <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="endereco" type="text" class="form-control"required="required" value="<?php echo $endereco; ?>">
                                        </div>										
                                        <span class="help-block">Endereço do cliente. Ex: Rua Frederico Trombock</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Bairro <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="bairro" type="text" class="form-control"required="required" value="<?php echo $bairro; ?>">
                                        </div>										
                                        <span class="help-block">Bairro do cliente. Ex: Centro</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Número <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="numero" type="text" class="form-control"required="required" value="<?php echo $numero; ?>">
                                        </div>										
                                        <span class="help-block">Número da casa do cliente. Ex: 345 ou S/N</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">CEP <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="cep" type="text" class="cep form-control"required="required" value="<?php echo $cep; ?>">
                                        </div>										
                                        <span class="help-block">CEP do cliente. Ex: 88730-000</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Telefone <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="telefone" type="text" class="cep form-control"required="required" value="<?php echo $telefone; ?>">
                                        </div>										
                                        <span class="help-block">Telefone do cliente. Ex: (48) 3466-0000 / (48) 99912-3344</span>
                                    </div>
                                </div>                                 
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Município<span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <select name="idMunicipio" class="form-group select" data-live-search="true" required>
                                                <option selected disabled>Nenhum</option> 
                                                <?php
                                                $result = $municipioDAO->findAllMunicipio();
                                                if ($result->num_rows > 0) {
                                                    while ($municipio = $result->fetch_assoc()) {
                                                        if ($idMunicipio == $municipio['id']) {
                                                            echo "<option value=\"" . $municipio['id'] . "\" selected>" . $municipio['id'] . " - " . $municipio['nome'] . "</option>";
                                                        } else {
                                                            echo "<option value=\"" . $municipio['id'] . "\">" . $municipio['id'] . " - " . $municipio['nome']. " (".$municipio['uf'].")</option>";
                                                        }
                                                    }
                                                }
                                                ?>                                                
                                            </select>
                                        </div>
                                        <span class="help-block">Muncípio do cliente. Ex: Rio Fortuna</span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">E-mail <span class="red">*</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input name="email" type="text" class="form-control"required="required" value="<?php echo $email; ?>">
                                        </div>										
                                        <span class="help-block">E-mail do cliente. Ex: contato@bgstudio.com.br</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Enviar E-mail<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">																									
                                            <input id="enviaremail" type="checkbox" name="enviaremail" class="icheckbox" value= "1" <?php echo $enviarEmail; ?>/>
                                            <span class="help-block">Deixar marcado caso o cliente deseja receber e-mails da empresa</span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Ativo<span class="red"> *</span></label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">																									
                                            <input type="checkbox" name="ativo" class="icheckbox" value= "1" <?php echo $isChecked; ?>/>
                                            <span class="help-block">Deixar marcado caso cliente ativo</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>                                
                            </div>
                            <div class="panel-footer">
                                <a href="<?php echo LISTAR ?>/listaCliente.php" class="btn btn-big btn-primary pull-left"><span class="fa fa-th-list"></span> Listar Clientes</a>								
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