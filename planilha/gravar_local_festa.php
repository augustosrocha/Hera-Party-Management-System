<?php

	session_start();
	include "conecta_bd.php";
	
	
	
	
	$id_local = $_POST['id_local'];
	$id_festa = $_SESSION['id_festa'];
	
	
	$query_gravar = "UPDATE `festa` SET `id_local`= ".$id_local." WHERE `id_festa` = ".$id_festa;
	
	$sql = mysqli_query($link, $query_gravar);
	
	if(!$sql)
	{
		
		
		echo  mysqli_error($link);
		
	}
	else
	{
		echo "Dados gravados com sucesso";
	}
		
	
	header ("Location: form_planilha.php?b=sucesso#local");

	
	
	


?>