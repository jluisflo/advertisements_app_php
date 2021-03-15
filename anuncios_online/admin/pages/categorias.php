<!DOCTYPE html>
 <?php
 session_start();
    include '../../script/conexion.php';	
	
		
if (!isset($_SESSION['nombre'])){

header("Location: ../index.php");

}
	
	$cn = conexion();
	$consulta = mysqli_query($cn,"SELECT * FROM categorias");
  $consulta2 = mysqli_query($cn,"SELECT * FROM secciones");
	
	 
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
    <script type="text/javascript" src="../js/paging.js"></script>
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
                    <h2 class="page-header"><small>Administrador de categorias </small></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			 
	 <div class="panel panel-primary">
               <div class="panel-heading">
                 Funciones
               </div>
	<div class="panel-body">
	  <div class="col-md-3">
		 <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#modalagrecate">Agregar categoria</button> 
     <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#modalagresec">Agregar seccion</button> 

	   </div>
	 <div class="col-md-9">
         <form class="form-group">
		 
		 <div class="pull-right">
            <input id="searchTerm" type="search" onkeyup="doSearch()" class="form-control input-lg " placeholder="Buscar">
		 </div>	
          </form>
     </div>
      
            
	</div>
	</div>
			 
			 
			 
			  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categorias registradas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="resultados">
                                    <thead>
                                        <tr>
                                            <th>Cod categoria</th>
                                            <th>Nombre de categoria</th>
                                             
											 
                                            <th>Editar</th>
											                      <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                   <tbody>
     <?php
 while ($row = mysqli_fetch_row($consulta)) 
	  {
	   echo '<tr>';
	   echo '<td >'.utf8_encode ($row['0']).'</td>';
	   echo '<td>'.utf8_encode ($row['1']).'</td>';
	    
	    
	   echo "<td><a href='modifcate.php?edit=$row[0]' class='btn btn-primary btn-xs' ><span class='glyphicon glyphicon-pencil'></span></a></td>";
       echo "<td><a href='../script/categoria/eliminarcate.php?delete=$row[0]' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-trash'></span></a></td>";
       echo '</tr>';
	  }
	 ?>
         
         
            </div>         
    </tbody>
									
                                </table>
                            </div>
		<div class="panel-heading">
          <div style="border: 0px;" id="NavPosicion"></div>
        </div>
							 </div>
							  </div>
							   </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Secciones de categorias registradas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="resultados">
                                    <thead>
                                        <tr>
                                            <th>cod seccion</th>
                                            <th>nombre de seccion</th>
                                            <th>codigo relacion-categoria</th>
                                             
                       
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                   <tbody>
     <?php
 while ($row = mysqli_fetch_row($consulta2)) 
    {
     echo '<tr>';
     echo '<td >'.utf8_encode ($row['0']).'</td>';
     echo '<td>'.utf8_encode ($row['1']).'</td>';
     echo '<td>'.utf8_encode ($row['2']).'</td>';
      
      
       echo "<td><a href='modifcate.php?edit=$row[0]' class='btn btn-primary btn-xs' ><span class='glyphicon glyphicon-pencil'></span></a></td>";
       echo "<td><a href='../script/categoria/eliminarcate.php?delete=$row[0]' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-trash'></span></a></td>";
       echo '</tr>';
    }
   ?>
         
         
            </div>         
    </tbody>
                  
                                </table>
                            </div>
    <div class="panel-heading">
          <div style="border: 0px;" id="NavPosicion"></div>
        </div>
               </div>
                </div>
                 </div>             
			 
			 <!-- /#Modal para agregar categoria --> 
<div class="modal fade" id="modalagrecate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar categoria</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
      <div class="col-md-8" >
    <form action="../script/categoria/categorias.php"  method="POST">   
	<div class="form-group">
       <label for="rg-from">Nombre para categoria: </label>
       <input type="text" id="categoria" name="categoria" class="form-control">
    </div>
	<button type="submit" name="agregar" class="btn btn-primary">Guardar datos</button>  
    </form> 	
      </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalagresec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar seccion</h4>
      </div>
      <div class="modal-body">
    <div class="row">
      <div class="col-md-8" >
    <form action="../script/categoria/seccion.php"  method="POST">   
  <div class="form-group">
       <label for="rg-from">Nombre para seccion: </label>
       <input type="text" id="categoria" name="seccion" class="form-control">
    </div>
    <div class="form-group">
       <label for="rg-from">Codigo relacion-categoria: </label>
       <input type="text" id="categoria" name="relacion" class="form-control">
    </div>
  <button type="submit" name="agregar" class="btn btn-primary">Guardar datos</button>  
    </form>   
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" name="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Eliminar categoria</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Esta seguro que desea eliminar esta categoria?</div>
       
      </div>
        <div class="modal-footer ">
        <button href="../script/categorias.php?delete=true"type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> si</button>
        <button type="button" class="btn btn-warning"class="close" data-dismiss="modal" aria-hidden="true" ><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>	
			 
			 
        <!-- /#page-wrapper -->
<script type="text/javascript">
		var pager = new Pager('resultados', 10);
		pager.init();
		pager.showPageNav('pager', 'NavPosicion');
		pager.showPage(1);
</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/doSearch.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

</body>

</html>

