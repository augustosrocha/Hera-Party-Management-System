<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	$validator -> addValidation("nome_festa", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_festa", "minlen=3", "O campo nome deve ter, no mínimo, 3 caracteres!");
	
	$erro = 0;
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
		$nome_festa = $_POST['nome_festa'];
		
		
		
		$sql = "INSERT INTO `festa` (`id_festa`, `nome_festa`, `data_festa`, `quantidade_pessoas`, `tema_festa`,  `id_local`, `total_custos`, `total_receita`, `saldo_festa`, `usuario`)";
		$sql = $sql . "VALUES ( null, '".$nome_festa."'";
		
		
		if(!empty($_POST['data_festa']))
		{
			$validator -> addValidation("data_festa", "req", "Por favor preencha o campo data corretamente!");
			$validator -> addValidation("data_festa", "minlen=8", "O campo data deve ser preenchido desta maneira: dd/mm/aa!");
			if($validator -> ValidateForm())
			{
				$data_festa = $_POST['data_festa'];
				$sql = $sql . ", '".$data_festa."'";
			}
			else
			{
				$erro = 1;
			}
		}
		else
		{
			$sql = $sql . ", null";
		}
		
		
		if(!empty($_POST['quantidade_pessoas']))
		{
			$validator -> addValidation("quantidade_pessoas", "req", "Por favor preencha o campo quantidade corretamente!");
			$validator -> addValidation("quantidade_pessoas", "minlen=2", "O campo quantidade deve ter, no mínimo, 2 números");
			$validator -> addValidation("quantidade_pessoas", "num", "O campo quantidade deve conter apenas números");
			
			if($validator -> ValidateForm())
			{
				$quantidade_pessoas = $_POST['quantidade_pessoas'];
				$sql = $sql . ", '".$quantidade_pessoas."'";
			}
			else
			{
				$erro = 1;
			}
		}
		else
		{
			$sql = $sql . ", null";
		}
		
		
		
		if(!empty($_POST['tema_festa']))
		{
			$validator -> addValidation("tema_festa", "req", "Por favor preencha o campo tema corretamente!");
			$validator -> addValidation("tema_festa", "minlen=4", "O campo tema deve ter, no mínimo, 4 caracteres");
		
			if($validator -> ValidateForm())
			{
				$tema_festa = $_POST['tema_festa'];
				$sql = $sql . ", '".$tema_festa."'";
			}
			else
			{
				$sql = $sql . ", null";
			}
		}
		else
		{
			$erro = 1;
		}
		
		$sql = $sql . ",null, null, null, null, '".$usuario."')";
		
		$query = mysqli_query($link, $sql);
		
		if ($erro == 1)
		{
			$error_hash=$validator->GetErrors();
			foreach($error_hash as $inpname=>$inp_err)
			{
				$msg_erro = $msg_erro . $inp_err . "</br>";
				
				
			}
			$_SESSION['nome_festa'] = $_POST['nome_festa'];
			$_SESSION['data_festa'] = $_POST['data_festa'];
			$_SESSION['quantidade_pessoas'] = $_POST['quantidade_pessoas'];
			$_SESSION['tema_festa'] = $_POST['tema_festa'];
			
			$_SESSION['msg_erro'] = $msg_erro;
			
			header ("Location: criar_evento.php?c=erro");
		}
		else
		{
			if(!$query)
			{
				
				echo  mysqli_error($link);
				
			}
			else
			{
				echo "Dados gravados com sucesso";
				header ("Location: eventos_criados.php");
			}
		}	
	}
	else
	{
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
			
		}
		
		$_SESSION['nome_festa'] = $_POST['nome_festa'];
		$_SESSION['data_festa'] = $_POST['data_festa'];
		$_SESSION['quantidade_pessoas'] = $_POST['quantidade_pessoas'];
		$_SESSION['tema_festa'] = $_POST['tema_festa'];
		
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: criar_evento.php?c=erro");
	}
	

?>



















