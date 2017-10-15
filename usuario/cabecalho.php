<?php
		
		include "conecta_bd.php";
		session_start();
		if(isset($_SESSION['usuario']) && isset($_SESSION['senha']))
		{
			$query = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."' AND senha = '".$_SESSION['senha']."'";
			
			$sql = mysqli_query($link, $query);
			//echo "TESTE1";
			if(!$resultado = mysqli_fetch_assoc($sql))
			{
				header("Location: ../inicio.php");
			}
			else
			{
				$usuario = $_SESSION['usuario'];
				
			}	
			
		}
		elseif(isset($_COOKIE['usuario']) && isset($_COOKIE['senha']))
		{
			$query = "SELECT * FROM usuarios WHERE usuario = '".$_COOKIE['usuario']."' AND senha = '".$_COOKIE['senha']."'";
			
			$sql = mysqli_query($link, $query);
			//echo "TESTE1";
			if(!$resultado = mysqli_fetch_assoc($sql))
			{
				header("Location: ../inicio.php");
			}
			else
			{
				$usuario = $_COOKIE['usuario'];
			}
		}
		else
		{
			header("Location: ../inicio.php");
		}
		
		
?>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <!--    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php //echo $usuario; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php// echo $usuario; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php// echo $usuario; ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>-->
            <!--    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>-->
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
					
                   <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"><i class="glyphicon glyphicon-user"></i> Usuários <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="usuarios">
                            <li>
                                <a href="form_usuario.php">Cadastrar</a>
                            </li>
                            <li>
                                <a href="consulta_usuario.php">Consultar</a>
                            </li>
							
                        </ul>
                    </li>
					
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-pencil"></i> Cadastro <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../cadastro/form_fornecedor.php">Fornecedores</a>
                            </li>
                            <li>
                                <a href="../cadastro/form_custos.php">Custos</a>
                            </li>
							<li>
                                <a href="../cadastro/form_local.php">Locais para eventos</a>
                            </li>
                            <li>
                                <a href="../cadastro/form_atracoes.php">Atrações</a>
                            </li>
							<li>
                                <a href="../cadastro/form_custo_pessoal.php">Custo Pessoal</a>
                            </li>
                        </ul>
                    </li>
                    
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#consultar"><i class="fa fa-fw fa-search"></i> Consultar <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="consultar" class="collapse">
                           <li>
                                <a href="../consulta/consulta_fornecedor.php">Fornecedores</a>
                            </li>
                            <li>
                                <a href="../consulta/consulta_custos.php">Custos</a>
                            </li>
							<li>
                                <a href="../consulta/consulta_local.php">Locais para eventos</a>
                            </li>
                            <li>
                                <a href="../consulta/consulta_atracoes.php">Atrações</a>
                            </li>
							<li>
                                <a href="../consulta/consulta_custo_pessoal.php">Custo Pessoal</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#eventos"><i class="fa fa-fw fa-glass"></i> Eventos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="eventos" class="collapse">
                              <li>
                                <a href="../planilha/criar_evento.php">Criar Evento</a>
                            </li>
                            <li>
                                <a href="../planilha/eventos_criados.php">Eventos Criados</a>
                            </li>
							
                        </ul>
                    </li>
				</ul>	
            </div>
            <!-- /.navbar-collapse -->
		</nav>