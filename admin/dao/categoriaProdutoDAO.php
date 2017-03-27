<?php

include('../restrito.php');
include('../header.php');
require_once('../utils/utils.php');

$categoriaDAO = new CategoriaProdutoDAO();
if ($_POST['acao'] != null) {
    switch ($_POST['acao']) {
        case "cadastraCategoriaProduto":
            $categoriaDAO->saveOrUpdateCategoria();
            break;
    }
}

if ($_GET['acao'] != null) {
    switch ($_GET['acao']) {
        case "deletaCategoria":
            $id = $_GET['id'];
            $categoriaDAO->deleteCategoria($id);
            break;
        case "alteraStatusCategoriaProduto":
            $id = $_GET['id'];
            $status = $_GET['status'];
            echo 'ID: ' . $id . '. Status: ' . $status;
            $categoriaDAO->updateStatusCategoria($id, $status);
            break;
    }
}

class CategoriaProdutoDAO {

//salva ou atualiza uma categoria
    function saveOrUpdateCategoria() {
        include('../connection/config.php');
        $codigo = addslashes($_POST['codigo']);
        $descricao = addslashes($_POST['descricao']);
        $categoriaPai = addslashes($_POST['categoriaPai']);
        $ativo = addslashes($_POST['ativo']);
        $isUpdate = false;
        if ($ativo != 1) {
            $ativo = 2;
        }
        if ($categoriaPai == '') {
            $categoriaPai = null;
        }
        if ($codigo > 0) {
            $sql = "SELECT true FROM produto_categoria WHERE id = $codigo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $isUpdate = true;
                $sql = "UPDATE produto_categoria SET descricao = '$descricao', id_pai = $categoriaPai, icativo = $ativo WHERE id = $codigo";
            } else {
                $sql = "INSERT INTO produto_categoria(id, descricao, id_pai, icativo) VALUES ($codigo, '$descricao', $categoriaPai, $ativo);";
            }
            //echo "<br>Código".$codigo.". <br>Descrição: ".$descricao.". <br>Categoria Pai:  ".$categoriaPai.". <br>Ativo: ".$ativo.". <br>SQL: ".$sql			
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                if ($isUpdate) {
                    echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=sucess&description=update';</script>";
                } else {
                    echo "<script>window.location='" . CADASTRAR . "/cadastroCategoriaProduto.php?return=sucess';</script>";
                }
            } else {
                $conn->close();
                echo "<script>window.location='" . CADASTRAR . "/cadastroCategoriaProduto.php?return=error';</script>";
            }
        }
    }

    function deleteCategoria($id) {
        include('../connection/config.php');
        $sql = "SELECT * FROM produto_categoria WHERE id_pai = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=error&description=fk';</script>";
        } else {
            $sql = "DELETE FROM produto_categoria WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=sucess';</script>";
            } else {
                echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=error';</script>";
            }
        }
    }

//busca as informações da categoria
    function findByIDCategoria($id) {
        include('../connection/config.php');
        $categoria = null;
        $sql = "SELECT * FROM produto_categoria WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $categoria = $result->fetch_assoc();
        }
        $conn->close();
        return $categoria;
    }

//retorna o maior id
    function findMaxIDCategoria() {
        include('../connection/config.php');
        $id = 1;
        $sql = "SELECT coalesce(max(id),0)+1 maior FROM produto_categoria";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = formatNumber($row['maior']);  //str_pad($row['maior'], 6, '0', STR_PAD_LEFT);
        }
        $conn->close();
        return $id;
    }

    function findAllOnlyCategoria() { //busca somente categorias	
        include('../connection/config.php');
        $consulta_categoria = "SELECT * FROM produto_categoria WHERE id_pai IS NULL ORDER BY descricao;";
        $result = $conn->query($consulta_categoria);
        $conn->close();
        return $result;
    }

    function findAllOnlySubCategoria() { //busca somente categorias	
        include('../connection/config.php');
        $consulta_categoria = "SELECT * FROM produto_categoria WHERE id_pai IS NOT NULL ORDER BY descricao;";
        $result = $conn->query($consulta_categoria);
        $conn->close();
        return $result;
    }

    function findAllCategoria() {
        include('../connection/config.php');
        $sql = "SELECT * FROM produto_categoria ORDER BY id ";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function updateStatusCategoria($id, $status) {
        include('../connection/config.php');
        $sql = "UPDATE produto_categoria SET icativo = $status WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=sucess&description=status';</script>";
        } else {
            $conn->close();
            echo "<script>window.location='" . LISTAR . "/listaCategoriaSubCategoria.php?return=error&description=status';</script>";
        }
    }

}
?>
