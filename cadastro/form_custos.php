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
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Custo cadastrado com sucesso.
									</div>";
						}
						if(isset($_GET['c']))
						{
							if($_GET['c'] == "erro")
								echo "<div class='alert alert-danger'>
										<strong>Erro!</strong>" .$_SESSION['msg_erro']."
										</div>";
						}
					?>
				</div>
				
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Cadastro de Custos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Cadastro de Custos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
					
					
					
                        <form class="form-horizontal" role="form" data-toggle="validator" action="cadastro_custo.php" method="post">
							<?php
								if(isset($_GET['c']))
								{
									if($_GET['c'] == "erro")
									{
										
									?>  
									
									<div class="form-group">
										<div class="col-sm-5">
										
										
											<input type="text" class="form-control" value="<?php echo $_SESSION['id_fornecedor'];?>" name="id_fornecedor" readonly>
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" value="<?php echo $_SESSION['nome_fornecedor'];?>" name="nome_fornecedor" readonly>
										</div>
										<div>
										
										<a href="busca_fornecedor.php"><i class="fa fa-2x fa-fw fa-search"></i></a>
									  </div>
									</div>
									 
									  
									  <div class="form-group">
										<div class="col-sm-5">
										  <input type="text" class="form-control" placeholder="Nome" name="nome_custos" required 
												data-error="Este campo é obrigatório." data-minlength="4" value="<?php echo $_SESSION['nome_custos'];?>">
												<div class="help-block with-errors"></div>
										</div>
									 
										<div class="col-sm-5">
										  <input type="text" class="form-control" placeholder="Marca" name="marca_custos" required 
												data-error="Este campo é obrigatório." data-minlength="4" value="<?php echo $_SESSION['marca_custo'];?>">
												<div class="help-block with-errors"></div>
										</div>
									  </div>
									  <div class="form-group">
										<div class="col-sm-5">
										  <input type="text" class="form-control" placeholder="Preço" id="preco" name="preco_custo" required 
												data-error="Este campo é obrigatório." data-minlength="2" value="<?php echo $_SESSION['preco_custo'];?>">
												<div class="help-block with-errors"></div>
										</div>
									  
										<div class="col-sm-5">
										  <input type="text" class="form-control" placeholder="Tipo de Embalagem" name="tipo_embalagem" required 
												data-error="Este campo é obrigatório." data-minlength="1" value="<?php echo $_SESSION['tipo_embalagem'];?>">
												<div class="help-block with-errors"></div>
										</div>
									   </div>
									  
									  
									  <div class="form-group">
										<div class="col-sm-3">
										  <button type="submit" class="active btn btn-block btn-primary">Cadastrar</button>
										</div>
										<div class="col-sm-3">
										  <a href="../index.php"  class="btn btn-block btn-default" data-toggle="modal" data-target="#modalTeste">Cancelar</a>
										</div>
									  </div>
									
									
									<?php
									}
								}else
								{
							?>  
							  
							  <div class="form-group">
								<div class="col-sm-5">
								
								<?php
						
									if(isset($_POST['id_fornecedor']))
									{
										include "conecta_bd.php";
										
										$query = "SELECT nome_fornecedor FROM fornecedores WHERE id_fornecedor =".$_POST['id_fornecedor'];
										
										$sql = mysqli_query($link, $query);
										
										$resultado = mysqli_fetch_assoc($sql);
										
								?>
										<input type="text" class="form-control" value="<?php echo $_POST['id_fornecedor']; ?>" name="id_fornecedor" readonly>
									</div>
									<div class="col-sm-5">
										<input type="text" class="form-control" value="<?php echo $resultado['nome_fornecedor']; ?>" name="nome_fornecedor" readonly>
								<?php
									}
									else
									{
								?>
											<input type="text" class="form-control" placeholder="Id do Fornecedor" name="id_fornecedor" disabled >
										</div>
										<div class="col-sm-5">
											<input type="text" class="form-control" placeholder="Nome do Fornecedor" name="nome_fornecedor" disabled >
								<?php
									}
								?>
								
								  
								</div>
								
								<a href="busca_fornecedor.php"><i class="fa fa-2x fa-fw fa-search"></i></a>
							  </div>
							 
							 
							  
							  <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Nome" name="nome_custos" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							 
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Marca" name="marca_custos" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Preço" id="preco" name="preco_custo" required 
										data-error="Este campo é obrigatório." data-minlength="2">
										<div class="help-block with-errors"></div>
								</div>
							  
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Tipo de Embalagem" name="tipo_embalagem" required 
										data-error="Este campo é obrigatório." data-minlength="1">
										<div class="help-block with-errors"></div>
								</div>
							   </div>
							  
							  
							  <div class="form-group">
								<div class="col-sm-3">
								  <button type="submit" class="active btn btn-block btn-primary">Cadastrar</button>
								</div>
								<div class="col-sm-3">
								  <a href="../index.php"  class="btn btn-block btn-default" data-toggle="modal" data-target="#modalTeste">Cancelar</a>
								</div>
							  </div>
								<?php } ?>
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
