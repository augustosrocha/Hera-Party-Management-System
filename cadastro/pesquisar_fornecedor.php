<?php
	
	
	
	if(isset($_GET['a'])){
		if ($_GET['a'] == "buscar")
		{
			$cidade_fornecedor = $_POST['cidade_fornecedor'];
			
			
			$query = "SELECT * FROM fornecedores WHERE cidade_fornecedor = '".$cidade_fornecedor."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			</br>
			<hr>
			</br>
			<div class="col-lg-6">
			 <table class='table table-bordered' id='bebidas'>
				<thead>
					<tr>
						<th>Selecione</th>
						<th>Nome</th>
						<th>Cidade</th>
						<th>Telefone</th>
						<th>Descrição</th>
					<tr>
				</thead>
			<?php
			while($resultado = mysqli_fetch_assoc($sql))
			{
				?>
				<tr align="center">
							<td><input type="radio" name="id_fornecedor" value="<?php echo $resultado['id_fornecedor']; ?>"></td>
							<td><?php echo $resultado['nome_fornecedor']; ?></td>
							<td><?php echo $resultado['cidade_fornecedor']; ?></td>
							<td><?php echo $resultado['tel_fornecedor']; ?></td>
							<td><?php echo $resultado['descricao_fornecedor']; ?></td>
							
				</tr>
				<?php		
			}
			?>
			
			</table>
			
			</div>
							<div class="col-lg-6">
							
								
								<div class="form-group">
									<div class="col-sm-4">
										<button type="submit" class="active btn btn-block btn-primary">Adicionar à Planilha</button>
									</div>
									<div class="col-sm-4">
										<a class="btn btn-block btn-default" data-toggle="modal" data-target="#modalTeste">Cancelar</a>
									</div>
								</div>
							
							</div>
			<?php
		}
	}
?>





















