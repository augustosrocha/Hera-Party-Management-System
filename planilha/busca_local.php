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
	
	<script>
	
		
		
		$( "select" )
		.change (function(){
			
			alert("TESTE");
			
			$.ajax({
				type: "GET",
				url: "teste.php",
			});
			
		})
		.change();
		
	</script>
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Busca Local do Evento
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Busca Local do Evento
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                
					<div class="row">
						<div class="col-lg-6">
							<form class="form-horizontal" role="form" action="busca_local.php?a=buscar" method="post" >
								
							
								<div class="col-lg-5">
									<select class="form-control" name="cidade_local" id="cod-dist">
										<option value="" >ESCOLHA A CIDADE DO LOCAL</option>
										
											<?php
											$sql=mysqli_query($link, "SELECT DISTINCT cidade_local FROM locais");
											while($resultado=mysqli_fetch_assoc($sql))
											{
												?>
												
												<option >
													<?php echo $resultado['cidade_local']; ?>
												</option>
											<?php
											}
											?>
									
									</select>
								</div>	
								<div class="col-lg-2">
								
									<button type="submit" class="active btn btn-block  btn-primary">Buscar</button>
								
								</div>
							</form>
						</div>
						
					</div>
					
					<div class="row">
						<form class="form-horizontal" role="form" action="gravar_local_festa.php" method="post" >
							
								<?php include "pesquisar_local.php"; ?>
								
							
						</form>
					</div>
						
					<div class="row">
						
						
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
