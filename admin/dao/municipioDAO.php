<?php

include('../restrito.php');
include('../header.php');
require_once('../utils/utils.php');

class MunicipioDAO {

    function findByIDMunicipio($id) {
        include('../connection/config.php');
        $municipio = null;
        $sql = "SELECT * FROM municipio WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $municipio = $result->fetch_assoc();
        }
        $conn->close();
        return $municipio;
    }

    public function findAllMunicipio() {
        include('../connection/config.php');
        $sql = "SELECT * FROM municipio ORDER BY id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

}

?>
