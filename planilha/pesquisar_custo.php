<?php
	
	
	
	if(isset($_GET['a'])){
		if ($_GET['a'] == "buscar")
		{
			$nome_custo = $_POST['nome_custo'];
			$marca_custo = $_POST['marca_custo'];
			
			
			$query = "SELECT * FROM bebidas WHERE nome_custo = '".$nome_custo."' AND marca_custo = '".$marca_custo."'";
			
			$sql = mysqli_query($link, $query);
			?>
			
			</br>
			<hr>
			</br>
			<div class="col-lg-6">
			 <table class='table table-bordered' id='bebidas'>
				<thead>
					<tr align="center">
						<th>Selecione</th>
						<th>Nome</th>
						<th>Marca</th>
						<th>Preço (R$)</th>
						<th>Tipo da embalagem</th>
						<th>id do fornecedor</th>
					<tr>
				</thead>
			<?php
			while($resultado = mysqli_fetch_assoc($sql))
			{
				?>
				<tr align="center">
							<td><input type="radio" name="id_custo" value="<?php echo $resultado['id_custo']; ?>" required></td>
							<td><?php echo $resultado['nome_custo']; ?></td>
							<td><?php echo $resultado['marca_custo']; ?></td>
							<td><?php echo $resultado['preco_custo']; ?></td>
							<td><?php echo $resultado['tipo_embalagem']; ?></td>
							<td><?php echo $resultado['id_fornecedor']; ?></td>
							
				</tr>
				<?php		
			}
			?>
			
			</table>
			
			</div>
							<div class="col-lg-6">
							
								<div class="form-group">
									<div class="col-sm-1">
										<input type="radio" name="quantidade" value="1" required>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control"  placeholder="Litros/Pessoa" id="litros_pessoa" name="litros_pessoa">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-1">
										<input type="radio" name="quantidade" value="2" required>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control"  placeholder="Quantidade" id="lotacao" name="quantidade_custo">
									</div>
								</div>
								
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





















