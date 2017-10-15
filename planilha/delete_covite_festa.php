<?php
	
	include "conecta_bd.php";
	
	$query_delete = "DELETE FROM convite_festa WHERE id_convite_festa =" .$_GET['id_convite'];
	
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