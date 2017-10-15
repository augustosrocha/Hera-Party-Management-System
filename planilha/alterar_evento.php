
<?php

	include 'conecta_bd.php';
	session_start();
	
	//echo $_SERVER['REQUEST_METHOD'];
	
	
	$nome_evento = $_POST['nome_evento'];
	$quantidade_pessoas = $_POST['quantidade_pessoas'];
	$tema_festa = $_POST['tema_festa'];
	$data_festa = $_POST['data_festa'];
	
	$sql = "UPDATE festa SET nome_festa = '".$nome_evento."', data_festa = '".$data_festa."', quantidade_pessoas = '".$quantidade_pessoas;
	$sql = $sql . "', tema_festa = '".$tema_festa."' WHERE id_festa = ".$_SESSION['id_festa'];
	
	
	$query = mysqli_query($link, $sql);

	if(!$query)
	{
		echo  mysqli_error($link);
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_planilha.php?b=sucesso");
	}
		


?>
