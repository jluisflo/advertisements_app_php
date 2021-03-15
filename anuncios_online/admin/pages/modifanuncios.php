<!DOCTYPE html>
 <?php 
  session_start();
 include '../../script/conexion.php';		
 
	
if (!isset($_SESSION['nombre'])){

header("Location: ../index.php");

}
 
 $cn = conexion();
    if ($_GET['edit']){
    $edit = ($_GET['edit']);
   

	$consulta = mysqli_query($cn,"SELECT * FROM anuncio where cod_anun = '$edit' ");
	$row = mysqli_fetch_row($consulta);
	$row0 = $row['0'];
	$row1 = $row['1'];
	$row2 = $row['2'];
	$row3 = $row['3'];
	$row8 = $row['8'];
	$row9 = $row['9'];
	$row10 = $row['10'];
	$row11 = $row['11'];
	$row12 = $row['12'];
	$row13 = $row['13'];
	$row14 = $row['14'];
	$row15 = $row['15'];
	$row16 = $row['16'];
	}
	 


	 
 ?>
    
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador de categorias</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="../js/jquery-1.11.0.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Marketplace admin</a>
            </div>
            <!-- /.navbar-header -->

             <ul class="nav navbar-top-links navbar-right">
                
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nombre']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfíl de usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Opciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../script/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>  Cerrar sesión </a>  
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

             <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="categorias.php"><i class="fa fa-tags fa-fw"></i> Categorias</a>
                        </li>
                        <li>
                            <a href="anuncios.php"><i class="fa fa-pencil-square-o fa-fw"></i> Anuncios</a>
                           
                          
                        </li>
                        <li>
                            <a href="anunciante.php"><i class="fa fa-group fa-fw"></i> Anunciantes</a>
                        </li>
						<li>
                            <a href="usuarios.php"><i class="fa fa-group fa-fw"></i> Usuarios</a>
                        </li>
						<li>
                            <a href="newsletter.php"><i class="fa fa-envelope fa-fw "></i> Newsletter</a>
                        </li>
                        
                            </ul>
                
                         
                        
                      
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><small>Modificar categoria </small></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          <form action="../script/anuncio/editanuncio.php" method="POST">
                            <fieldset>
							<div class="col-md-6">
							 <div class="form-group">
                                    <input id="textinput" readonly="readonly" value="<?php echo $row0; ?>" name="codigo" type="text" placeholder="codigo" class="form-control input-md">
                                </div>
                                <div class="form-group">
                                    <input id="textinput" value="<?php echo $row1; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row2; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row3; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row8; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row9; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row10; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row11; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row12; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row13; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <textarea id="textinput"   name="" type="text" placeholder="" class="form-control input-md"><?php echo $row14; ?></textarea>
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row15; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
								<div class="form-group">
                                    <input id="textinput" value="<?php echo $row16; ?>" name="" type="text" placeholder="" class="form-control input-md">
                                </div>
                                 
                                
							   <br>
							   <br>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="categorias" class="btn btn-lg btn-primary btn-block">Guardar cambios</button>
								</div>
                            </fieldset>
            </form>
	 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
  </div>
      <!-- /.modal-dialog --> 
    </div>	
			 
			 
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>

