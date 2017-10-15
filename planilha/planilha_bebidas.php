<script>
		function delete_custo(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar este custo da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_custos_festa.php?id_custo='+x
				
					
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

	
		$query_busca = "SELECT * FROM custos_festa cf JOIN bebidas be ON cf.id_custo = be.id_custo JOIN fornecedores fo ON fo.id_fornecedor = be.id_fornecedor WHERE id_festa = '".$_SESSION['id_festa']."'";
		$sql_busca = mysqli_query($link, $query_busca);
		
		
		
		?>
		<div class="table-responsive">
			<table class='table table-bordered' id='bebidas'>
					<thead>
						<tr align="center">
							
							<th>Nome</th>
							<th>Marca</th>
							<th>Preço </th>
							<th>Quantidade Total</th>
							<th>Preço Total </th>
							<th>Litros por pessoa </th>
							<th>Tipo da embalagem</th>
							<th>Fornecedor</th>
							<th>Telefone</th>
							<th>Deletar</th>
						</tr>
					</thead>
			
			<?php
			
			while($resultado = mysqli_fetch_assoc($sql_busca))
			{
				?>
				
				<tr align="center">
					
					<td><?php echo $resultado['nome_custo']; ?></td>
					<td><?php echo $resultado['marca_custo']; ?></td>
					<td><?php echo "R$ " .$resultado['preco_custo']; ?></td>
					
					
					<?php
						if($resultado['quantidade'] == null)
						{ ?>
							<td><?php echo $resultado['litros_pessoa']*$resultado_festa['quantidade_pessoas']; ?></td>
							<td><?php echo "R$ " .$resultado['preco_custo']*$resultado_festa['quantidade_pessoas']*$resultado['litros_pessoa']; ?></td>
							<td><?php echo "R$ " .$resultado['litros_pessoa']; ?></td>
						<?php 
						}
						else if($resultado['litros_pessoa'] == null)
						{ ?>
							<td><?php echo $resultado['quantidade']; ?></td>
							<td><?php echo "R$ " .$resultado['preco_custo']*$resultado['quantidade']; ?></td>
							<td></td>						
						<?php } ?>
						
					<td><?php echo $resultado['tipo_embalagem']; ?></td>
					<td><?php echo $resultado['nome_fornecedor']; ?></td>
					<td><?php echo $resultado['tel_fornecedor']; ?></td>
					<td> <a onClick="delete_custo(<?php echo $resultado['id_custos_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
					
				</tr>
				<?php
				
			}
			
			echo "</table>";
		echo "</div>";
	



?>

