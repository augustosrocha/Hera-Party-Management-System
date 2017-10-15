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
	
	<link rel="icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />
	
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
			
			if(isset($_GET['id_festa']))
			{
				$_SESSION['id_festa'] = $_GET['id_festa'];
			}
			
			
			
		?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
				<?php
						if(isset($_GET['a']))
						{
							if($_GET['a'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Pessoa adicionada a lista com sucesso.
									</div>";
						}
						if(isset($_GET['c']))
						{
							if($_GET['c'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Dados deletados da planilha com sucesso.
										</div>";
						}
					?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Lista
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lista
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				
				<?php
					
					$sql1 = "SELECT * FROM lista_festa WHERE id_festa = '".$_SESSION['id_festa']."'";
							
					$query1 = mysqli_query($link, $sql1);
					
					$resultado1 = mysqli_fetch_assoc($query1);
					if(empty($resultado1))
					{
				?>
						<div class="row">
					
							<div class="col-lg-3">
								<a href="cria_lista.php"><button  type="button" class="btn btn-primary">Adicionar Lista</button></a>
							</div>
				
						</div>
						<div class="row">
							<hr>
						</div>
						<div class="row">
						
						<div class="col-lg-6">
                       </br></br></br></br></br></br></br></br></br></br></br>
                    </div>
					</div>
				<?php
					}
					else
					{
				
				?>
				
				<div class="row">
						<div class="col-lg-4">

								<form class="form-horizontal" role="form" data-toggle="validator" action='gravar_nome_lista.php?id_lista=<?php echo $resultado1['id_lista']; ?>' method="post" >
								
										
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form-control"  placeholder="Nome " name="nome_pessoa" autofocus required 
											data-error="Por favor, informe o nome da pessoa." data-minlength="4">
									   <div class="help-block with-errors"></div>
										</div>
										
										<div class="col-sm-6">
											<input type="text" class="form-control"  placeholder="Documento" name="documento_pessoa">
										</div>
									</div>
									

									<div class="form-group">
										<div class="col-sm-6">
											<select class="form-control" name="tipo_pagamento" >
												<option value=" " >Forma de pagamento</option>
												<option value="Dinheiro" >Dinheiro</option>
												<option value="Cartao" >Cartão</option>
											</select>
										</div>
										
										
										
										<div class="col-sm-6">
											<input type="text" class="form-control"  placeholder="Responsável pela Venda" name="responsavel_venda">
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-4">
											<select class="form-control" name="pago" >
												<option value=" " >Pago</option>
												<option value="1" >SIM</option>
												<option value="0" >NAO</option>
											</select>
										</div>
										
										<div class="col-sm-4">
											<input type="text" class="form-control"  placeholder="Lote do Convite"  name="lote_convite">
										</div>
										
										<div class="col-sm-4">
											<input type="text" class="form-control"  placeholder="Valor Pago" id="preco" name="valor_pago">
										</div>
									</div>
									
									
									<div class="form-group">
										
										<div class="col-sm-3">
											<button type="submit" class="active btn btn-block btn-primary">Gravar</button>
										</div>
										<div class="col-sm-3">
											<a href="eventos_criados.php" class="btn btn-block btn-default">Cancelar</a>
										</div>
									</div>
									
									
								</form>
							</div>
					
						<div class="col-lg-8">
						<div class="table-responsive">
						<table class="table table-bordered" id="eventos">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Documento</th>
								<th>Forma de Pagamento</th>
								<th>Responsável pela venda</th>
								<th>Pago</th>
								<th>Lote do convite</th>
								<th>Valor Pago</th>
								<th>Alterar</th>
								<th>Excluir</th>
							<tr>
						</thead>
						<?php
							
							
							
							$sql = "SELECT * FROM lista_festa lf LEFT JOIN pessoa_lista pl ON lf.id_lista = pl.id_lista WHERE lf.id_festa = '".$_SESSION['id_festa']."'";
							
							$query = mysqli_query($link, $sql);
							
							while($resultado = mysqli_fetch_assoc($query))
							{
								?>
								<tr align="center">
									<td><?php echo $resultado['nome_pessoa']; ?></td>
									<td><?php echo $resultado['documento_pessoa']; ?></td>
									<td><?php echo $resultado['tipo_pagamento']; ?></td>
									<td><?php echo $resultado['responsavel_venda']; ?></td>
									<?php
										
									?>
									<td><?php if ($resultado['pago'] == 0){echo "Não";}else{ echo "Sim";}?></td>
									<td><?php echo $resultado['lote_convite']; ?></td>
									<td><?php echo "R$ " .$resultado['valor_pago']; ?></td>
									<td> <a href='form_alterar_lista.php?id_pessoa_lista=<?php echo $resultado['id_pessoa_lista']; ?>'><i class="glyphicon glyphicon-edit"></i></a> </td>
									<td> <a href="#"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
								</tr>
								<?php
							}
						
								?>
					
						</table>
				   </div>
				   </div>
			   </div>
				<?php
					}
				?>
					<div class="row">
						
						<div class="col-lg-6">
                       </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
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












