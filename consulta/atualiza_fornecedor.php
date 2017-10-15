
<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	$validator -> addValidation("nome_fornecedor", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("cidade_fornecedor", "req", "Por favor preencha a cidade do fornecedor!");
	$validator -> addValidation("tel_fornecedor", "req", "Por favor preencha o telefone do fornecedor!");
	$validator -> addValidation("nome_fornecedor", "minlen=3", "Por favor preencha o campo nome de maneira correta!");
	$validator -> addValidation("cidade_fornecedor", "minlen=3", "Por favor preencha o campo cidade de maneira correta!");
	$validator -> addValidation("tel_fornecedor", "minlen=14", "Por favor preencha o campo telefone de maneira correta!");
	$validator -> addValidation("nome_fornecedor", "alnum_s", "Por favor preencha o campo nome de maneira correta!");
	$validator -> addValidation("cidade_fornecedor", "alpha_s", "Por favor preencha o campo cidade de maneira correta!");
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
		$nome_fornecedor = $_POST['nome_fornecedor'];
		$cidade_fornecedor = $_POST['cidade_fornecedor'];
		$tel_fornecedor = $_POST['tel_fornecedor'];
		$descricao_fornecedor = $_POST['descricao_fornecedor'];
		

		$sql = "UPDATE `fornecedores` SET `nome_fornecedor`='".$nome_fornecedor."',`cidade_fornecedor`= '".$cidade_fornecedor."',";
		$sql = $sql . "`tel_fornecedor`= '".$tel_fornecedor."',`descricao_fornecedor`= '".$descricao_fornecedor."' WHERE id_fornecedor = ".$_SESSION['id_fornecedor'];
		$query = mysqli_query($link, $sql);

		if(!$query)
		{
			echo  mysqli_error($link);
		}
		else
		{
			echo "Dados gravados com sucesso";
			header ("Location: consulta_fornecedor.php?a=sucesso");
		}
	}
	else
	{
		
		//echo "ERROS DE VALIDAÇÃO:";
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
		}
			$_SESSION['nome_fornecedor'] = $_POST['nome_fornecedor'];
			$_SESSION['cidade_fornecedor'] = $_POST['cidade_fornecedor'];
			$_SESSION['tel_fornecedor'] = $_POST['tel_fornecedor'];
			$_SESSION['descricao_fornecedor'] = $_POST['descricao_fornecedor'];
			$_SESSION['msg_erro'] = $msg_erro;
			
			header ("Location: form_fornecedor_alterar.php?c=erro");
	}
	

?>
