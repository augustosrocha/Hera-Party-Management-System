<?php

	include 'conecta_bd.php';
	
	
	
	$id_atracao = $_POST['id_atracao'];
	$nome_atracao = $_POST['nome_atracao'];
	$preco_atracao = $_POST['preco_atracao'];
	$tel_atracao = $_POST['tel_atracao'];
	$cidade_atracao = $_POST['cidade_atracao'];
	$estilo_atracao = $_POST['estilo_atracao'];
	$descricao_atracao = $_POST['descricao_atracao'];
	
	
	if(!empty($_POST['observacoes_atracao']))
	{
		
		$observacoes_atracao = $_POST['observacoes_atracao'];
		$sql = "INSERT INTO `atracoes`(`id_atracao`, `nome_atracao`, `preco_atracao`, `tel_atracao`,`cidade_atracao`,`estilo_atracao`, `descricao_atracao`, `observacoes_atracao`) VALUES (null,'".$nome_atracao."','".$preco_atracao."', '".$tel_atracao."','".$cidade_atracao."', '".$estilo_atracao."' , '".$descricao_atracao."', '".$observacoes_atracao."')";
	
	}
	else
	{
		$sql = "INSERT INTO `atracoes`(`id_atracao`, `nome_atracao`, `preco_atracao`, `tel_atracao`,`cidade_atracao`,`estilo_atracao`, `descricao_atracao`, `observacoes_atracao`) VALUES (null,'".$nome_atracao."','".$preco_atracao."', '".$tel_atracao."','".$cidade_atracao."', '".$estilo_atracao."' , '".$descricao_atracao."', null)";
	
	}
	
	$query = mysqli_query($link, $sql);

	if(!$query)
	{
		exit( mysqli_error($link));
	}
	else
	{
		echo "Dados gravados com sucesso";
		header ("Location: form_atracoes.php?b=sucesso")
		echo "TESTE GIT 2 DESSA PORRA";
	}
		
	
	

?>
