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
						
						if(isset($_GET['c']))
						{
							if($_GET['c'] == "erro")
								echo "<div class='alert alert-danger'>
										<strong>Erro! </strong>" .$_SESSION['msg_erro']."
										</div>";
						}
					?>
				</div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Alteração de Local
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alteração de Local
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
					
					include "conecta_bd.php";
					
					if(isset($_GET['id_local']))
					{
						$_SESSION['id_local'] = $_GET['id_local'];
					}
					
					
					
				?>
                <div class="row">
                    <div class="col-lg-6">
				
                        <form class="form-horizontal" role="form" data-toggle="validator" action="atualiza_local.php?id_local=<?php echo $_SESSION['id_local']; ?>" method="post">
							
							<?php
								if(isset($_GET['c']))
								{
									if($_GET['c'] == "erro")
									{
									
									?> 
										<div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Nome" name="nome_local" value="<?php echo $_SESSION['nome_local']; ?>" autofocus required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Endereço" name="end_local" value="<?php echo $_SESSION['end_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Cidade" name="cidade_local" value="<?php echo $_SESSION['cidade_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Telefone" name="tel_local" id="telefone" value="<?php echo $_SESSION['tel_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							   
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="Nome do dono" name="dono_local" value="<?php echo $_SESSION['dono_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" placeholder="Preço" name="preco_local" id="preco" value="<?php echo $_SESSION['preco_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" placeholder="Lotação máxima" name="lotacao_local" id="lotacao" value="<?php echo $_SESSION['lotacao_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="2">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								
								<div class="col-sm-10">
								  <textarea class="form-control" name="observacoes_local" placeholder="Observações"> <?php echo $_SESSION['observacoes_local']; ?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-3">
								  <button type="submit" class="active btn btn-block  btn-primary">Cadastrar</button>
								</div>
								<div class="col-sm-3">
								  <a  href="consulta_local.php" class="btn btn-block btn-default">Cancelar</a>
								</div>
							  </div>
									
									
							<?php
									}
								}else
								{
									
									$sql = "SELECT * FROM locais WHERE id_local = " .$_SESSION['id_local'];
					
									$query = mysqli_query($link, $sql);
									
									$resultado = mysqli_fetch_assoc($query);
							?>  
							
							 <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Nome" name="nome_local" value="<?php echo $resultado['nome_local']; ?>" autofocus required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Endereço" name="end_local" value="<?php echo $resultado['endereco_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Cidade" name="cidade_local" value="<?php echo $resultado['cidade_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Telefone" name="tel_local" id="telefone" value="<?php echo $resultado['telefone_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							   
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="Nome do dono" name="dono_local" value="<?php echo $resultado['dono_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" placeholder="Preço" name="preco_local" id="preco" value="<?php echo $resultado['preco_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="4">
										<div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-3">
								  <input type="text" class="form-control" placeholder="Lotação máxima" name="lotacao_local" id="lotacao" value="<?php echo $resultado['lotacao_local']; ?>" required 
										data-error="Este campo é obrigatório." data-minlength="2">
										<div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								
								<div class="col-sm-10">
								  <textarea class="form-control" name="observacoes_local" placeholder="Observações"> <?php echo $resultado['observacoes_local']; ?></textarea>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-3">
								  <button type="submit" class="active btn btn-block  btn-primary">Cadastrar</button>
								</div>
								<div class="col-sm-3">
								  <a  href="consulta_local.php" class="btn btn-block btn-default">Cancelar</a>
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
