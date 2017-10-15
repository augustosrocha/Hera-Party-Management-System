<?php
	session_start();
	
	if(isset($_SESSION['usuario']) && isset($_SESSION['senha']))
	{
		session_unset();
		session_destroy();
		echo "TESTE";
		header("Location: inicio.php");
	}
	if(isset($_COOKIE['usuario']) && isset($_COOKIE['senha']))
	{
		setcookie("usuario", "", time() - 3600, "/");
		setcookie("senha", "", time() - 3600, "/");
		echo "TESTE";
		header("Location: inicio.php");
	}
	echo "TESTE";
		//header("Location: form_login.php");
	
	

?>