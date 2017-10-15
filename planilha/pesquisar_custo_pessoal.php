<?php
	
	
	
	if(isset($_GET['a'])){
		if ($_GET['a'] == "buscar")
		{
			$nome_custo_pessoal = $_POST['nome_custo_pessoal'];
			
			
			$query = "SELECT * FROM custo_pessoal WHERE nome_custo_pessoal = '".$nome_custo_pessoal."'";
			
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
						<th>Preço (R$)</th>
						<th>Empresa</th>
					<tr>
				</thead>
			<?php
			while($resultado = mysqli_fetch_assoc($sql))
			{
				?>
				<tr>
							<td><input type="radio" name="id_custo_pessoal" value="<?php echo $resultado['id_custo_pessoal']; ?>"></td>
							<td><?php echo $resultado['nome_custo_pessoal']; ?></td>
							<td><?php echo $resultado['preco_custo_pessoal']; ?></td>
							<td><?php echo $resultado['empresa_custo_pessoal']; ?></td>
				</tr>
				<?php		
			}
			?>
			
			</table>
			
			</div>
							<div class="col-lg-3">
							
								
								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="quantidade_custo_pessoal" id="lotacao" placeholder="Quantidade" required
								  data-error="Este campo é obrigatório." >
								   <div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<button type="submit" class="active btn btn-block btn-primary">Adicionar à Planilha</button>
									</div>
									<div class="col-sm-6">
										<a href="form_planilha.php" class="btn btn-block btn-default" >Cancelar</a>
									</div>
								</div>
							
							</div>
			<?php
		}
	}
?>





















