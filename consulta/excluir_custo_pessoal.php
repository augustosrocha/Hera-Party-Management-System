<?php
	
	include "conecta_bd.php";
	
	$query = "DELETE FROM custo_pessoal WHERE id_custo_pessoal = ".$_GET['id_custo_pessoal'];
	$sql = mysqli_query($link, $query);



	if(!$sql)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados excluidos com sucesso";
		header ("Location: consulta_custo_pessoal.php?b=sucesso");
	}



?>