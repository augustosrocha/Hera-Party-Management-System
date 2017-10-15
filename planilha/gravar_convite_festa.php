<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	$id_festa = $_SESSION['id_festa'];
	$lote_convite = $_POST['lote_convite'];
	$quantidade_convite = $_POST['quantidade_convite'];
	$valor_convite = $_POST['valor_convite'];
	
	$query_gravar = "INSERT INTO `convite_festa`(`id_convite_festa`, `id_festa`, `lote_convite`, `quantidade_convite`, `valor_convite`) VALUES (null, ".$id_festa.", '".$lote_convite."', ".$quantidade_convite.", ".$valor_convite.")";  
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_planilha.php?b=sucesso#convite");
	}
		
	
	
?>