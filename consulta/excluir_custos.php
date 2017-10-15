<?php
	
	include "conecta_bd.php";
	
	$query = "DELETE FROM bebidas WHERE id_custo = ".$_GET['id_custo'];
	$sql = mysqli_query($link, $query);



	if(!$sql)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: consulta_custos.php?b=sucesso");
	}



?>