<?php

	include "conecta_bd.php";
	
	
	//echo $_POST['tipo_embalagem'];
	
	echo $_SERVER['REQUEST_METHOD'];
	
	
	$query = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND senha = '".$_POST['senha']."'";
			
			$sql = mysqli_query($link, $query);
			
			if($resultado = mysqli_fetch_assoc($sql))
			{
				if(isset($_POST['lembrar']))
				{
					
					
					setcookie("usuario", $_POST['usuario'], time() + (86400 * 7), "/"); //86400 = 1 dia
					setcookie("senha", $_POST['senha'], time() + (86400 * 7), "/");
					//echo "ENTREI NO COOKIE";
					header("Location: index.php");
				}
				else
				{
					session_start();
					$_SESSION['usuario'] = $_POST['usuario'];
					$_SESSION['senha'] = $_POST['senha'];
					header("Location: index.php");
				}
			}
			else
			{
				header("Location: form_login.php");
			}
	
?>