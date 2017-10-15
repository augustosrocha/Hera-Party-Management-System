<?php

	
	$query_local = "SELECT * FROM locais lo JOIN festa fe ON lo.id_local = fe.id_local WHERE fe.id_festa = '".$_SESSION['id_festa']."'";
	$sql_local = mysqli_query($link, $query_local);
	
	
	$query_custos = "SELECT * FROM custos_festa cf JOIN bebidas be ON cf.id_custo = be.id_custo WHERE id_festa = '".$_SESSION['id_festa']."'";
	$sql_custos = 	mysqli_query($link, $query_custos);
	
	$query_custo_pessoal = "SELECT * FROM custo_pessoal cp JOIN custo_pessoal_festa cf ON cp.id_custo_pessoal = cf.id_custo_pessoal WHERE cf.id_festa = '".$_SESSION['id_festa']."'";
	$sql_custo_pessoal = mysqli_query($link, $query_custo_pessoal);
	
	
	$query_atracao = "SELECT * FROM atracao_festa af JOIN atracoes at ON af.id_atracao = at.id_atracao WHERE id_festa = '".$_SESSION['id_festa']."'";
	$sql_atracao = mysqli_query($link, $query_atracao);
	
	
	$query_custo_add = "SELECT * FROM custos_adicionais_festa WHERE id_festa = '".$_SESSION['id_festa']."'";
	$sql_custo_add = mysqli_query($link, $query_custo_add);
	
	$query_convites = "SELECT * FROM convite_festa WHERE id_festa = '".$_SESSION['id_festa']."'";
	$sql_convites = mysqli_query($link, $query_convites);
	
	$despesa_total = 0;
	$receita_total = 0;
	$lucro = 0;
	
	while($resultado_local = mysqli_fetch_assoc($sql_local))
	{
		$despesa_total = $despesa_total + $resultado_local['preco_local'];
	}
	
	while($resultado_custos = mysqli_fetch_assoc($sql_custos))
	{
		//echo $resultado_custos['quantidade'];
		if($resultado_custos['quantidade'] == null)
		{
			$despesa_total = $despesa_total + ($resultado_custos['preco_custo']*$resultado_festa['quantidade_pessoas']*$resultado_custos['litros_pessoa']);
		}
		else if($resultado_custos['litros_pessoa'] == null)
		{
			$despesa_total = $despesa_total + ($resultado_custos['preco_custo']*$resultado_custos['quantidade']);
		}
		
			
	}
	
	while($resultado_custo_pessoal = mysqli_fetch_assoc($sql_custo_pessoal))
	{
		$despesa_total = $despesa_total + ($resultado_custo_pessoal['preco_custo_pessoal']*$resultado_custo_pessoal['quantidade']);
	}
	
	while($resultado_atracao = mysqli_fetch_assoc($sql_atracao))
	{
		$despesa_total = $despesa_total + $resultado_atracao['preco_atracao'];
	}
	
	while($resultado_custo_add = mysqli_fetch_assoc($sql_custo_add))
	{
		$despesa_total = $despesa_total + ($resultado_custo_add['valor_unitario']*$resultado_custo_add['quantidade_custo_add']);
	}
	
	while($resultado_convites = mysqli_fetch_assoc($sql_convites))
	{
		$receita_total = $receita_total + ($resultado_convites['valor_convite']*$resultado_convites['quantidade_convite']);
	}
	
	$lucro = $receita_total - $despesa_total;
	if($resultado_festa['quantidade_pessoas'] > 0)
	{
		$convite_pessoa = $despesa_total/$resultado_festa['quantidade_pessoas'];
	}
	else
	{
		$convite_pessoa = 0;
	}
	$query_gravar_festa = "UPDATE `festa` SET `total_custos`= ".$despesa_total.",`total_receita`= ".$receita_total.",`saldo_festa`= ".$lucro." WHERE `id_festa` = ".$_SESSION['id_festa'];
	//$query_gravar_festa = "INSERT INTO `festa`(`total_custos`, `total_receita`, `saldo_festa`) VALUES (".$despesa_total.",".$receita_total.",".$lucro.") WHERE id_festa = ".$_SESSION['id_festa'];
	$sql_gravar_festa = mysqli_query($link, $query_gravar_festa);
	
	if(!$sql_gravar_festa)
	{
		exit( mysqli_error($link));
	}
?>
	<div class="table-responsive">
		<table class='table table-bordered' id='locais'>
					<thead>
						<tr>
							<th>Nome</th>
							<th>N. Pessoas</th>
							<th>Data</th>
							<th>Local</th>
							<th>Tema</th>
							<th>Despesa Total</th>
							<th>Receita Total</th>
							<th>Preço de custo</th>
							<th>Lucro</th>
						<tr>
					</thead>
					<tr align="center">
						<td><?php echo $resultado_festa['nome_festa']; ?></td>
						<td><?php echo $resultado_festa['quantidade_pessoas']; ?></td>
						<td><?php echo $resultado_festa['data_festa']; ?></td>
						<td><?php echo $resultado_festa['nome_local']; ?></td>
						<td><?php echo $resultado_festa['tema_festa']; ?></td>
						<td><?php echo "R$ " .$despesa_total; ?></td>
						<td><?php echo "R$ " .$receita_total; ?></td>
						<td><?php echo "R$ " .$convite_pessoa; ?></td>
						<?php if($lucro < 0){?>
							
							<td bgcolor="#8B0000" style="color:WHITE"><?php echo "R$ " .$lucro; ?></td>
						
						<?php }else{ ?>
							<td bgcolor="#32CD32" style="color:WHITE"><?php echo "R$ " .$lucro; ?></td>
						<?php } ?>
					</tr>
		</table>
	</div>



















