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
							Alteração de Fornecedores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Alteração de fornecedores
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
					
					include "conecta_bd.php";
					
					if(isset($_GET['id_fornecedor']))
					{
						$_SESSION['id_fornecedor'] = $_GET['id_fornecedor'];
					}
					
					
					$sql = "SELECT * FROM fornecedores WHERE id_fornecedor = " .$_SESSION['id_fornecedor'];
					
					$query = mysqli_query($link, $sql);
					
					$resultado = mysqli_fetch_assoc($query);
					
				?>
                <div class="row">
                    <div class="col-lg-6">
				
                        <form class="form-horizontal" role="form" data-toggle="validator" action="atualiza_fornecedor.php?id_fornecedor=<?php echo $_SESSION['id_fornecedor']; ?>" method="post">
							
							<?php
								if(isset($_GET['c']))
								{
									if($_GET['c'] == "erro")
									{
										
									?>
									<div class="form-group">
										<div class="col-sm-10">
										  <input type="text" class="form-control" id = "nome" maxlength="50" placeholder="Nome*"  name="nome_fornecedor" 
										  value="<?php echo $_SESSION['nome_fornecedor'];?>">
										</div>
									  </div>
									  <div class="form-group">
										<div class="col-sm-5">
										  <input type="text" class="form-control" id = "cidade" maxlength="50" placeholder="Cidade*" name="cidade_fornecedor" 
										  data-error="Este campo é obrigatório."  value="<?php echo $_SESSION['cidade_fornecedor'];?>">
										   <div class="help-block with-errors"></div>
										</div>
										<div class="col-sm-5">
										  <input  type="text" class="form-control"  placeholder="Telefone*" name="tel_fornecedor" 
										  value="<?php echo $_SESSION['tel_fornecedor'];?>" >
										  <div class="help-block with-errors"></div>
										</div>
									  </div>
									  <div class="form-group">
										<div class="col-sm-10">
										  <textarea class="form-control" name="descricao_fornecedor" maxlength="250" placeholder="Observações" ><?php echo $_SESSION['descricao_fornecedor'];?></textarea>
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
									<div class="col-sm-10">
									  <input type="text" class="form-control" placeholder="Nome" name="nome_fornecedor" value="<?php echo $resultado['nome_fornecedor']; ?>" required 
											data-error="Por favor, informe o nome do fornecedor." data-minlength="4">
									   <div class="help-block with-errors"></div>
									</div>
								  </div>
								  <div class="form-group">
									<div class="col-sm-5">
									  <input type="text" class="form-control" placeholder="Cidade" name="cidade_fornecedor" value="<?php echo $resultado['cidade_fornecedor']; ?>" required 
											data-error="Por favor, informe o nome do fornecedor." data-minlength="4">
									   <div class="help-block with-errors"></div>
									</div>
									<div class="col-sm-5">
									  <input type="text" class="form-control" placeholder="Telefone" id="telefone" name="tel_fornecedor" value="<?php echo $resultado['tel_fornecedor']; ?>" required 
											data-error="Por favor, informe o nome do fornecedor." data-minlength="4">
									   <div class="help-block with-errors"></div>
									</div>
								  </div>
								  <div class="form-group">
									<div class="col-sm-10">
									  <textarea class="form-control" name="descricao_fornecedor" placeholder="Observações" ><?php echo $resultado['descricao_fornecedor']; ?></textarea>
									</div>
								  </div>
								  <div class="form-group">
									<div class="col-sm-3">
									  <button type="submit" class="active btn btn-block btn-primary">Atualizar</button>
									</div>
									<div class="col-sm-3">
									  <a href="consulta_fornecedor.php" class="btn btn-block btn-default" data-toggle="modal" data-target="#modalTeste">Cancelar</a>
									</div>
								  </div>
						<?php 	} ?>
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
