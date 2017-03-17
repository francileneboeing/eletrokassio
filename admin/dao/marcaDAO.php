<?php

include('../restrito.php');
include('../header.php');
include('../utils/classUploadImagem.php');
include('../utils/utils.php');

if ($_POST['acao'] != null) {
    switch ($_POST['acao']) {
        case "cadastroMarca":
            saveOrUpdate();
            break;
    }
}
if ($_GET['acao'] != null) {
    switch ($_GET['acao']) {
        case "deletaMarca":
            $id = $_GET['id'];
            delete($id);
            break;
        case "alteraStatusMarca":
            $id = $_GET['id'];
            $status = $_GET['status'];
            updateStatusMarca($id, $status);
            break;
    }
}

//salva ou atualiza uma marca
function saveOrUpdate() {
    include('../connection/config.php');
    $sql       = null;
    $name      = null;
    $diretorio = null;
    $file      = null;
    $extension = null;
    $id        = addslashes($_POST['codigo']);
    $descricao = addslashes($_POST['descricao']);
    $ativo     = addslashes($_POST['ativo']);
    $isUpdate  = false;
    if ($ativo != 1) {
        $ativo = 2;
    }
    if ($id > 0) {
        echo 'TESTE 1<br>';
        $marca = findByID($id);
        if ($marca !== null) {
            echo 'TESTE 2<br>';
            $isUpdate = true;
        }        
        if (!empty($_FILES['img']['tmp_name'])){
            $file = $_FILES['img'];
            $name         = str_pad($id, 6, '0', STR_PAD_LEFT);
            $diretorio    = FOTOS_MARCA . "/";
            if ($isUpdate){
                $extension = $marca['extensao_foto'];
                $filename = $diretorio.$name.'.'.$extension;
                if (file_exists($filename)){
                    unlink($filename);
                    clearstatcache(); 
                }
            }else{
                $extension_aux = explode('.', $file['name']);
                $extension = end($extension_aux);
            }            
            $upload = new UploadImagem();
            $upload->setHeight(200);
            $upload->setWidth(150);
            $upload->setDirectory($diretorio);
            $upload->setName($name);
            $upload->setExtension($extension);
            if ($isUpdate){
                 $sql = "UPDATE produto_marca " .
                            "   SET descricao       = '$descricao'," .
                            "       descricao_foto  = '".$upload->getNome() . "'," .
                            "       extensao_foto   = '".$upload->getExtension() . "', " .
                            "       altura_foto     =  ".$upload->getHeight() . ", " .
                            "       largura_foto    =  ".$upload->getWidth() . ", " .
                            "       icativo         = $ativo" .
                            " WHERE id = $id";
            }else{
               $sql = "INSERT INTO produto_marca (id, descricao, descricao_foto, extensao_foto, altura_foto, largura_foto, icativo) VALUES " .
                            " ($id, '$descricao', '" . $upload->getNome() . "', '" . $upload->getExtension() . "', '" . $upload->getHeight() . "', '" . $upload->getWidth() . "', $ativo);";  
            }            
        }else{
            $sql = "UPDATE produto_marca SET descricao = '$descricao', icativo = $ativo WHERE id = $id";
        }
        
        if ($conn->query($sql)==TRUE) {
            if ($file !== null){
                $upload->salvar($file);
            }
            $conn->close();
            if ($isUpdate) {
                echo "<script>window.location='" . LISTAR . "/listaMarca.php?return=sucess&description=update';</script>";
            } else {
                echo "<script>window.location='" . CADASTRAR . "/cadastroMarca.php?return=sucess';</script>";
            }
        } else {
            $conn->close();
            echo "<script>window.location='" . CADASTRAR . "/cadastroMarca.php?return=error';</script>";
        }        
    }
}

function delete($id) {
    include('../connection/config.php');
    $sql = "DELETE FROM produto_marca WHERE id = $id";
    $marca = findByID($id);
    if ($conn->query($sql) === TRUE) {
        unlink(FOTOS_MARCA.'/'.formatNumber($marca['id']).'.'.$marca['extensao_foto']);
        echo "<script>window.location='" . LISTAR . "/listaMarca.php?return=sucess';</script>";
    } else {
        echo "<script>window.location='" . LISTAR . "/listaMarca.php?return=error';</script>";
    }
}


//busca as informações da categoria
function findByID($id) {
    include('../connection/config.php');
    $marca = null;
    $sql = "SELECT * FROM produto_marca WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $marca = $result->fetch_assoc();
    }
    $conn->close();
    return $marca;
}

//retorna o maior id
function findMaxID() {
    include('../connection/config.php');
    $id = 1;
    $sql = "SELECT coalesce(max(id),0)+1 maior FROM produto_marca";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = formatNumber($row['maior']); //str_pad($row['maior'], 6, '0', STR_PAD_LEFT);
    }
    $conn->close();
    return $id;
}

function findAll() {
    include('../connection/config.php');
    $sql = "SELECT * FROM produto_marca WHERE icativo = 1 ORDER BY id";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function findAllWithFilters() {
    include('../connection/config.php');
}

function updateStatusMarca($id, $status) {
    include('../connection/config.php');
    $sql = "UPDATE produto_marca SET icativo = $status WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo "<script>window.location='" . LISTAR . "/listaMarca.php?return=sucess&description=status';</script>";
    } else {
        $conn->close();
        echo "<script>window.location='" . LISTAR . "/listaMarca.php?return=error&description=status';</script>";
    }
}

?>
