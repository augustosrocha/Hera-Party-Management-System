<?php
	
	include "conecta_bd.php";
	session_start();
	
	
	$query_delete = "UPDATE festa SET id_local = null WHERE id_festa =" .$_SESSION['id_festa'];
	
	$sql_delete = mysqli_query($link, $query_delete);
	
	if(!$sql_delete)
	{
		echo  mysqli_error($link);
		exit();
	}
	else
	{
		header ("Location: form_planilha.php?c=sucesso");
	}
	
	
	
	


?>