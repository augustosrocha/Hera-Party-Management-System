<script>
		function delete_custo_add(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar este custo adicional da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_custo_add_festa.php?id_custo_add='+x
				
					
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
			
			
			
			$query = "SELECT * FROM custos_adicionais_festa WHERE id_festa = '".$_SESSION['id_festa']."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			<div class="table-responsive">
				 <table class='table table-bordered' id='locais'>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Preço</th>
							<th>Quantidade</th>
							<th>Total</th>
							<th>Excluir</th>
						<tr>
					</thead>
				<?php
				while($resultado = mysqli_fetch_assoc($sql))
				{
					?>
					<tr>

								<td><?php echo $resultado['nome_custo_add']; ?></td>
								<td><?php echo "R$ " .$resultado['valor_unitario']; ?></td>
								<td><?php echo $resultado['quantidade_custo_add']; ?></td>
								<td><?php echo "R$ " .$resultado['quantidade_custo_add']*$resultado['valor_unitario']; ?></td>
								<td> <a onclick="delete_custo_add(<?php echo $resultado['id_custos_add_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
					</tr>
					<?php		
				}
				?>
				
				</table>
			</div>