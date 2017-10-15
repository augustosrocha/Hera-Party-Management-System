<?php
	
	include "conecta_bd.php";
	
	$query = "DELETE FROM atracoes WHERE id_atracao = ".$_GET['id_atracao'];
	$sql = mysqli_query($link, $query);



	if(!$sql)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: consulta_atracoes.php?b=sucesso");
	}



?>