<?php 
error_reporting (0);
	session_start();
	if(!isset($_SESSION['usuario']) AND !isset($_SESSION['senha'])){
		header("location:index.php");
	}
?>