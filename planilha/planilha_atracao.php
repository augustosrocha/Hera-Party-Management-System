<script>
		function delete_atracao(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar esta atração da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_atracao_festa.php?id_atracao='+x
				
					
				});
				
				//window.location.href="delete_custos_festa.php?id_custo=" + x;
				window.location.href="form_planilha.php?c=sucesso";
				location.reload();
			}
			else
			  {
				location.reload();
			  }
			
			
			//alert("Dados deletados com sucesso");
			
		}
	
	
	
</script>

<?php

		
		$query_busca = "SELECT * FROM atracao_festa af JOIN atracoes at ON af.id_atracao = at.id_atracao WHERE id_festa = '".$_SESSION['id_festa']."'";
		
		$sql_busca = mysqli_query($link, $query_busca);
		//echo $_SESSION['id_festa'];
		?>
		<div class="table-responsive">
			<table class='table table-bordered' id='bebidas'>
					<thead>
						<tr>
							
							
							<th>Nome</th>
							<th>Preço</th>
							<th>Telefone</th>
							<th>Cidade</th>
							<th>Descrição</th>
							<th>Observações</th>
							<th>Deletar</th>
						</tr>
					</thead>
			
			<?php
			
			while($resultado = mysqli_fetch_assoc($sql_busca))
			{
				?>
				
				<tr>
					
					<td><?php echo $resultado['nome_atracao']; ?></td>
					<td><?php echo "R$ " .$resultado['preco_atracao']; ?></td>
					<td><?php echo $resultado['tel_atracao']; ?></td>
					<td><?php echo $resultado['cidade_atracao']; ?></td>
					<td><?php echo $resultado['descricao_atracao']; ?></td>
					<td><?php echo $resultado['observacoes_atracao']; ?></td>
					<td> <a onclick="delete_atracao(<?php echo $resultado['id_atracao_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
					
				</tr>
				<?php
				
			}
			
			echo "</table>";
		echo "</div>";
	



?>

