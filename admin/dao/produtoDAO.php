<?php

include('../restrito.php');
include('../header.php');
require_once('../utils/utils.php');

$produtoDAO = new ProdutoDAO();
if ($_POST['acao'] != null) {
    switch ($_POST['acao']) {
        case "cadastroProduto":
            $produtoDAO->saveOrUpdateProduto();
            break;
    }
}
if ($_GET['acao'] != null) {
    switch ($_GET['acao']) {
        case "deletaProduto":
            $id = $_GET['id'];
            $produtoDAO->deleteProduto($id);
            break;
        case "alteraStatusProduto":
            $id = $_GET['id'];
            $status = $_GET['status'];
            $produtoDAO->updateStatusProduto($id, $status);
            break;
    }
}

class ProdutoDAO {
    
    
    function saveOrUpdateProduto(){
        include('../connection/config.php');
        $sql            = null;
        $id             = $_POST['id'];
        $descricao      = $_POST['descricao'];
        $descAbreviada  = $_POST['descricaoAbreviada'];
        $valor          = $_POST['valor'];
        $tipoProduto    = $_POST['tipo'];
        $qtdEstoque     = $_POST['qtdEstoque'];
        $idSubCategoria = $_POST['idSubCategoria'];
        $idMarca        = $_POST['idMarca'];
        $ativo          = $_POST['ativo'];
        $isUpdate       = false;
         if ($ativo != 1) {
            $ativo = 2;
        }
        if ($idSubCategoria == ''){
            $idSubCategoria = null;
        }
        if ($idMarca == ''){
            $idMarca = null;
        }
        if ($idSubCategoria === null || $idMarca === null){
            echo "<script>window.location='" . CADASTRAR . "/cadastroProduto.php?return=error&description=nullValues';</script>";
            return;
        }
        if ($id > 0){
            $produto = $this->findByIDProduto($id);
            if ($produto !== null){
                $isUpdate = true;
                $sql = "UPDATE produto ".
                       "   SET descricao       = '$descricao',".
                       "       desc_abreviada  = '$descAbreviada', ".
                       "       tp_produto      = $tipoProduto, ".
                       "       vl_produto      = ".corrigeValor($valor).", ".
                       "       qtd_estoque     = ".corrigeValor($qtdEstoque).", ".
                       "       id_marca        = $idMarca, ".
                       "       id_subcategoria = $idSubCategoria, ".
                       "       icativo         = $ativo ".
                       " WHERE id = $id";
            }else{
                $sql = "INSERT INTO produto(id, descricao,desc_abreviada,tp_produto,vl_produto,qtd_estoque,id_marca,id_subcategoria,icativo) VALUES ".
                       "( $id, '$descricao', '$descAbreviada', $tipoProduto, ". corrigeValor($valor).", ". corrigeValor($qtdEstoque).", $idMarca, $idSubCategoria, $ativo);";
            }
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                if ($isUpdate) {
                    echo "<script>window.location='" . LISTAR . "/listaProduto.php?return=sucess&description=update';</script>";
                } else {
                   echo "<script>window.location='" . CADASTRAR . "/cadastroProduto.php?return=sucess';</script>";
                }
            } else {
                $conn->close();
                echo "<script>window.location='" . CADASTRAR . "/listaProduto.php?return=error';</script>";
            }
        }
    }

    function findByIDProduto($id) {
        include('../connection/config.php');
        $produto = null;
        $sql = "SELECT * FROM produto WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();
        }
        $conn->close();
        return $produto;
    }

    function findMaxIDProduto() {
        include('../connection/config.php');
        $id = 1;
        $sql = "SELECT coalesce(max(id),0)+1 maior FROM produto";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = formatNumber($row['maior']);
        }
        $conn->close();
        return $id;
    }

    function deleteProduto($id) {
        include('../connection/config.php');
        $sql = "DELETE FROM produto WHERE id = $id";
        $produto = $this->findByIDProduto($id);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location='" . LISTAR . "/listaProduto.php?return=sucess';</script>";
        } else {
            echo "<script>window.location='" . LISTAR . "/listaProduto.php?return=error';</script>";
        }
    }
    
    public function findAllProduto() {
        include('../connection/config.php');
        $sql = "SELECT * FROM produto ORDER BY id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}
?>
