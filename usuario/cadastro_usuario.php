<?php

	include 'conecta_bd.php';
	
	
	
	
	$nome_usuario = $_POST['nome_usuario'];
	$cel_usuario = $_POST['cel_usuario'];
	$end_usuario = $_POST['end_usuario'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$id_empresa = $_POST['id_empresa'];
	$nivel_acesso = $_POST['nivel_acesso'];
	
	
	$sql = "INSERT INTO `usuarios`(`id_usuario`, `nome_usuario`, `cel_usuario`, `end_usuario`,`usuario`,`senha`, `id_empresa`, `nivel_acesso`) VALUES "; 
	$sql = $sql . "(null,'".$nome_usuario."','".$cel_usuario."', '".$end_usuario."','".$usuario."', '".$senha."' , ".$id_empresa.", ".$nivel_acesso.")";
	
	
	
	$query = mysqli_query($link, $sql);

	if(!$query)
	{
		exit( mysqli_error($link));
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_usuario.php?b=sucesso");
	}
		
	
	

?>
