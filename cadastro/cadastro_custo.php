
<?php

	session_start();
	include 'conecta_bd.php';
	require_once "formvalidator.php";
	
	$validator = new FormValidator();
	
	$validator -> addValidation("id_fornecedor", "req", "Por favor busque o fornecedor do seu produto!");
	
	
	$validator -> addValidation("nome_custos", "req", "Por favor preencha o campo nome!");
	$validator -> addValidation("nome_custos", "minlen=4", "O campo nome deve ter, no mínimo, 4 letras!");
	
	$validator -> addValidation("marca_custos", "req", "Por favor preencha o campo marca!");
	$validator -> addValidation("marca_custos", "minlen=4", "O campo marca deve ter, no mínimo, 4 caracteres!");
	
	$validator -> addValidation("preco_custo", "req", "Por favor preencha o campo preço!");
	$validator -> addValidation("preco_custo", "minlen=4", "O campo preço deve ter, no mínimo, 4 caracteres");
	
	$validator -> addValidation("tipo_embalagem", "req", "Por favor preencha o campo tipo de embalagem!");
	$validator -> addValidation("tipo_embalagem", "minlen=3", "O campo tipo de embalagem deve ter, no mínimo, 3 letras!");
	
	
	
	
	$msg_erro = " ";
	if($validator -> ValidateForm())
	{
	
		$nome_custos = $_POST['nome_custos'];
		$marca_custo = $_POST['marca_custos'];
		$preco_custo = $_POST['preco_custo'];
		$tipo_embalagem = $_POST['tipo_embalagem'];
		$id_fornecedor = $_POST['id_fornecedor'];
		
		

		$sql = "INSERT INTO `bebidas`(`id_custo`, `nome_custo`, `marca_custo`, `preco_custo`,`tipo_embalagem`, `id_fornecedor`) VALUES ";
		$sql = $sql . "(null,'".$nome_custos."','".$marca_custo."', ".$preco_custo.", '".$tipo_embalagem."', ".$id_fornecedor.")";
		$query = mysqli_query($link, $sql);

		if(!$query)
		{
			exit( mysqli_error($link));
		}
		else
		{
			echo "Dados gravados com sucesso";
			header ("Location: form_custos.php?b=sucesso");
		}
	}
	else
	{
		$error_hash=$validator->GetErrors();
		foreach($error_hash as $inpname=>$inp_err)
		{
			$msg_erro = $msg_erro . $inp_err . "</br>";
			
		}
		$_SESSION['nome_custos'] = $_POST['nome_custos'];
		$_SESSION['marca_custo'] = $_POST['marca_custos'];
		$_SESSION['preco_custo'] = $_POST['preco_custo'];
		$_SESSION['tipo_embalagem'] = $_POST['tipo_embalagem'];
		$_SESSION['id_fornecedor'] = $_POST['id_fornecedor'];
		$_SESSION['nome_fornecedor'] = $_POST['nome_fornecedor'];
		
		$_SESSION['msg_erro'] = $msg_erro;
		
		header ("Location: form_custos.php?c=erro");
	}
	
	

?>







