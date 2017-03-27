<?php

include('../restrito.php');
include('../header.php');
include('../utils/utils.php');
include('ADMIN'.'/utils/utils.php');

$bannerDAO = new BannerDAO();
if ($_POST['acao'] != null) {
    switch ($_POST['acao']) {
        case "cadastroBanner":
            $bannerDAO->saveOrUpdateBanner();
            break;
    }
}
if ($_GET['acao'] != null) {
    switch ($_GET['acao']) {
        case "deletaBanner":
            $id = $_GET['id'];
            $bannerDAO->deleteBanner($id);
            break;
        case "alteraStatusBanner":
            $id = $_GET['id'];
            $status = $_GET['status'];
            $bannerDAO->updateStatusBanner($id, $status);
            break;
    }
}

class BannerDAO {

    function saveOrUpdateBanner() {
        include('../connection/config.php');
        include('../utils/classUploadImagem.php');
        $sql = null;
        $name = null;
        $diretorio = null;
        $file = null;
        $extension = null;
        $id = addslashes($_POST['id']);
        $titulo = addslashes($_POST['titulo']);
        $subTitulo = addslashes($_POST['subtitulo']);
        $nomeBotao = addslashes($_POST['nomebotao']);
        $urlBotao = addslashes($_POST['urlbotao']);
        $ativo = addslashes($_POST['ativo']);
        $isUpdate = false;
        if ($ativo != 1) {
            $ativo = 2;
        }
        if ($id > 0) {
            $banner = $this->findByIDBanner($id);
            if ($banner !== null) {
                $isUpdate = true;
            }
            if (!empty($_FILES['img']['tmp_name'])) {
                $file = $_FILES['img'];
                $name = formatNumber($id);
                $diretorio = FOTOS_BANNER . "/";
                if ($isUpdate) {
                    $extension = $banner['extensao_foto'];
                    $filename = $diretorio . $name . '.' . $extension;
                    if (file_exists($filename)) {
                        unlink($filename);
                        clearstatcache();
                    }
                } else {
                    $extension_aux = explode('.', $file['name']);
                    $extension = end($extension_aux);
                }
                $upload = new UploadImagem();
                $upload->setHeight(1920);
                $upload->setWidth(400);
                $upload->setDirectory($diretorio);
                $upload->setName($name);
                $upload->setExtension($extension);
                if ($isUpdate) {
                    $sql = "UPDATE banner " .
                            "   SET titulo          = '$titulo'," .
                            "       subtitulo       = '" . $subTitulo . "'," .
                            "       descricao_botao = '" . $nomeBotao . "', " .
                            "       url_destino     =  " . $urlBotao . ", " .
                            "       descricao_foto  =  " . $upload->getNome() . ", " .
                            "       extensao_foto   =  " . $upload->getExtension() . ", " .
                            "       altura          =  " . $upload->getWidth() . ", " .
                            "       largura         =  " . $upload->getHeight() . ", " .
                            "       icativo         = $ativo" .
                            " WHERE id = $id";
                } else {
                    $sql = "INSERT INTO banner (id, titulo, subtitulo, descricao_botao, url_destino, descricao_foto, extensao_foto,altura,largura, icativo) VALUES " .
                            " ($id, '$titulo', '$subTitulo', '$nomeBotao', '$urlBotao', '" . $upload->getNome() . "', '" . $upload->getExtension() . "', '" . $upload->getWidth() . "', '" . $upload->getHeight() . "', $ativo);";
                }
            } else {
                $sql = "UPDATE banner SET titulo = '$titulo', subtitulo = '$subTitulo', descricao_botao = '$nomeBotao', url_destino = '$urlBotao', icativo = $ativo WHERE id = $id";
            }

            if ($conn->query($sql) == TRUE) {
                if ($file !== null) {
                    $upload->salvar($file);
                }
                $conn->close();
                if ($isUpdate) {
                    echo "<script>window.location='" . LISTAR . "/listaBanner.php?return=sucess&description=update';</script>";
                } else {
                    echo "<script>window.location='" . CADASTRAR . "/cadastroBanner.php?return=sucess';</script>";
                }
            } else {
                $conn->close();
                echo "<script>window.location='" . CADASTRAR . "/listaBanner.php?return=error';</script>";
            }
        }
    }

    function deleteBanner($id) {
        include('../connection/config.php');
        $sql = "DELETE FROM banner WHERE id = $id";
        $banner = $this->findByIDBanner($id);
        if ($conn->query($sql) === TRUE) {
            unlink(FOTOS_BANNER . '/' . formatNumber($banner['id']) . '.' . $banner['extensao_foto']);
            echo "<script>window.location='" . LISTAR . "/listaBanner.php?return=sucess';</script>";
        } else {
            echo "<script>window.location='" . LISTAR . "/listaBanner.php?return=error';</script>";
        }
    }

//busca as informações da categoria
    function findByIDBanner($id) {
        include('../connection/config.php');
        $banner = null;
        $sql = "SELECT * FROM banner WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $banner = $result->fetch_assoc();
        }
        $conn->close();
        return $banner;
    }

//retorna o maior id
    function findMaxIDBanner() {
        include('../connection/config.php');
        $id = 1;
        $sql = "SELECT coalesce(max(id),0)+1 maior FROM banner";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = formatNumber($row['maior']); //str_pad($row['maior'], 6, '0', STR_PAD_LEFT);
        }
        $conn->close();
        return $id;
    }

    function findAllBanner($isativo) {
        include('../connection/config.php');
        include('ADMIN'.'/connection/config.php');
        $sql = null;
        if ($isativo){
            $sql = 'SELECT * FROM banner WHERE icativo = 1 ORDER BY id';
        }else{
            $sql = 'SELECT * FROM banner ORDER BY id';
        }
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function findAllWithFilters() {
        include('../connection/config.php');
    }

    function updateStatusBanner($id, $status) {
        include('../connection/config.php');
        $sql = "UPDATE banner SET icativo = $status WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<script>window.location='" . LISTAR . "/listaBanner.php?return=sucess&description=status';</script>";
        } else {
            $conn->close();
            echo "<script>window.location='" . LISTAR . "/listaBanner.php?return=error&description=status';</script>";
        }
    }
}
?>
