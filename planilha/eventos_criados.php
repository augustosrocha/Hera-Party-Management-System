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
		function delete_evento(x)
		{
			
			var r=confirm("Você tem certeza que deseja deletar um EVENTO INTEIRO?");
			if (r==true)
			{
			$.ajax({
				type: 'post',
				url: 'delete_evento.php?id_festa='+x
				
					
				});
				
				//window.location.href="delete_custos_festa.php?id_custo=" + x;
				window.location.href="eventos_criados.php?c=sucesso";
				location.reload();
			}
			else
			  {
				location.reload();
			  }
			
			
			//alert("Dados deletados com sucesso");
			
		}
	
	
	
</script>
	
	<link rel="icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../imagens/icone_Hera.ico" type="image/x-icon" />
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
										<strong>Sucesso!</strong> Evento deletado com sucesso.
										</div>";
						}
					?>
				</div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Eventos Criados
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Eventos Criados
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered" id="eventos">
					<thead>
						<tr>
							<th>Nome</th>
							<th>N. Pessoas</th>
							<th>Data</th>
							<th>Local</th>
							<th>Tema</th>
							<th>Custos</th>
							<th>Receita</th>
							<th>Saldo Final</th>
							<th>Planilha</th>
							<th>Excluir</th>
							<th>Lista</th>
						<tr>
					</thead>
					<?php
						
						
						
						$sql = "SELECT * FROM festa fe LEFT JOIN locais lf ON fe.id_local = lf.id_local WHERE fe.usuario = '".$usuario."'";
						
						$query = mysqli_query($link, $sql);
						if(!$query)
						{
							echo  mysqli_error($link);
						}
						else
						{
							while($resultado = mysqli_fetch_assoc($query))
							{
								?>
								<tr align="center">
									<td><?php echo $resultado['nome_festa']; ?></td>
									<td><?php echo $resultado['quantidade_pessoas']; ?></td>
									<td><?php echo $resultado['data_festa']; ?></td>
									<td><?php echo $resultado['nome_local']; ?></td>
									<td><?php echo $resultado['tema_festa']; ?></td>
									<td><?php echo "R$ " .$resultado['total_custos']; ?></td>
									<td><?php echo "R$ " .$resultado['total_receita']; ?></td>
									<?php if($resultado['saldo_festa'] < 0){?>
								
										<td bgcolor="#8B0000" style="color:WHITE"><?php echo "R$ " .$resultado['saldo_festa']; ?></td>
							
									<?php }else{ ?>
										<td bgcolor="#32CD32" style="color:WHITE"><?php echo "R$ " .$resultado['saldo_festa']; ?></td>
									<?php } ?>
									<td> <a href='form_planilha.php?id_festa=<?php echo $resultado['id_festa']; ?>'><i class="glyphicon glyphicon-file"></i></a> </td>
									<td> <a onClick="delete_evento(<?php echo $resultado['id_festa'];?>)"><i class="glyphicon glyphicon-remove-sign"></i></a> </td>
									<td> <a href='form_lista.php?id_festa=<?php echo $resultado['id_festa']; ?>'><i class="	glyphicon glyphicon-list"></i></a> </td>
							</tr>
							<?php
							}
						}
							?>
				
					</table>
               </div>
			   </div>
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












