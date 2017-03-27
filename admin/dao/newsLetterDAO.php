<?php

class NewsLetterDAO {

    function saveOrUpdate($nome, $email) {
        include('../connection/config.php');
    }

    function findByNomeEmail($nome, $email) {
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

}
?>

