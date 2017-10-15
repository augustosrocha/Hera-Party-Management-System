<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	$id_festa = $_SESSION['id_festa'];
	$nome_custo_add = $_POST['nome_custo_add'];
	$valor_unitario = $_POST['valor_unitario'];
	$quantidade_custo_add = $_POST['quantidade_custo_add'];
	
	$query_gravar = "INSERT INTO `custos_adicionais_festa`(`id_custos_add_festa`, `id_festa`, `nome_custo_add`, `valor_unitario`, `quantidade_custo_add`) VALUES (null, ".$id_festa.", '".$nome_custo_add."', ".$valor_unitario.", ".$quantidade_custo_add.")";  
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
	}
		
	
	header ("Location: form_planilha.php?b=sucesso#custo_add");

	
	
	


?>