<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	$validator -> addValidation("nome_custo_pessoal", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_custo_pessoal", "minlen=4", "O campo nome deve ter, no mínimo, 4 letras!");
	
	$validator -> addValidation("preco_custo_pessoal", "req", "Por favor preencha o campo preço!");
	$validator -> addValidation("preco_custo_pessoal", "minlen=2", "O campo preço deve ter, no mínimo, 2 caracteres!");
	
	$validator -> addValidation("empresa_custo_pessoal", "req", "Por favor preencha o campo empresa!");
	$validator -> addValidation("empresa_custo_pessoal", "minlen=4", "O campo preço deve ter, no mínimo, 4 caracteres!");
	
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
		$nome_custo_pessoal = $_POST['nome_custo_pessoal'];
		$preco_custo_pessoal = $_POST['preco_custo_pessoal'];
		$empresa_custo_pessoal = $_POST['empresa_custo_pessoal'];
		
		$sql = "INSERT INTO `custo_pessoal`(`id_custo_pessoal`, `nome_custo_pessoal`, `preco_custo_pessoal`, `empresa_custo_pessoal`) VALUES ";
		$sql .= "(null, '".$nome_custo_pessoal."', ".$preco_custo_pessoal.", '".$empresa_custo_pessoal."')"; 
		
		$query = mysqli_query($link, $sql);
		
		if(!$query)
		{
			exit(mysqli_error($link));
		}
		else
		{
			echo "Dados gravados com sucesso";
			header ("Location: form_custo_pessoal.php?b=sucesso");
		}
	}
	else
	{
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
			
		}
		$_SESSION['nome_custo_pessoal'] = $_POST['nome_custo_pessoal'];
		$_SESSION['preco_custo_pessoal'] = $_POST['preco_custo_pessoal'];
		$_SESSION['empresa_custo_pessoal'] = $_POST['empresa_custo_pessoal'];
		
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: form_custo_pessoal.php?c=erro");
	}
	
	
	



?>


























