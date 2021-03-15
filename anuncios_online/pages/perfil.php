<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
require '../script/conexion.php';
 $con = conexion();  
 
//verifica que consulta hara de acuerdo al tipo de sesion		  
 if (isset($_SESSION['facebook'])){
 
 $cod = $_SESSION['codigo'];

 $result = mysqli_query($con,"SELECT * FROM user_facebook WHERE id='$cod'");  
 $row = mysqli_fetch_array($result);
 $regis = $row['registro'];

$histo = mysqli_query($con,"SELECT * FROM historial WHERE cod_usu='$cod'");  
}else{ 
 $cod = $_SESSION['codigo'];
  //se envia la consulta  
 $result = mysqli_query($con,"SELECT * FROM anunciante WHERE cod_usu='$cod'");  
 $row = mysqli_fetch_row($result);
    $row0 = $row['0'];
	$row1 = $row['1'];
	$row2 = $row['2'];
	$row3 = $row['3'];
	$row4 = $row['4'];
	$row5 = $row['5'];
	
$histo = mysqli_query($con,"SELECT * FROM historial WHERE cod_usu='$cod'");  
 
	  
}
if (!isset($_SESSION['nombre'])){
  header("location: login");
  
}
 
?> 
<!DOCTYPE html>
 <html class="no-js"> 
    <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION['nombre']; ?></title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/social-buttons.css" rel="stylesheet">
 

    <!-- Add custom CSS here -->
    <link href="../css/marketplace.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
        <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="../js/paging.js"></script>
    </head>
    <body>
        

     <!-- Navigation & Logo-->
      <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>


	 <div class="section-divider2 textdivider " style="background: none repeat scroll 0% 0% #5C97BF;  ">  
	  Mi perfil
	 </div>


<center>
 <div class="alert alert-info alert-dismissible" role="alert" style="display:none; width: 50%;"  id="info">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  Cambios realizados exitosamente!
</div>
</center>

	
	<?php if (isset($_SESSION['facebook'])){ ?>	 
<div class="container">
 
<div class="container" align="center">
 <h2><img src="../img/avatar.png" style="width:100px;" class="img-circle img-responsive"> <?php echo $facebook_user->getname();  ?> </h2>
 </div>
  
<script>
 $(document).ready(function(){
var count = 0;

 count++;

if (count = 0){

$(document).ready(function(){
  $('#info').show(1000);
}); 

}
});
</script>

<div class="alert alert-info" role="alert" style="display:none;" id="info"> Cambios realizados exitosamente!</div>


<ul class="nav nav-tabs "  role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">Sobre mi</a></li>
  <li><a href="#messages" role="tab" data-toggle="tab">Anuncios vistos</a></li>
  
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">
  <br>
  <br>
  <div class="row">
  <div class="col-md-4 ">
  <div class="panel panel-info">
         <div class="panel-heading">
         <i class="fa fa-info fa-fw"></i> En marketplace
          </div>
	<div class="form-group">
    <label class="control-label">Desde: <p><?php echo  $regis;   ?></p> </label>
    </div>				
   </div>
   </div>
   <div class="col-md-4 ">
    <div class="panel panel-success">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Mi informacion
            </div>
	<div class="form-group">
    <label class="control-label">Nombre de usuario: <h4><?php echo $facebook_user->getname();  ?></h4> </label><br>
	
    </div>				
  </div>
  </div>
  </div>
  </div> 
  
  <div class="tab-pane" id="messages">
   <div class="panel panel-default">
      <div class="panel-heading">
      <a data-toggle='modal' data-target='#drop' type="button"  class="btn btn-lg btn-danger btn-sm">Eliminar historial</a>
      </div>              
      <div class='modal fade' id='drop' tabindex='-1' role='dialog' aria-labelledby='drop' aria-hidden='true'>
      <div class='modal-dialog'>
    <div class='modal-content'>
          <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
        <h4 class='modal-title custom_align text-center' id='Heading'>Advertencia</h4>
      </div>
         <div class='modal-body'>

         <div class='alert alert-danger text-center' role='alert'>¿Esta seguro que desea eliminar todo el historial de busqueda?</div>
         </div>
        <div class='modal-footer'>
        <a type='button' class='btn btn-danger btn-lg' style='width: 100%;' href="../script/deletehisto.php?cod=<?php echo $facebook_user->getid();?>"><i class='glyphicon glyphicon-ok-sign'></i> Eliminar historial</a>
      </div>
        </div>
    <!-- /.modal-content --></div>
      <!-- /.modal-dialog --> </div>
  <div class="panel-body">
  <table class="table table-striped table-bordered table-hover" id="resultados">
            <thead>
                <tr>
                <th>Busqueda realizada</th>
                <th>Fecha </th>
                <th>Ver anuncio </th>
				        </tr>
                 </thead>
            <tbody>
         <?php
 while ($field = mysqli_fetch_row($histo))
    { 
     $anun = base64_encode($field['2']);
     echo '<tr>';
     echo '<td >'.utf8_encode ($field['3']).'</td>';
     echo '<td>'.utf8_encode ($field['4']).'</td>';
     echo "<td><a href='anuncio?cod=$anun' class='btn btn-primary btn-xs' >Ver anuncio</a></td>";
     echo '</tr>';
    }
   ?>

     </tbody>
	 
	 </table>
	 <div class="panel-heading">
       <div style="border: 0px;" id="NavPosicion"></div>
     </div>
     </div>	 
     </div>
 
    </div>
    </div>
	<?php }else{ ?>
	<div class="container">
 
<div class="container" align="center">
 <h2><img src="../img/avatar.png" style="width:100px;" class="img-circle img-responsive"> <?php echo $row1." ". $row2; ?> </h2>
 </div>

<ul class="nav nav-tabs "  role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">Sobre mi</a></li>
  <li><a href="#messages" role="tab" data-toggle="tab">Anuncios vistos</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Configurar perfil</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">
  <br>
  <br>
  <div class="row">
  <div class="col-md-4 ">
  <div class="panel panel-info">
         <div class="panel-heading">
         <i class="fa fa-info fa-fw"></i> En marketplace
          </div>
	<div class="form-group">
    <label class="control-label">Desde: <p><?php echo $row5;   ?></p> </label>
    </div>				
   </div>
   </div>
   <div class="col-md-4 ">
    <div class="panel panel-success">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Mi informacion
            </div>
	<div class="form-group">
    <label class="control-label">Nombre de usuario: <h4><?php echo $row1; ?></h4> </label><br>
	<label class="control-label">Apellidos: <h4><?php echo $row2; ?></h4> </label><br>
	<label class="control-label">E-mail de registro: <h4><?php echo $row3; ?></h4> </label><br>
    </div>				
  </div>
  </div>
  </div>
  </div> 
  
  <div class="tab-pane" id="messages">
   <div class="panel panel-default">
      <div class="panel-heading">
      <a data-toggle='modal' data-target='#drop' type="button"  class="btn btn-lg btn-danger btn-sm">Eliminar historial</a>
      </div> 

      <div class='modal fade' id='drop' tabindex='-1' role='dialog' aria-labelledby='drop' aria-hidden='true'>
      <div class='modal-dialog'>
    <div class='modal-content'>
          <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
        <h4 class='modal-title custom_align text-center' id='Heading'>Advertencia</h4>
      </div>
         <div class='modal-body'>

         <div class='alert alert-danger text-center' role='alert'>¿Esta seguro que desea eliminar todo el historial de busqueda?</div>
         <h5> Tenga en cuenta que al eliminar el historial, no podra recuperar los datos!</h5>
         </div>
        <div class='modal-footer'>
        <a type='button' class='btn btn-danger btn-lg' style='width: 100%;' href="../script/deletehisto.php?cod=<?php echo $row0;?>"><i class='glyphicon glyphicon-ok-sign'></i> Eliminar historial</a>
      </div>
        </div>
    <!-- /.modal-content --></div>
      <!-- /.modal-dialog --> </div>               
   <div class="panel-body">
   
  <table class="table table-striped table-bordered table-hover" id="resultados">
            <thead>
                <tr>
                <th>Busqueda realizada</th>
                <th>Fecha </th>
                <th>Ver anuncio </th>
				</tr>
                 </thead>
            <tbody>
     <?php
 while ($field = mysqli_fetch_row($histo)) 
	  {
      $anun = base64_encode($field['2']);
	   echo '<tr>';
     echo '<td >'.utf8_encode ($field['3']).'</td>';
     echo '<td>'.utf8_encode ($field['4']).'</td>';
     echo "<td><a href='anuncio?cod=$anun' class='btn btn-primary btn-xs' >Ver anuncio</a></td>";
     echo '</tr>';
	  }
	 ?>
     </tbody>
	 
	 </table>
	 <div class="panel-heading">
       <div style="border: 0px;" id="NavPosicion"></div>
     </div>
     </div>	 
     </div>
 
    </div>
 <div class="tab-pane" id="settings">
  <form action="script/anunciantemodi.php" method="POST">
                            <fieldset>
							<div class="col-md-6">
							<br>
							<br>
							 <input style="display:none;"id="textinput" readonly="readonly" value="<?php echo $row0; ?>" name="codigo" type="text" placeholder="codigo" class="form-control input-md">
                                <div class="form-group">
								<label class="control-label">Nombre de usuario: </label>
                                    <input id="textinput" value="<?php echo $row1; ?>" name="nombre" type="text" placeholder="Nuevo nombre " class="form-control input-md">
                                </div>
								<div class="form-group">
								<label class="control-label">Apellido de usuario: </label>
                                    <input id="textinput" value="<?php echo $row2; ?>" name="apellido" type="text" placeholder="Nuevo apellido" class="form-control input-md">
                                </div>
								<div class="form-group">
								<label class="control-label">Email de usuario: </label>
                                    <input id="textinput" value="<?php echo $row3; ?>" name="mail" type="text" placeholder="Nuevo E-mail" class="form-control input-md">
                                </div>
								<div class="form-group">
								<label class="control-label">Contraseña de usuario: </label>
                                    <input id="textinput" value="<?php echo $row4; ?>" type="password" name="contraseña" type="text" placeholder="Nueva contraseña" class="form-control input-md">
                                </div>
								 </div>
								 <br>
							   <br>
							   <div class="col-md-4">
							   <br>
							   <br>
							   <br>
							   <br>
							   <br>
							   <br>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="modificar"  class="btn btn-lg btn-primary btn-block">Guardar cambios</button>
								</div>
                            </fieldset>
            </form>
	</div>
    </div>
    </div>
	<?php } ?>
<br>
<br>
<br>
<br>
<br>
 
<script type="text/javascript">
		var pager = new Pager('resultados', 10);
		pager.init();
		pager.showPageNav('pager', 'NavPosicion');
		pager.showPage(1);
</script>	
 
    
    <script src="../js/bootstrap.js"></script>
 
<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
    </body>
</html>





