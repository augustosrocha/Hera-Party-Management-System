<?php
	
	include "conecta_bd.php";
	
	$query_delete = "DELETE FROM custo_pessoal_festa WHERE id_custo_pessoal_festa =" .$_GET['id_custo_pessoal'];
	
	$sql_delete = mysqli_query($link, $query_delete);
	
	if(!$sql_delete)
	{
		echo  mysqli_error($link);
	}
	else
	{
		header ("Location: form_planilha.php?c=sucesso");
	}
	
	
	
	


?>