<?php
	session_start();
	
	include "conecta_bd.php";
	
	
	/* GRAVAÇÃO DA AVALIAÇÃO DO LOCAL */
	$cont_local = 0;
	foreach($_POST['id_local'] as $elemento)
	{
		echo $cont_local . "</br>";
		$id_local[$cont_local] = $elemento;
		$cont_local++;
	}
	
	$cont_local = 0;
	foreach($_POST['avaliacao_local'] as $elemento)
	{
		echo $cont_local . "</br>";
		$avaliacao_local[$cont_local] = $elemento;
		$cont_local++;
	}
	
	$cont_local = 0;
	foreach($_POST['comentario_local'] as $elemento)
	{
		echo $cont_local . "</br>";
		$comentario_local[$cont_local] = $elemento;
		$cont_local++;
	}
	
	for($i=0; $i < $cont_local; $i++)
	{
		
		
		$query_local = "INSERT INTO `avaliacoes_servicos`(`id_servico`, `avaliacao`, `comentario`, `tipo_servico`) VALUES (";
		$query_local = $query_local . $id_local[$i]." , ".$avaliacao_local[$i].", '".$comentario_local[$i]."', 'local')";
		
		$sql_local = mysqli_query($link, $query_local);
		
		if(!$sql_local)
		{
			echo mysqli_error($link);
			
		}
		
		
	}
	/* ^ GRAVAÇÃO DA AVALIAÇÃO DO LOCAL ^ */
	
	
	
	
	/* GRAVAÇÃO DA AVALIAÇÃO DA ATRAÇÃO */
	$cont_atracao = 0;
	foreach($_POST['id_atracao'] as $elemento)
	{
		$id_atracao[$cont_atracao] = $elemento;
		$cont_atracao++;
	}
	
	$cont_atracao = 0;
	foreach($_POST['avaliacao_atracao'] as $elemento)
	{
		$avaliacao_atracao[$cont_atracao] = $elemento;
		$cont_atracao++;
	}
	
	$cont_atracao = 0;
	foreach($_POST['comentario_atracao'] as $elemento)
	{
		$comentario_atracao[$cont_atracao] = $elemento;
		$cont_atracao++;
	}
	
	for($i=0; $i<$cont_atracao; $i++)
	{
		
		
		$query_atracao = "INSERT INTO `avaliacoes_servicos`(`id_servico`, `avaliacao`, `comentario`, `tipo_servico`) VALUES (";
		$query_atracao = $query_atracao . $id_atracao[$i]." , ".$avaliacao_atracao[$i].", '".$comentario_atracao[$i]."', 'atracao')";
		
		$sql_atracao = mysqli_query($link, $query_atracao);
		
		if(!$sql_atracao)
		{
			echo mysqli_error($link);
			
		}
		
		
	}
	/* ^ GRAVAÇÃO DA AVALIAÇÃO DA ATRAÇÃO ^ */

	
	/* GRAVAÇÃO DA AVALIAÇÃO DO FORNECEDOR */
	
	$cont_fornecedor = 0;
	foreach($_POST['id_fornecedor'] as $elemento)
	{
		$id_fornecedor[$cont_fornecedor] = $elemento;
		$cont_fornecedor++;
	}
	
	$cont_fornecedor = 0;
	foreach($_POST['avaliacao_fornecedor'] as $elemento)
	{
		$avaliacao_fornecedor[$cont_fornecedor] = $elemento;
		$cont_fornecedor++;
	}
	
	$cont_fornecedor = 0;
	foreach($_POST['comentario_fornecedor'] as $elemento)
	{
		$comentario_fornecedor[$cont_fornecedor] = $elemento;
		$cont_fornecedor++;
	}
	
	for($i=0; $i<$cont_fornecedor; $i++)
	{
		
		
		$query_fornecedor = "INSERT INTO `avaliacoes_servicos`(`id_servico`, `avaliacao`, `comentario`, `tipo_servico`) VALUES (";
		$query_fornecedor = $query_fornecedor . $id_fornecedor[$i]." , ".$avaliacao_fornecedor[$i].", '".$comentario_fornecedor[$i]."', 'fornecedor')";
		
		$sql_fornecedor = mysqli_query($link, $query_fornecedor);
		
		if(!$sql_fornecedor)
		{
			echo mysqli_error($link);
			
		}
		
	}
	
	$query_busca_fornecedor = "SELECT * FROM avaliacoes_servicos WHERE tipo_servico = 'fornecedor'";
	$sql_busca_fornecedor = mysqli_query($link, $query_busca_fornecedor);
	
	$media_fornecedor = 0;
	$contador_fornecedor = 0;
	$soma_fornecedor = 0
	
	while($resultado_busca_fornecedor = mysqli_fetch_assoc($sql_busca_fornecedor))
	{
		$soma_fornecedor += $resultado_busca_fornecedor['avaliacao'];
		$contador_fornecedor++;
	}
	$media_fornecedor = $soma_fornecedor/$contador_fornecedor;
	
	$query_gravar_fornecedor = "";
	
	/* ^ GRAVAÇÃO DA AVALIAÇÃO DO FORNECEDOR ^ */
	
	
	/* GRAVAÇÃO DA AVALIAÇÃO DO CUSTO PESSOAL */
	
	$cont_pessoal = 0;
	foreach($_POST['id_custo_pessoal'] as $elemento)
	{
		$id_custo_pessoal[$cont_pessoal] = $elemento;
		$cont_pessoal++;
	}
	
	$cont_pessoal = 0;
	foreach($_POST['avaliacao_custo_pessoal'] as $elemento)
	{
		$avaliacao_custo_pessoal[$cont_pessoal] = $elemento;
		$cont_pessoal++;
	}
	
	$cont_pessoal = 0;
	foreach($_POST['comentario_custo_pessoal'] as $elemento)
	{
		$comentario_custo_pessoal[$cont_pessoal] = $elemento;
		$cont_pessoal++;
	}
	
	for($i=0; $i<$cont_pessoal; $i++)
	{
		
		
		$query_custo_pessoal = "INSERT INTO `avaliacoes_servicos`(`id_servico`, `avaliacao`, `comentario`, `tipo_servico`) VALUES (";
		$query_custo_pessoal = $query_custo_pessoal . $id_custo_pessoal[$i]." , ".$avaliacao_custo_pessoal[$i].", '".$comentario_custo_pessoal[$i]."', 'custo pessoal')";
		
		$sql_custo_pessoal = mysqli_query($link, $query_custo_pessoal);
		
		if(!$sql_custo_pessoal)
		{
			echo mysqli_error($link);
			
		}
		else
		{
			header("Location: avaliacao_servicos.php?b=sucesso");
		}
		
	}
	/* ^ GRAVAÇÃO DA AVALIAÇÃO DO CUSTO PESSOAL ^ */

?>
































