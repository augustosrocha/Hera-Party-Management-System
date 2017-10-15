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
					<?php
						if(isset($_GET['a']))
						{
							if($_GET['a'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Fornecedor alterado com sucesso.
									</div>";
						}
						if(isset($_GET['b']))
						{
							if($_GET['b'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Fornecedor excluído com sucesso.
										</div>";
						}
					?>
				</div>
				
				
				
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Consulta de Fornecedores
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Consulta de Fornecedores
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="table-responsive">
					<table class="table table-bordered" id="eventos">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Cidade</th>
							<th>Telefone</th>
							<th>Descrição</th>
							<th>Avaliação</th>
							<th>Alterar</th>
							<th>Excluir</th>
						<tr>
					</thead>
					<?php
						
						
						
						$sql = "SELECT * FROM fornecedores";
						
						$query = mysqli_query($link, $sql);
						
						while($resultado = mysqli_fetch_assoc($query))
						{
							?>
							<tr align="center">
								<td><?php echo $resultado['nome_fornecedor']; ?></td>
								<td><?php echo $resultado['cidade_fornecedor']; ?></td>
								<td><?php echo $resultado['tel_fornecedor']; ?></td>
								<td><?php echo $resultado['descricao_fornecedor']; ?></td>
								<td><?php echo $resultado['avaliacao_fornecedor']; ?></td>
								<td> <a href='form_fornecedor_alterar.php?id_fornecedor=<?php echo $resultado['id_fornecedor']; ?>'><i class="glyphicon glyphicon-edit"></i></a> </td>
								<td> <a href='excluir_fornecedor.php?id_fornecedor=<?php echo $resultado['id_fornecedor']; ?>'><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
							</tr>
							<?php
						}
						
					?>
					
					</table>
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












