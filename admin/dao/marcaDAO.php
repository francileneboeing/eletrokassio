<?php

include('../restrito.php');
include('../header.php');

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
            delete($id, true);
            break;
        case "alteraStatusMarca":
            $id     = $_GET['id'];
            $status = $_GET['status'];
            updateStatusMarca($id, $status);
            break;
    }
}

//salva ou atualiza uma marca
function saveOrUpdate() {
    include('../connection/config.php');
    include('../utils/classUploadImagem.php');
    include('../header.php');
    $codigo = addslashes($_POST['codigo']);
    $descricao = addslashes($_POST['descricao']);
    $ativo = addslashes($_POST['ativo']);
    $isUpdate = false;
    if ($ativo != 1) {
        $ativo = 2;
    }
    if ($codigo > 0) {
        if ($_FILES['img']['size'] > 1000000) {
            echo "<script>window.location= '../cadastroMarca.php?return=imageBig';</script>";
        } else {
            if (!empty($_FILES['img']['tmp_name'])) {
                $name = str_pad($codigo, 6, '0', STR_PAD_LEFT);
                $diretorio = FOTOS_MARCA . "/";
                $extensao_aux = explode('.', $_FILES['img']['name']);
                $extension = end($extensao_aux);

                $upload = new UploadImagem();
                $upload->setHeight(200);
                $upload->setWidth(150);
                $upload->setDirectory($diretorio);
                $upload->setName($name);
                $upload->setExtension($extension);
                $upload->salvar($_FILES['img']);

                $sql = "SELECT true FROM produto_marca WHERE id = $codigo";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $isUpdate = true;
                    $sql = "UPDATE produto_marca " .
                            "   SET descricao       = '$descricao.'," .
                            "       descricao_foto  = '" . $upload->getNome() . "'," .
                            "       extensao_foto   = '" . $upload->getExtension() . "', " .
                            "       altura_foto     = '" . $upload->getHeight() . ", " .
                            "       largura_foto    = '" . $upload->getWidth() . ", " .
                            "       icativo         = $ativo;" .
                            " WHERE id $codigo";
                } else {
                    $sql = "INSERT INTO produto_marca (id, descricao, descricao_foto, extensao_foto, altura_foto, largura_foto, icativo) VALUES " .
                            " ($ativo, '$descricao', '" . $upload->getNome() . "', '" . $upload->getExtension() . "', '" . $upload->getHeight() . "', '" . $upload->getWidth() . "', $ativo);";
                }
//                echo $sql;
                if ($conn->query($sql) === TRUE) {
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
    }
}

function delete($id) {
    include('../connection/config.php');
    $sql = "DELETE FROM produto_marca WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
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
        $id = str_pad($row['maior'], 6, '0', STR_PAD_LEFT);
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
        echo "<script>window.location='".LISTAR."/listaMarca.php?return=sucess&description=status';</script>";
    } else {
        $conn->close();
        echo "<script>window.location='".LISTAR."/listaMarca.php?return=error&description=status';</script>";
    }
}

?>
