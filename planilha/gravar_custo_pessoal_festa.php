<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	
	$id_custo_pessoal = $_POST['id_custo_pessoal'];
	$quantidade_custo_pessoal = $_POST['quantidade_custo_pessoal'];
	$id_festa = $_SESSION['id_festa'];
	
	
	$query_gravar = "INSERT INTO `custo_pessoal_festa`(`id_custo_pessoal_festa`, `id_custo_pessoal`, `quantidade`, `id_festa`) VALUES";
	$query_gravar = $query_gravar . "(null, ".$id_custo_pessoal.", ".$quantidade_custo_pessoal.", ".$id_festa." )";
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_planilha.php?b=sucesso#custo_pessoal");
	}
		
	
	

	
	
	


?>