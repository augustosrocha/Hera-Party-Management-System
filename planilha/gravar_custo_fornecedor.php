<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	$id_fornecedor = $_POST['id_fornecedor'];
	
	
	$query_buscar = "INSERT INTO custos_festa (`id_festa`, `id_custo`, `litros_pessoa`, `quantidade`) VALUES (".$id_festa.", ".$id_custo.", ".$litros_pessoa.", ".$quantidade_custo.")";
	
	$sql = mysqli_query($link, $query_buscar);
	
	if(!$sql)
	{
		echo $_POST['quantidade_custo'];
		echo $litros_pessoa;
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
	}
		
	
	header ("Location: form_planilha.php");

	
	
	


?>