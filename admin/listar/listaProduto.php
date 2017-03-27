<?php include('../header.php'); ?>
<?php include('../restrito.php'); ?>
<?php include('../dao/produtoDAO.php'); ?>
<?php include('../dao/marcaDAO.php'); ?>
<?php include('../dao/categoriaProdutoDAO.php'); ?>


<div class="page-container">	
    <?php include('../sidebar.php'); ?>
    <script>
        $(document).ready(function () {
            $(".l-cadastro").addClass("active");
            $(".l-cadastro-produto").addClass("active");
            $(".l-cadastro-produto-produto").addClass("active");
        });
    </script>
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <?php include('../nav_vertical.php'); ?>
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li>Inicio</li>
            <li>Cadastros</li>
            <li>Produto</li>
            <li class="active">Listagem de Produtos</li>
        </ul>
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Listagem de Produtos</h3>
                            <ul class="panel-controls">
                                <li><a href="<?php echo CADASTRAR ?>/cadastroProduto.php"><span class="fa fa-plus"></span>Adicionar</a></li>
                                <li><a href="<?php echo LISTAR ?>/listaProduto.php" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
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
                                    echo '<strong style="margin-right: 5px;"> </strong>Produto atualizado com sucesso!';
                                } else {
                                    echo '<strong style="margin-right: 5px;"> </strong>Yeah! Produto removido com sucesso.';
                                }
                                echo '</div>';
                            } else if (!empty($_GET ['return']) && $_GET ['return'] == "error") {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
                                if (!empty($_GET ['description']) && $_GET ['description'] == "fk") {
                                    echo '<strong style="margin-right: 5px;"> </strong>Não foi possível deletar o registro. Existem registros vinculadas a este produto. Exclua-os primeiro!';
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
                                        <th>Descrição</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>SubCategoria</th>                                        
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $produtoDAO          = new ProdutoDAO();
                                    $categoriaProdutoDAO = new CategoriaProdutoDAO();
                                    $marcaDAO            = new MarcaDAO();
                                    $result = $produtoDAO->findAllProduto();
                                    if ($result->num_rows > 0) {
                                        while ($produto = $result->fetch_assoc()) {
                                            $id            = $produto['id'];
                                            $descricao     = $produto['descricao'];
                                            $tipo          = $produto['tp_produto'];
                                            $valor         = $produto['vl_produto'];
                                            $qtdEstoque    = $produto['qtd_estoque'];
                                            $icativo       = $produto['icativo'];
                                            $idMarca       = $produto['id_marca'];
                                            $idSubcategoia = $produto['id_subcategoria'];
                                            
                                            $marca        = $marcaDAO->findByIDMarca($idMarca);
                                            $subCategoria = $categoriaProdutoDAO->findByIDCategoria($idSubcategoia);                                             
                                            echo "<tr>";
                                            echo "<td>" . formatNumber($id) . "</td>";
                                            echo "<td>" . limitarTexto($descricao, 40) . "</td>";
                                            if ($tipo === 1){
                                                echo "<td>Produto</td>";
                                            }else{
                                                echo "<td>Serviço</td>";
                                            }
                                            echo "<td>" . limitarTexto($marca['descricao'], 40) . "</td>";
                                            echo "<td>" . limitarTexto($subCategoria['descricao'], 40) . "</td>";
                                            echo "<td class=\" \" id=\"left\">";
                                            if ($icativo == 1) {
                                                echo "<a href=\"" . DAO . "/produtoDAO.php?acao=alteraStatusProduto&id=" . $id . "&status=0\"><p style=\"margin: 0 auto; width: 17px; height: 17px; border-radius:20px; background: #5ba;\"></p></a>";
                                            } else {
                                                echo "<a href=\"" . DAO . "/produtoDAO.php?acao=alteraStatusProduto&id=" . $id . "&status=1\"><p style=\"margin: 0 auto; width: 17px; height: 17px; border-radius:20px; background: #f00;\"></p></a>";
                                            }
                                            echo "</td>";
                                            echo "<td style=\"text-align:right;\">
                                                <a class=\"btn btn-warning\" href= \"" . CADASTRAR . "/cadastroProduto.php?id=" . $id . "\">
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
                    <div class="mb-title"><span class="fa fa-trash-o"></span> Deletar produto? Essa ação não poderá ser desfeita. <?php echo $variavelphp; ?></div>
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
                            document.getElementById("p-message-box").innerHTML = 'Você tem certeza que deseja deletar o produto de código ' + id + "?";
                            codigo = id;
                        }
                        function Deletar() {
                            var acao = "deletaProduto";
                            window.location = "<?php echo DAO; ?>/produtoDAO.php?id=" + codigo + "&acao=" + acao;
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include('../footer.php'); ?>