<script>
		function delete_convite(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar este lote de convites da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_covite_festa.php?id_convite='+x
				
					
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
			
			
			
			$query = "SELECT * FROM convite_festa WHERE id_festa = '".$_SESSION['id_festa']."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			<div class="table-responsive">
				 <table class='table table-bordered' id='convites'>
					<thead>
						<tr>
							<th>Lote</th>
							<th>Quantidade</th>
							<th>Preço</th>
							<th>Total</th>
							<th>Excluir</th>
						<tr>
					</thead>
				<?php
				while($resultado = mysqli_fetch_assoc($sql))
				{
					?>
					<tr>

								<td><?php echo $resultado['lote_convite']; ?></td>
								<td><?php echo $resultado['quantidade_convite']; ?></td>
								<td><?php echo "R$ " .$resultado['valor_convite']; ?></td>
								<td><?php echo "R$ " .$resultado['valor_convite']*$resultado['quantidade_convite']; ?></td>
								<td> <a onclick="delete_convite(<?php echo $resultado['id_convite_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
					</tr>
					<?php		
				}
				?>
			
				</table>
			</div>