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
										<strong>Sucesso!</strong> Usuário cadastrado com sucesso.
									</div>";
						}
						
					?>
				</div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Cadastro de Usários
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Cadastro de Usuários
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                         <form class="form-horizontal" role="form" data-toggle="validator" action="cadastro_usuario.php" method="post">
							  
							  
							  <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome_usuario" autofocus required 
										data-error="Este campo é obrigatório." data-minlength="4">
								   <div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Celular" id="telefone" name="cel_usuario" required 
										data-error="Este campo é obrigatório." data-minlength="2">
								   <div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<div class="col-sm-10">
								  <input type="text" class="form-control" placeholder="Endereço"  name="end_usuario" required 
										data-error="Este campo é obrigatório." >
								   <div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Usuario" id="cidade" name="usuario" required 
										data-error="Este campo é obrigatório." data-minlength="4">
								   <div class="help-block with-errors"></div>
								</div>
							  
								<div class="col-sm-5">
								  <input type="text" class="form-control"  placeholder="Senha" id="estilo" name="senha" required 
										data-error="Este campo é obrigatório." data-minlength="2">
								   <div class="help-block with-errors"></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<div class="col-sm-5">
								  <input type="text" class="form-control" placeholder="Id da Empresa"  name="id_empresa" required 
										data-error="Este campo é obrigatório." >
								   <div class="help-block with-errors"></div>
								</div>
								
								<div class="col-sm-5">
								    <select class="form-control" name="nivel_acesso" id="cod-dist">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>	
								</div>
							 </div>
							  
							 
							  <div class="form-group">
								<div class="col-sm-3">
								  <button type="submit" class="active btn btn-block btn-primary">Cadastrar</button>
								</div>
								<div class="col-sm-3">
								  <a href="../index.php" class="btn btn-block btn-default">Cancelar</a>
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
