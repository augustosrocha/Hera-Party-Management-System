	<script>
		function funcao1()
		{
			var x;
			var r=confirm("Você tem certeza que deseja deletar este local da planilha?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_local_festa.php'
					
				});
				
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
			
			
			
			$query = "SELECT * FROM locais lo JOIN festa fe ON lo.id_local = fe.id_local WHERE fe.id_festa = '".$_SESSION['id_festa']."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			<div class="table-responsive">
				<table class='table table-bordered' id='locais'>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Endereço</th>
							<th>Cidade</th>
							<th>Telefone</th>
							<th>Dono</th>
							<th>Preço</th>
							<th>Lotação</th>
							<th>Observações</th>
							<th>Excluir</th>
						</tr>
					</thead>
				<?php
				while($resultado = mysqli_fetch_assoc($sql))
				{
					?>
					<tr align="center">

								<td><?php echo $resultado['nome_local']; ?></td>
								<td><?php echo $resultado['endereco_local']; ?></td>
								<td><?php echo $resultado['cidade_local']; ?></td>
								<td><?php echo $resultado['telefone_local']; ?></td>
								<td><?php echo $resultado['dono_local']; ?></td>
								<td><?php echo "R$ " .$resultado['preco_local']; ?></td>	
								<td><?php echo $resultado['lotacao_local']; ?></td>
								<td><?php echo $resultado['observacoes_local']; ?></td>	
								<td> <a  onClick="funcao1()"><i  class="glyphicon glyphicon-remove-sign"></i></a> </td>
					</tr>
					<?php		
				}
				?>
				
				</table>
			</div>