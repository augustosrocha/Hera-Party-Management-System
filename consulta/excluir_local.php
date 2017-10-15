<?php
	
	include "conecta_bd.php";
	
	$query = "DELETE FROM locais WHERE id_local = ".$_GET['id_local'];
	$sql = mysqli_query($link, $query);



	if(!$sql)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: consulta_local.php?b=sucesso");
	}



?>