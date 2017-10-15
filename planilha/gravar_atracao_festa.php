<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	
	$id_atracao = $_POST['id_atracao'];
	$id_festa = $_SESSION['id_festa'];
	
	
	$query_gravar = "INSERT INTO atracao_festa (`id_atracao_festa`, `id_festa`, `id_atracao`) VALUES (null, ".$id_festa.", ".$id_atracao.")";
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
	}
		
	
	header ("Location: form_planilha.php?b=sucesso#atracao");

	
	
	


?>