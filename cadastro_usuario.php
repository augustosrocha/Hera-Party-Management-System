<?php

	include 'conecta_bd.php';
	
	
	
	
	$nome_usuario = $_POST['nome_usuario'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$email_usuario = $_POST['email_usuario'];
	
	
	$sql = "INSERT INTO `usuarios`(`id_usuario`, `nome_usuario`, `usuario`,`senha`, `email_usuario`) VALUES "; 
	$sql = $sql . "(null,'".$nome_usuario."','".$usuario."', '".$senha."', '".$email_usuario."')";
	
	
	
	$query = mysqli_query($link, $sql);

	if(!$query)
	{
		exit( mysqli_error($link));
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: inicio.php?b=sucesso");
	}
		
	
	

?>
