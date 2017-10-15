<script>
		function delete_custo_pessoal(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar este custo da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_custo_pessoal_festa.php?id_custo_pessoal='+x
				
					
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
			
			
			
			$query = "SELECT * FROM custo_pessoal cp JOIN custo_pessoal_festa cf ON cp.id_custo_pessoal = cf.id_custo_pessoal WHERE cf.id_festa = '".$_SESSION['id_festa']."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			<div class="table-responsive">
				 <table class='table table-bordered' id='custo_pessoal'>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Preço Unitário</th>
							<th>Quantidade</th>
							<th>Preço Total</th>
							<th>Empresa</th>
							<th>Excluir</th>
						<tr>
					</thead>
				<?php
				while($resultado = mysqli_fetch_assoc($sql))
				{
					?>
					<tr align="center">

								<td><?php echo $resultado['nome_custo_pessoal']; ?></td>
								<td><?php echo "R$ " .$resultado['preco_custo_pessoal']; ?></td>
								<td><?php echo $resultado['quantidade']; ?></td>
								<td><?php echo "R$ " .$resultado['preco_custo_pessoal']*$resultado['quantidade']; ?></td>
								<td><?php echo $resultado['empresa_custo_pessoal']; ?></td>
								<td> <a onclick="delete_custo_pessoal(<?php echo $resultado['id_custo_pessoal_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
					</tr>
					<?php		
				}
				?>
			
				</table>
			</div>