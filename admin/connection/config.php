<?php

error_reporting (0);
$conn = new mysqli("localhost", "root", "", "eletrokassio");
if ($conn->connect_error) {	
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
    
}

?>