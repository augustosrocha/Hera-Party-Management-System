<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hera 1.0</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="../css/bootstrap-datepicker.css" rel="stylesheet">
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<?php
		include "validacao.php";
    ?>

</head>
<?php
	
	include "conecta_bd.php";
	
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
	
			include "cabecalho.php";
			
		?>
        <div id="page-wrapper">

            <div class="container-fluid">
				
				
				<div class="row">
					<?php
						if(isset($_GET['b']))
						{
							if($_GET['b'] == "sucesso")
							{
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Avaliação feita com sucesso.
									</div>";
							}
						}
						
						if(isset($_GET['c']))
						{
							if($_GET['c'] == "erro")
							{	echo "<div class='alert alert-danger'>
										<strong>Erro! </strong>" .$_SESSION['msg_erro']."
										</div>";
							}
						}
					?>
				</div>
				
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Avaliar Serviços
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Avaliar Serviços
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
					<div class="row">
						<div class="col-lg-6">

							<form class="form-horizontal" role="form" data-toggle="validator" action="gravar_avaliacao.php" method="post">
							
								<?php
									
									$query_local = "SELECT * FROM locais lo JOIN festa fe ON lo.id_local = fe.id_local WHERE fe.id_festa = '".$_SESSION['id_festa']."'";
									$sql_local = mysqli_query($link, $query_local);
									
									$query_atracao = "SELECT * FROM atracao_festa af JOIN atracoes at ON af.id_atracao = at.id_atracao WHERE id_festa = '".$_SESSION['id_festa']."'";
									$sql_atracao = mysqli_query($link, $query_atracao);
									$cont_atracao = 0;
									
									$query_custo = "SELECT * FROM custos_festa cf JOIN bebidas be ON cf.id_custo = be.id_custo JOIN fornecedores fo ON fo.id_fornecedor = be.id_fornecedor WHERE id_festa = '".$_SESSION['id_festa']."'";
									$sql_custo = mysqli_query($link, $query_custo);
									
									$query_custo_pessoal = "SELECT * FROM custo_pessoal cp JOIN custo_pessoal_festa cf ON cp.id_custo_pessoal = cf.id_custo_pessoal WHERE cf.id_festa = '".$_SESSION['id_festa']."'";
									$sql_custo_pessoal = mysqli_query($link, $query_custo_pessoal);
									
									echo "<h3> Local </h3>";
									
									while($resultado_local = mysqli_fetch_assoc($sql_local))
									{?>
										<div class="form-group">
											<div class="col-sm-2">
												<label for="id_1">Id:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_local['id_local'];?>"  name="id_local[]" readonly>
											</div>
									
											<div class="col-sm-4">
												<label for="id_1">Nome:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_local['nome_local'];?>"  name="nome_local" readonly>
											</div>
											
											<div class="col-sm-4">
												<label for="id_1">Serviço avaliado:</label>
												<input type="text" class="form-control"  value="local"  name="tipo_local" readonly>
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-sm-4">
												
												<label for="sel1">Escolha uma nota:</label>
													  <select class="form-control" id="sel1" name="avaliacao_local[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													  </select>
											</div>
										
											<div class="col-sm-6">
												<label for="id_1">Avaliação escrita:</label>
												<textarea class="form-control" name="comentario_local[]" maxlength="250" placeholder="Avaliação escrita" ></textarea>
											</div>
										</div>
										
										<div class='row' id='local'>
											<hr>
										</div>
										
									<?php
									}	
									
									echo "<h3> Atração </h3>";	
								while($resultado_atracao = mysqli_fetch_assoc($sql_atracao))
									{?>
										<div class="form-group">
											<div class="col-sm-2">
												<label for="id_1">Id:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_atracao['id_atracao'];?>"  name="id_atracao[]" readonly>
											</div>
									
											<div class="col-sm-4">
												<label for="id_1">Nome:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_atracao['nome_atracao'];?>"  name="nome_atracao[]" readonly>
											</div>
											
											<div class="col-sm-4">
												<label for="id_1">Serviço avaliado:</label>
												<input type="text" class="form-control"  value="atracao"  name="tipo_servico_atracao" readonly>
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-sm-4">
												
												<label for="sel1">Escolha uma nota:</label>
													  <select class="form-control" id="sel1" name="avaliacao_atracao[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													  </select>
											</div>
										
											<div class="col-sm-6">
												<label for="id_1">Avaliação escrita:</label>
												<textarea class="form-control" name="comentario_atracao[]" maxlength="250" placeholder="Avaliação escrita" ></textarea>
											</div>
										</div>
										
										<div class='row' id='local'>
											<hr>
										</div>
									<?php
										$cont_atracao = $cont_atracao + 1;
									}
									$_SESSION['cont_atracao'] = $cont_atracao;
									
									echo "<h3> Fornecedores </h3>";
									
									while($resultado_custo = mysqli_fetch_assoc($sql_custo))
									{?>
										<div class="form-group">
											<div class="col-sm-2">
												<label for="id_1">Id:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_custo['id_fornecedor'];?>"  name="id_fornecedor[]" readonly>
											</div>
									
											<div class="col-sm-4">
												<label for="id_1">Nome:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_custo['nome_fornecedor'];?>"  name="nome_fornecedor" readonly>
											</div>
											
											<div class="col-sm-4">
												<label for="id_1">Serviço avaliado:</label>
												<input type="text" class="form-control"  value="fornecedor"  name="tipo_fornecedor" readonly>
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-sm-4">
												
												<label for="sel1">Escolha uma nota:</label>
													  <select class="form-control" id="sel1" name="avaliacao_fornecedor[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													  </select>
											</div>
										
											<div class="col-sm-6">
												<label for="id_1">Avaliação escrita:</label>
												<textarea class="form-control" name="comentario_fornecedor[]" maxlength="250" placeholder="Avaliação escrita" ></textarea>
											</div>
										</div>
										
										<div class='row' id='local'>
											<hr>
										</div>
										
									<?php
									}	
									
									echo "<h3> Empresas de custo com pessoal </h3>";
									
									while($resultado_custo_pessoal = mysqli_fetch_assoc($sql_custo_pessoal))
									{?>
										<div class="form-group">
											<div class="col-sm-2">
												<label for="id_1">Id:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_custo_pessoal['id_custo_pessoal'];?>"  name="id_custo_pessoal[]" readonly>
											</div>
									
											<div class="col-sm-4">
												<label for="id_1">Nome:</label>
												<input type="text" class="form-control"  value="<?php echo $resultado_custo_pessoal['empresa_custo_pessoal'];?>"  name="nome_custo_pessoal" readonly>
											</div>
											
											<div class="col-sm-4">
												<label for="id_1">Serviço avaliado:</label>
												<input type="text" class="form-control"  value="custo pessoal"  name="tipo_fornecedor" readonly>
											</div>
										</div>
										
										<div class="form-group">
											
											<div class="col-sm-4">
												
												<label for="sel1">Escolha uma nota:</label>
													  <select class="form-control" id="sel1" name="avaliacao_custo_pessoal[]">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													  </select>
											</div>
										
											<div class="col-sm-6">
												<label for="id_1">Avaliação escrita:</label>
												<textarea class="form-control" name="comentario_custo_pessoal[]" maxlength="250" placeholder="Avaliação escrita" ></textarea>
											</div>
										</div>
										
										<div class='row' id='local'>
											<hr>
										</div>
										
									<?php
									}	
								?>
								
								<div class="form-group">
									
									<div class="col-sm-3">
										<button type="submit" class="active btn btn-block btn-primary">Enviar Avaliação</button>
									</div>
								    <div class="col-sm-3">
										<a href="form_planilha.php" class="btn btn-block btn-default">Cancelar</a>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-6">
                       </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
                    </div>
					</div>
					
				
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
