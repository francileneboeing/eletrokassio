<?php

//error_reporting (0);

// $bd = mysql_connect ("localhost:3306", "feagro_admin", "fe102030");
// $db = mysql_select_db ("feagro_site", $bd);

//$bd = mysql_connect ("localhost", "root", "");
//$db = mysql_select_db ("eletrokassio", $bd);
$conn = new mysqli("localhost", "root", "", "eletrokassio");
if ($conn->connect_error) {	
    die("Não foi possível conectar ao banco de dados: " . $conn->connect_error);
} 
?>