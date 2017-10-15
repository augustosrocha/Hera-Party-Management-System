<?php
	
	include "conecta_bd.php";
	
	$query_delete = "DELETE FROM atracao_festa WHERE id_atracao_festa =" .$_GET['id_atracao'];
	
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