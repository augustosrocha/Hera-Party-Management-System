<?php

	include "conecta_bd.php";
	session_start();

	$sql = "INSERT INTO lista_festa (`id_lista`, `id_festa`, `quantidade_pessoas`, `total_pago`) VALUES (null, ".$_SESSION['id_festa'].", null, null)";
	
	$query = mysqli_query($link, $sql);
	
	if(!$query)
	{
		echo mysqli_error($link);
	}
	else
	{
		header("Location: form_lista.php");
	}






?>