<?php
	
	
	
	if(isset($_GET['a'])){
		if ($_GET['a'] == "buscar")
		{
			$cidade_atracao = $_POST['cidade_atracao'];
			
			
			$query = "SELECT * FROM atracoes WHERE cidade_atracao = '".$cidade_atracao."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			</br>
			<hr>
			</br>
			<div class="col-lg-6">
			 <table class='table table-bordered' id='atracoes'>
				<thead>
					<tr>
						<th>Selecione</th>
						<th>Nome</th>
						<th>Preço (R$)</th>
						<th>Telefone</th>
						<th>Cidade</th>
						<th>Descrição</th>
						<th>Observações</th>
					<tr>
				</thead>
			<?php
			while($resultado = mysqli_fetch_assoc($sql))
			{
				?>
				<tr>
							<td><input type="radio" name="id_atracao" value="<?php echo $resultado['id_atracao']; ?>"></td>
							<td><?php echo $resultado['nome_atracao']; ?></td>
							<td><?php echo $resultado['preco_atracao']; ?></td>
							<td><?php echo $resultado['tel_atracao']; ?></td>
							<td><?php echo $resultado['cidade_atracao']; ?></td>
							<td><?php echo $resultado['descricao_atracao']; ?></td>
							<td><?php echo $resultado['observacoes_atracao']; ?></td>							
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
										<a href="form_planilha.php" class="btn btn-block btn-default" >Cancelar</a>
									</div>
								</div>
							
							</div>
			<?php
		}
	}
?>





















