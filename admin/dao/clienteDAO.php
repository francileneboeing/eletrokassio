<?php

include('../restrito.php');
include('../header.php');
require_once('../utils/utils.php');

$clienteDAO = new ClienteDAO();
if ($_POST['acao'] != null) {
    switch ($_POST['acao']) {
        case "cadastroCliente":
            $clienteDAO->saveOrUpdateCliente();
            break;
    }
}
if ($_GET['acao'] != null) {
    switch ($_GET['acao']) {
        case "deletaCliente":
            $id = $_GET['id'];
            $clienteDAO->deleteCliente($id);
            break;
        case "alteraStatusCliente":
            $id = $_GET['id'];
            $status = $_GET['status'];
            $clienteDAO->updateStatusCliente($id, $status);
            break;
    }
}

class ClienteDAO {
    
    
    function saveOrUpdateCliente(){
        include('../connection/config.php');
        $sql            = null;
        $id          = $_POST['id'];
        $nome        = $_POST['nome'];
        $tipo        = $_POST['tipo'];
        $cpfCnpj     = $_POST['cpfcnpj'];
        $endereco    = $_POST['endereco'];
        $bairro      = $_POST['bairro'];
        $numero      = $_POST['numero'];
        $cep         = $_POST['cep'];
        $telefone    = $_POST['telefone'];
        $idMunicipio = $_POST['idMunicipio'];
        $email       = $_POST['email'];
        $ativo       = $_POST['ativo'];
        $enviarEmail = $_POST['enviaremail'];        
        $isUpdate       = false;
         if ($ativo != 1) {
            $ativo = 2;
        }
        if ($enviarEmail != 1){
            $enviarEmail = 2;
        }
        if ($idMunicipio === null){
            echo "<script>window.location='" . CADASTRAR . "/cadastroCliente.php?return=error&description=nullValues';</script>";
            return;
        }
        if ($id > 0){
            $cliente = $this->findByIDCliente($id);
            if ($cliente !== null){
                $isUpdate = true;
                $sql = "UPDATE cliente ".
                       "   SET nome         = '$nome',".
                       "       tp_cliente   = '$tipo', ".
                       "       cpf_cnpj     = '$cpfCnpj', ".
                       "       endereco     = '$endereco', ".
                       "       bairro       = '$bairro', ".
                       "       numero       = '$numero', ".
                       "       id_municipio = $idMunicipio, ".
                       "       cep          = '$cep', ".
                       "       email        = '$email', ".
                       "       icenviaemail = $enviarEmail, ".
                       "       telefone     = '$telefone', ".
                       "       icativo      = $ativo ".
                       " WHERE id = $id";
            }else{
                $sql = "INSERT INTO cliente(id, nome, tp_cliente,cpf_cnpj,endereco,bairro,numero,id_municipio,cep,email,icenviaemail,telefone,icativo) VALUES ".
                       "( $id, '$nome', '$tipo', '$cpfCnpj', '$endereco', '$bairro', '$numero', $idMunicipio, '$cep', '$email',$enviarEmail,'$telefone',$ativo );";
            }
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                if ($isUpdate) {
                    echo "<script>window.location='" . LISTAR . "/listaCliente.php?return=sucess&description=update';</script>";
                } else {
                   echo "<script>window.location='" . CADASTRAR . "/cadastroCliente.php?return=sucess';</script>";
                }
            } else {
                $conn->close();
                echo "<script>window.location='" . LISTAR . "/listaCliente.php?return=error';</script>";
            }
        }
    }

    function findByIDCliente($id) {
        include('../connection/config.php');
        $produto = null;
        $sql = "SELECT * FROM cliente WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $produto = $result->fetch_assoc();
        }
        $conn->close();
        return $produto;
    }

    function findMaxIDCliente() {
        include('../connection/config.php');
        $id = 1;
        $sql = "SELECT coalesce(max(id),0)+1 maior FROM cliente";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = formatNumber($row['maior']);
        }
        $conn->close();
        return $id;
    }

    function deleteCliente($id) {
        include('../connection/config.php');
        $sql = "DELETE FROM produto WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location='" . LISTAR . "/listaCliente.php?return=sucess';</script>";
        } else {
            echo "<script>window.location='" . LISTAR . "/listaCliente.php?return=error';</script>";
        }
    }
    
    public function findAllCliente() {
        include('../connection/config.php');
        $sql = "SELECT * FROM cliente ORDER BY id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}
?>
