<?php

	session_start();
	include "conecta_bd.php";
	
	
	if($_POST['quantidade'] = "1" && !empty($_POST['litros_pessoa']))
	{
		$litros_pessoa = $_POST['litros_pessoa'];
	}
	else
	{
		$litros_pessoa = "null";
	}
	
	if($_POST['quantidade'] = "2" && !empty($_POST['quantidade_custo']))
	{
		$quantidade_custo = $_POST['quantidade_custo'];
	}
	else
	{
		$quantidade_custo = "null";
	}
	
	$id_custo = $_POST['id_custo'];
	$id_festa = $_SESSION['id_festa'];
	
	
	$query_gravar = "INSERT INTO custos_festa (`id_custos_festa`, `id_festa`, `id_custo`, `litros_pessoa`, `quantidade`) VALUES (null, ".$id_festa.", ".$id_custo.", ".$litros_pessoa.", ".$quantidade_custo.")";
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		echo $_POST['quantidade_custo'];
		echo $litros_pessoa;
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_planilha.php?b=sucesso#custo");
	}
		
	
	

	
	
	


?>