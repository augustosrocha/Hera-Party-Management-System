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

	<?php
		include "validacao.php";
    ?>
	
</head>

<body>

    <div id="wrapper">
	<?php
	
	include "conecta_bd.php";
	
	
	
	
	
	
	
	
	
?>
        <!-- Navigation -->
        <?php
	
			include "cabecalho.php";
			
			
			if(isset($_GET['id_festa']))
			{
				
				$_SESSION['id_festa'] = $_GET['id_festa'];
			}
	
			$query = "SELECT * FROM festa fe LEFT JOIN locais lf ON fe.id_local = lf.id_local WHERE id_festa = '".$_SESSION['id_festa']."'";
	
			$sql=mysqli_query($link, $query);
	
			$resultado_festa=mysqli_fetch_assoc($sql);
			
			
			
		?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
				<div class="row">
					<?php
						if(isset($_GET['b']))
						{
							if($_GET['b'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Dados adicionados a planilha com sucesso.
									</div>";
						}
						if(isset($_GET['c']))
						{
							if($_GET['c'] == "sucesso")
								echo "<div class='alert alert-success'>
										<strong>Sucesso!</strong> Dados deletados da planilha com sucesso.
										</div>";
						}
						
						if($resultado_festa['usuario'] != $_SESSION['usuario'])
						{
							echo "<h2>Você não tem acesso a esse evento. Por favor entre em contato com o organizador.</h2>";
							echo "<a href='eventos_criados'> Voltar aos meus eventos </a>";
							exit();
						}
					?>
				</div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							<?php echo $resultado_festa['nome_festa']; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="eventos_criados.php">Eventos Criados</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <?php echo $resultado_festa['nome_festa']; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Balanço parcial</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<?php include "calculo_planilha.php"; ?>
					</div>
				</div>
				<div class="row">	
					<div class="col-lg-12">
					
						
									<a href="avaliacao_servicos.php"><button  type="button" class="btn btn-danger">Fechar Evento</button></a>
							
						
					</div>
				</div>	
				<div class="row">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Modificar informações básicas</h3>
					</div>
				</div>
				
                <div class="row">
                    <div class="col-lg-6">

						<form class="form-horizontal" role="form" data-toggle="validator" action="alterar_evento.php" method="POST">
						
								
							<div class="form-group">
								<div class="col-sm-4">
								  <input type="text" class="form-control" id="nome_evento" name="nome_evento" placeholder="Nome do evento" value="<?php echo $resultado_festa['nome_festa']; ?>" required
								  data-error="Este campo é obrigatório." data-minlength="2">
								   <div class="help-block with-errors"></div>
								</div>
								<div class="col-sm-4">
								  <input type="text" class="form-control" id="n_pessoas" name="quantidade_pessoas" placeholder="Quantidade de Pessoas" value="<?php echo $resultado_festa['quantidade_pessoas']; ?>" required
								  data-error="Este campo é obrigatório." data-minlength="2">
								  <div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-4">
								  <input type="text" class="form-control" id="tema_festa" name="tema_festa" placeholder="Tema do evento" value="<?php echo $resultado_festa['tema_festa']; ?>">
								</div>
								  <div class="col-sm-4">
								  <input type="text" class="form-control" id="data" name="data_festa" placeholder="Data do evento" value="<?php echo $resultado_festa['data_festa']; ?>">
								</div>
							</div>
					
							  
							  <div class="form-group">
								<div class="col-sm-4">
									<button type="submit" class="btn btn-primary ">Salvar modificações</button>
									</div>
							  </div>
						</form>
					</div>
					
				</div>
				
				<div class="row" id="local">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Local</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
					
						<?php include "planilha_local.php"; ?>
						
					</div>
				</div>
				<div class="row">	
					<div class="col-lg-12">
					
						
									<a href="busca_local.php"><button  type="button" class="btn btn-primary">Buscar Local</button></a>
							
						
					</div>
				</div>	
				
				<div class="row" id="custo">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Custos (bebidas, copos, etc)</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						
						<?php include "planilha_bebidas.php"; ?>
						
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<a href="busca_custo.php"><button  type="button" class="btn btn-primary">Buscar Custo</button></a>
					</div>
				</div>
				
				<div class="row" id="custo_pessoal">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Custos com Pessoal (bartenders, seguranças, etc.)</h3>
					</div>
				</div>
				
				
				<div class="row">
				
					<div class="col-lg-12">
						<?php include "planilha_custo_pessoal.php"; ?>
					</div>
				</div>	
				<div class="row">
					<div class="col-lg-12">
						<a href="busca_custo_pessoal.php"><button  type="button" class="btn btn-primary">Buscar Custo Pessoal</button></a>
					</div>
				</div>
				
				<div class="row" id="atracao">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Atrações</h3>
					</div>
				</div>
				
				<div class="row">
                    
					<div class="col-lg-12">
						<?php include "planilha_atracao.php"; ?>
					</div>
										
				</div>
				<div class="row">
					<div class="col-lg-12">
						<a href="busca_atracao.php"><button  type="button" class="btn btn-primary">Buscar Atração</button></a>
					</div>
				</div>
				
				<div class="row" id="custo_add">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Custos Adicionais (Terceirizações, alvará, etc.)</h3>
					</div>
				</div>
				
				<div class="row">	
					
					<div class="col-lg-6">
						<form class="form-horizontal" role="form" data-toggle="validator" action="gravar_custo_add.php" method="POST">
							 <div class="form-group">
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nome_custo_add" placeholder="Nome" required 
										data-error="Este campo é obrigatório." data-minlength="4">
								   <div class="help-block with-errors"></div>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="valor_unitario" id="preco" placeholder="Preço Unitário" required 
										data-error="Este campo é obrigatório." data-minlength="2">
								   <div class="help-block with-errors"></div>
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="quantidade_custo_add" id="lotacao" placeholder="Quantidade" required 
										data-error="Este campo é obrigatório.">
								   <div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-5">
									<button type="submit" class="active btn btn-block  btn-primary">Adicionar a planilha</button>
								</div>
							 </div>
						</form>	
							
					</div>	 
					<div class="col-lg-6">
						<?php include "planilha_custo_add.php"; ?>
					</div>	
				</div>
				
				<div class="row" id="convites">
					<hr>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Convites</h3>
					</div>
				</div>
								
				<div class="row">
					
                    <div class="col-lg-6">
						<form class="form-horizontal" role="form" data-toggle="validator" action="gravar_convite_festa.php" method="POST">		
							<div class="form-group">
								<div class="col-sm-5">
									<input type="text" class="form-control" name="lote_convite" id="lote" placeholder="Lote do convite" required 
										data-error="Este campo é obrigatório.">
								   <div class="help-block with-errors"></div>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="quantidade_convite" id="quantidade" placeholder="Quantidade" required 
										data-error="Este campo é obrigatório.">
								   <div class="help-block with-errors"></div>
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" name="valor_convite" id="preco_lote" placeholder="Valor" required 
										data-error="Este campo é obrigatório." data-minlength="2">
								   <div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-5">
									<button type="submit" class="active btn btn-block  btn-primary">Adicionar a planilha</button>
								</div>
							</div>
						</form>	  
					</div>
					<div class="col-lg-6">
						<?php include "planilha_convite_festa.php"; ?>
					</div>
				</div>
				
				<div class="row">
					<hr>
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
