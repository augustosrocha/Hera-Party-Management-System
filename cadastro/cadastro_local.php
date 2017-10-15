
<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	$validator -> addValidation("nome_local", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_local", "minlen=4", "O campo nome deve ter, no mínimo, 4 letras!");
	
	$validator -> addValidation("end_local", "req", "Por favor preencha o campo endereço!");
	$validator -> addValidation("end_local", "minlen=5", "O campo endereço deve ter, no mínimo, 5 caracteres!");
	
	$validator -> addValidation("cidade_local", "req", "Por favor preencha o campo cidade!");
	$validator -> addValidation("cidade_local", "minlen=3", "O campo cidade deve ter, no mínimo, 3 caracteres");
	
	$validator -> addValidation("tel_local", "req", "Por favor preencha o campo telefone!");
	$validator -> addValidation("tel_local", "minlen=14", "O campo telefone deve ser preenchido assim: (99)99999-9999");
	
	$validator -> addValidation("dono_local", "req", "Por favor preencha o campo dono do local!");
	$validator -> addValidation("dono_local", "minlen=4", "O campo dono do local deve ter, no mínimo, 4 caracteres!");
	
	$validator -> addValidation("preco_local", "req", "Por favor preencha o campo preço!");
	$validator -> addValidation("preco_local", "minlen=6", "O campo preço deve ter, no mínimo, 6 caracteres!");
	
	$validator -> addValidation("lotacao_local", "req", "Por favor preencha o campo lotação!");
	$validator -> addValidation("lotacao_local", "minlen=2", "O campo lotação deve ter, no mínimo, 2 caracteres!");
	$validator -> addValidation("lotacao_local", "num", "No campo lotação somente é permitido números!");
	
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
	
		$nome_local = $_POST['nome_local'];
		$end_local = $_POST['end_local'];
		$cidade_local = $_POST['cidade_local'];
		$tel_local = $_POST['tel_local'];
		$dono_local = $_POST['dono_local'];
		$preco_local = $_POST['preco_local'];
		$lotacao_local = $_POST['lotacao_local'];
		
		
		
		if(!empty($_POST['observacoes_local']))
		{
			$observacoes_local = $_POST['observacoes_local'];
			$sql = "INSERT INTO `locais`(`id_local`, `nome_local`, `endereco_local`, `cidade_local`,`telefone_local`, `dono_local`, `preco_local`, `lotacao_local`, `observacoes_local`) VALUES ";
			$sql - $sql . "(null,'".$nome_local."','".$end_local."', '".$cidade_local."','".$tel_local."', '".$dono_local."', '".$preco_local."', '".$lotacao_local."', '".$observacoes_local."')";
			
		}
		else
		{
			$sql = "INSERT INTO `locais`(`id_local`, `nome_local`, `endereco_local`, `cidade_local`,`telefone_local`, `dono_local`, `preco_local`, `lotacao_local`, `observacoes_local`) VALUES ";
			$sql = $sql . "(null,'".$nome_local."','".$end_local."', '".$cidade_local."','".$tel_local."', '".$dono_local."', '".$preco_local."', '".$lotacao_local."', null)";
		}
		
		$query = mysqli_query($link, $sql);

		if(!$query)
		{
			echo  mysqli_error($link);
		}
		else
		{
			echo "Dados gravados com sucesso";
			header ("Location: form_local.php?b=sucesso");
		}
	}	
	else
	{
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
		}
		$_SESSION['nome_local'] = $_POST['nome_local'];
		$_SESSION['end_local'] = $_POST['end_local'];
		$_SESSION['cidade_local'] = $_POST['cidade_local'];
		$_SESSION['tel_local'] = $_POST['tel_local'];
		$_SESSION['dono_local'] = $_POST['dono_local'];
		$_SESSION['preco_local'] = $_POST['preco_local'];
		$_SESSION['lotacao_local'] = $_POST['lotacao_local'];
		$_SESSION['observacoes_local'] = $_POST['observacoes_local'];
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: form_local.php?c=erro");
		
	}
	
	

?>


















