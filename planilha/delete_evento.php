<?php

	include "conecta_bd.php";
	
	$msg_erro = " ";
	$tem_erro = 0;
	$query_atracao = "DELETE FROM atracao_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_atracao = mysqli_query($link, $query_atracao);
	
	if(!$sql_atracao)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
		
	}
	
	
	$query_convite = "DELETE FROM convite_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_convite = mysqli_query($link, $query_convite);

	if(!$sql_convite)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
		
	}
	
	
	$query_custo_add = "DELETE FROM custos_adicionais_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_custo_add = mysqli_query($link, $query_custo_add);
	
	if(!$sql_custo_add)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
		
	}
	
	
	$query_custo = "DELETE FROM custos_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_custo = mysqli_query($link, $query_custo);
	
	if(!$sql_custo)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
		
	}
	
	
	$query_custo_pessoal = "DELETE FROM custo_pessoal_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_custo_pessoal = mysqli_query($link, $query_custo_pessoal);
	
	if(!$sql_custo_pessoal)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
	}
	
	
	$query_busca_lista = "SELECT * FROM pessoa_lista pl RIGHT JOIN lista_festa lf ON pl.id_lista = lf.id_lista WHERE lf.id_festa = ".$_GET['id_festa'];
	$sql_busca_lista = mysqli_query($link, $query_busca_lista);
	
	while($resultado_busca_lista = mysqli_fetch_assoc($sql_busca_lista))
	{
		$query_pessoa_lista = "DELETE FROM pessoa_lista WHERE id_lista = ".$resultado_busca_lista['id_lista'];
		$sql_pessoa_lista = mysqli_query($link, $query_pessoa_lista);
		
		if(!$sql_pessoa_lista)
		{
			$msg_erro = $msg_erro . mysqli_error($link) . " " ;
			
			$tem_erro = 1;
		}
		
	}
	
	$query_lista = "DELETE FROM lista_festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_lista = mysqli_query($link, $query_lista);
	
	if(!$sql_lista)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
	}
	
	$query_festa = "DELETE FROM festa WHERE id_festa = ".$_GET['id_festa'];
	$sql_festa = mysqli_query($link, $query_festa);
	
	if(!$sql_festa)
	{
		$msg_erro = $msg_erro . mysqli_error($link) . " " ;
		$tem_erro = 1;
	}
	
	if($tem_erro == 0)
	{
		header ("Location: eventos_criados.php?c=sucesso");
	}
	else
	{
		echo $msg_erro;
	}


?>






























