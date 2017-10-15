<?php

	include "conecta_bd.php";
	session_start();
	
	
	$nome_pessoa = $_POST['nome_pessoa'];
	$documento_pessoa = $_POST['documento_pessoa'];
	$tipo_pagamento = $_POST['tipo_pagamento'];
	$responsavel_venda = $_POST['responsavel_venda'];
	$pago = $_POST['pago'];
	$lote_convite = $_POST['lote_convite'];
	$valor_pago = $_POST['valor_pago'];
	
	
	
	if($pago == 1)
	{
		$sql = "INSERT INTO pessoa_lista (`id_pessoa_lista`, `id_lista`, `nome_pessoa`, `documento_pessoa`, `tipo_pagamento`, `responsavel_venda`, `pago`, `lote_convite`, `valor_pago`)";
		$sql = $sql . "VALUES (null, ".$_GET['id_lista'].", '".$nome_pessoa."', '".$documento_pessoa."', '".$tipo_pagamento."', '";
		$sql = $sql . $responsavel_venda."', ".$pago.", '".$lote_convite."', ".$valor_pago.")";
		
		$query = mysqli_query($link, $sql);
		
		if(!$query)
		{
			echo mysqli_error($link);
		}
		else
		{
			header("Location: form_lista.php?a=sucesso");
		}
	}
	else
	{
		
		$sql = "INSERT INTO pessoa_lista (`id_pessoa_lista`, `id_lista`, `nome_pessoa`, `documento_pessoa`, `tipo_pagamento`, `responsavel_venda`, `pago`, `lote_convite`, `valor_pago`)";
		$sql = $sql . "VALUES (null, ".$_GET['id_lista'].", '".$nome_pessoa."', '".$documento_pessoa."', null, '".$responsavel_venda."', ".$pago.", null, null)";
		
		$query = mysqli_query($link, $sql);
		
		if(!$query)
		{
			echo mysqli_error($link);
		}
		else
		{
			header("Location: form_lista.php?a=sucesso");
		}
		
		
	}
	
	
	





?>





















