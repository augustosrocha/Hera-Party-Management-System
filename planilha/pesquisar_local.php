<?php
	
	
	
	if(isset($_GET['a'])){
		if ($_GET['a'] == "buscar")
		{
			$cidade_local = $_POST['cidade_local'];
			
			
			$query = "SELECT * FROM locais WHERE cidade_local = '".$cidade_local."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			</br>
			<hr>
			</br>
			<div class="col-lg-9">
			 <table class='table table-bordered' id='locais'>
				<thead>
					<tr>
						<th>Selecione</th>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Telefone</th>
						<th>Dono</th>
						<th>Preço (R$)</th>
						<th>Lotação</th>
						<th>Observações</th>
					<tr>
				</thead>
			<?php
			while($resultado = mysqli_fetch_assoc($sql))
			{
				?>
				<tr>
							<td><input type="radio" name="id_local" value="<?php echo $resultado['id_local']; ?>"></td>
							<td><?php echo $resultado['nome_local']; ?></td>
							<td><?php echo $resultado['endereco_local']; ?></td>
							<td><?php echo $resultado['cidade_local']; ?></td>
							<td><?php echo $resultado['telefone_local']; ?></td>
							<td><?php echo $resultado['dono_local']; ?></td>
							<td><?php echo $resultado['preco_local']; ?></td>	
							<td><?php echo $resultado['lotacao_local']; ?></td>
							<td><?php echo $resultado['observacoes_local']; ?></td>	
				</tr>
				<?php		
			}
			?>
			
			</table>
			
			</div>
							<div class="col-lg-3">
							
								
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="active btn btn-block btn-primary">Adicionar à Planilha</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<a href="form_planilha.php" class="btn btn-block btn-default" >Cancelar</a>
									</div>
								</div>
							
							</div>
			<?php
		}
	}
?>





















