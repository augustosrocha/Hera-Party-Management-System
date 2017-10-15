<?php
	
	include "conecta_bd.php";
	
	$query = "DELETE FROM fornecedores WHERE id_fornecedor = ".$_GET['id_fornecedor'];
	$sql = mysqli_query($link, $query);



	if(!$sql)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: consulta_fornecedor.php?b=sucesso");
	}



?>