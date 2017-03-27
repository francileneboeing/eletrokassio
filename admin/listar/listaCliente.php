<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/clienteDAO.php'); ?>


<div class="page-container">	
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
            $(".l-cadastro").addClass("active");
            $(".l-cadastro-cliente").addClass("active");
        });
    </script>
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php include('../nav_vertical.php'); ?>
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Cadastros</li>
            <li>Cliente</li>
            <li class="active">Listagem de Cliente</li>
        </ul>
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Listagem de Cliente</h3>
                            <ul class="panel-controls">
                                <li><a href="<?php echo CADASTRAR ?>/cadastroCliente.php"><span class="fa fa-plus"></span>Adicionar</a></li>
                                <li><a href="<?php echo LISTAR ?>/listaCliente.php" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">						
                            <?php
                            if (!empty($_GET ['return']) && $_GET ['return'] == "sucess") {
                                echo '<div class="alert alert-success" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                if (!empty($_GET ['description']) && $_GET ['description'] == "status") {
                                    echo '<strong style="margin-right: 5px;"> </strong>Status alterado com sucesso!';
                                } else if (!empty($_GET ['description']) && $_GET ['description'] == "update") {
                                    echo '<strong style="margin-right: 5px;"> </strong>Cliente atualizado com sucesso!';
                                } else {
                                    echo '<strong style="margin-right: 5px;"> </strong>Yeah! Cliente removido com sucesso.';
                                }
                                echo '</div>';
                            } else if (!empty($_GET ['return']) && $_GET ['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                if (!empty($_GET ['description']) && $_GET ['description'] == "fk") {
                                    echo '<strong style="margin-right: 5px;"> </strong>Não foi possível deletar o registro. Existem registros vinculadas a este cliente. Exclua-os primeiro!';
                                } else if (!empty($_GET ['description']) && $_GET ['description'] == "status") {
                                    echo '<strong style="margin-right: 5px;"> </strong>Não foi possível alterar o status. Tente novamente mais tarde!';
                                } else {
                                    echo '<strong style="margin-right: 5px;"> </strong>:( Algo aconteceu de errado. Contate o admistrador do sistema!';
                                }
                                echo '</div>';
                            }
                            ?>
                            <table class="table datatable">

                                <br>
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>CPF/CNPJ</th>
                                        <th>Email</th>
                                        <th>Ativo</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $clienteDAO          = new ClienteDAO();
                                    $result = $clienteDAO->findAllCliente();
                                    if ($result->num_rows > 0) {
                                        while ($cliente = $result->fetch_assoc()) {
                                            $id      = $cliente['id'];
                                            $nome    = $cliente['nome'];
                                            $cpfCnpj = $cliente['cpf_cnpj'];
                                            $email   = $cliente['email'];
                                            $icativo = $cliente['icativo'];
                                            echo "<tr>";
                                            echo "<td>" . formatNumber($id) . "</td>";
                                            echo "<td>" . limitarTexto($nome, 40) . "</td>";
                                            echo "<td>" . $cpfCnpj. "</td>";
                                            echo "<td>" . limitarTexto($email, 40) . "</td>";
                                            echo "<td class=\" \" id=\"left\">";
                                            if ($icativo == 1) {
                                                echo "<a href=\"" . DAO . "/clienteDAO.php?acao=alteraStatusCliente&id=" . $id . "&status=0\"><p style=\"margin: 0 auto; width: 17px; height: 17px; border-radius:20px; background: #5ba;\"></p></a>";
                                            } else {
                                                echo "<a href=\"" . DAO . "/clienteDAO.php?acao=alteraStatusCliente&id=" . $id . "&status=1\"><p style=\"margin: 0 auto; width: 17px; height: 17px; border-radius:20px; background: #f00;\"></p></a>";
                                            }
                                            echo "</td>";
                                            echo "<td style=\"text-align:right;\">
                                                <a class=\"btn btn-warning\" href= \"" . CADASTRAR . "/cadastroCliente.php?id=" . $id . "\">
                                                      <span class=\"fa fa-edit\"></span> Editar</a>
                                                      <button type=\"button\" class=\"btn btn-danger mb-control\" onclick=\"ConfirmDeletar(" . $id . ");\" data-box=\"#message-box\">
                                                      <span class=\"fa fa-trash-o\"></span> Deletar</button>
                                                      </td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- danger -->
        <div class="message-box animated fadeIn" id="message-box">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-trash-o"></span> Deletar cliente? Essa ação não poderá ser desfeita. <?php echo $variavelphp; ?></div>
                    <div class="mb-content">
                        <p id="p-message-box">

                        </p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-danger btn-lg pull-right mb-control-close">Não</button>
                        <button onclick="Deletar();" style="margin-right:10px;"  class="btn btn-success btn-lg pull-right">SIM</button>							
                    </div>
                    <script type="text/javascript">
                        var codigo;
                        function ConfirmDeletar(id) {
                            document.getElementById("p-message-box").innerHTML = 'Você tem certeza que deseja deletar o cliente de código ' + id + "?";
                            codigo = id;
                        }
                        function Deletar() {
                            var acao = "deletaCliente";
                            window.location = "<?php echo DAO; ?>/clienteDAO.php?id=" + codigo + "&acao=" + acao;
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include('../footer.php'); ?>