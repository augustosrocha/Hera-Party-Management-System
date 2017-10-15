
<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	
	
	$validator -> addValidation("nome_custo", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_custo", "minlen=4", "O campo nome deve ter, no mínimo, 4 letras!");
	
	$validator -> addValidation("marca_custo", "req", "Por favor preencha o campo marca!");
	$validator -> addValidation("marca_custo", "minlen=4", "O campo marca deve ter, no mínimo, 4 caracteres!");
	
	$validator -> addValidation("preco_custo", "req", "Por favor preencha o campo preço!");
	$validator -> addValidation("preco_custo", "minlen=2", "O campo preço deve ter, no mínimo, 2 caracteres");
	
	$validator -> addValidation("tipo_embalagem", "req", "Por favor preencha o campo tipo de embalagem!");
	$validator -> addValidation("tipo_embalagem", "minlen=3", "O campo tipo de embalagem deve ter, no mínimo, 3 letras!");
	
	
	
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
	
		$nome_custo = $_POST['nome_custo'];
		$marca_custo = $_POST['marca_custo'];
		$preco_custo = $_POST['preco_custo'];
		$tipo_embalagem = $_POST['tipo_embalagem'];
		

		$sql = "UPDATE `bebidas` SET `nome_custo`='".$nome_custo."',`marca_custo`= '".$marca_custo."',";
		$sql = $sql . "`preco_custo`= '".$preco_custo."',`tipo_embalagem`= '".$tipo_embalagem."' WHERE id_custo = ".$_SESSION['id_custo'];
		$query = mysqli_query($link, $sql);

		if(!$query)
		{
			echo  mysqli_error($link);
		}
		else
		{
			echo "Dados gravados com sucesso";
			
			header ("Location: consulta_custos.php?a=sucesso");
		}
	}	
	else
	{
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
		}
		$_SESSION['nome_custos'] = $_POST['nome_custo'];
		$_SESSION['marca_custo'] = $_POST['marca_custo'];
		$_SESSION['preco_custo'] = $_POST['preco_custo'];
		$_SESSION['tipo_embalagem'] = $_POST['tipo_embalagem'];
		
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: form_custos_alterar.php?c=erro");
	}

?>























