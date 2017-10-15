<?php
	
	include "conecta_bd.php";
	
	$query_delete = "DELETE FROM custos_adicionais_festa WHERE id_custos_add_festa =" .$_GET['id_custo_add'];
	
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