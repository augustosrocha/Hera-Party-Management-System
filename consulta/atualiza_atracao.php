
<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	$validator -> addValidation("nome_atracao", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_atracao", "minlen=4", "O campo nome deve ter, no mínimo, 4 letras!");
	
	$validator -> addValidation("preco_atracao", "req", "Por favor preencha o campo preço!");
	$validator -> addValidation("preco_atracao", "minlen=3", "O campo preço deve ter, no mínimo, 3 caracteres!");
	
	$validator -> addValidation("tel_atracao", "req", "Por favor preencha o campo telefone!");
	$validator -> addValidation("tel_atracao", "minlen=14", "O campo telefone deve ser preenchido assim: (99)99999-9999");
	
	$validator -> addValidation("cidade_atracao", "req", "Por favor preencha o campo cidade!");
	$validator -> addValidation("cidade_atracao", "minlen=3", "O campo cidade deve ter, no mínimo, 3 letras!");
	$validator -> addValidation("cidade_atracao", "alpha_s", "No campo cidade somente é permitido letras!");
	
	$validator -> addValidation("estilo_atracao", "req", "Por favor preencha o campo estilo!");
	$validator -> addValidation("estilo_atracao", "minlen=4", "O campo estilo deve ter, no mínimo, 4 caracteres!");
	$validator -> addValidation("estilo_atracao", "alnum_s", "No campo estilo somente é permitido letras e números!");
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
		$nome_atracao = $_POST['nome_atracao'];
		$preco_atracao = $_POST['preco_atracao'];
		$tel_atracao = $_POST['tel_atracao'];
		$cidade_atracao = $_POST['cidade_atracao'];
		$estilo_atracao = $_POST['estilo_atracao'];
		$descricao_atracao = $_POST['descricao_atracao'];
		$observacoes_atracao = $_POST['observacoes_atracao'];
		
		$sql = "UPDATE atracoes SET nome_atracao = '".$nome_atracao."', preco_atracao = '".$preco_atracao."', tel_atracao = '".$tel_atracao."', cidade_atracao = '".$cidade_atracao."'";
		$sql = $sql . ", estilo_atracao = '".$estilo_atracao."' , descricao_atracao = '".$descricao_atracao."', observacoes_atracao = '".$observacoes_atracao."'";
		$sql = $sql . "WHERE id_atracao = ".$_SESSION['id_atracao'];
		
		
		$query = mysqli_query($link, $sql);

		if(!$query)
		{
			echo  mysqli_error();
		}
		else
		{
			echo "Dados gravados com sucesso";
			header ("Location: consulta_atracoes.php?a=sucesso");
		}
	}else
	{
		
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
			
		}
		$_SESSION['nome_atracao'] = $_POST['nome_atracao'];
		$_SESSION['preco_atracao'] = $_POST['preco_atracao'];
		$_SESSION['tel_atracao'] = $_POST['tel_atracao'];
		$_SESSION['cidade_atracao'] = $_POST['cidade_atracao'];
		$_SESSION['estilo_atracao'] = $_POST['estilo_atracao'];
		$_SESSION['descricao_atracao'] = $_POST['descricao_atracao'];
		$_SESSION['observacoes_atracao'] = $_POST['observacoes_atracao'];
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: form_atracao_alterar.php?c=erro");
	}			


?>


















