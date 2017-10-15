<?php

	
	$servidor = 'localhost';
	$banco = 'sistema_p4';
	$usuario = 'root';
	$senha = 'root';
	/*
	
	$servidor = 'mysql.hostinger.com.br';
	$banco = 'u893536656_haki';
	$usuario = 'u893536656_haki';
	$senha = '2chjqi';*/
	
	$link = mysqli_connect($servidor, $usuario, $senha);
	
	$db = mysqli_select_db($link, $banco);
	
	if(!$link)
	{
		echo "Não foi possivel conectar ao banco de dados";
	}
	
	
?>