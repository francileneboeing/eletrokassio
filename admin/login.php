<?php 
    session_start();
    $usuario=$_POST['usuario'];
    $senha=$_POST['senha'];
    
    
if ($senha == "admin" && $usuario == "admin"){
     $_SESSION['usuario'] = $usuario;
     header("location:started.php");
}else{
     header("location:index.php");
}
?>