<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
 require '../script/conexion.php';
 
  //comprueba si existe una sesion con facebook paradeterminar las variables de sesion si en caso de haber una sesion 
 if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
		 
	//verifica si hay una sesion local	 
 if (isset($_SESSION['codigo'])){	  
 $cod = $_SESSION['codigo'];
 $con = conexion();  
  //se envia la consulta  
 $request = "cod_anun, titulo_anun, precio_anun, ubicacion, fecha_anun, hora_anun";
 $result = mysqli_query($con,"SELECT $request FROM anuncio WHERE cod_usu='$cod' Limit 0, 9");  
 
}else{
  Echo '<script language="JavaScript" type="text/javascript">alert("Debe iniciar sesion para visualizar esta seccion");window.location="login.php";</script>"';
}
  
 
 
 
  
   
?> 
<!DOCTYPE html>
 <html> 
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mis anuncios</title>

        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/marketplace.css">
		<link rel="stylesheet" href="../css/main.css">
		<link href="../css/social-buttons.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>

    </head>
    <body>
        

     <!-- Navigation & Logo-->
      <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>

 	

	<div class="section-divider2" style="background: none repeat scroll 0% 0% #2980b9;  ">
			
				Mis anuncios
    </div>	
	
<div class="container">
<div id="products" class="row list-group">

<?php
if (isset($_SESSION['codigo'])){	 
		if (mysqli_num_rows($result) > 0){
		
		while ($row = mysqli_fetch_row($result)){ 
		echo "<div class='col-md-4'>
				 <div class='thumbnail'>
					<img style='width:100%;height:150px'; class='group list-group-image' src='script/imagen.php?id=$row[0]' alt='' />
					<div class='caption'>
					   
						<p class='group inner list-group-item-text'>
							  $row[1]</p>
						   <div class='row'>
						   <div class='col-xs-6 col-md-7'>
							<h5><i style='color:gray;'class='glyphicon glyphicon-calendar'></i> <span>$row[4]</span></h5>
							<h5><i style='color:gray;'class='glyphicon glyphicon-time'></i> <span>$row[5]</span></h5>
						   </div>
							<div class='col-xs-6 col-md-5 '>

							    <a style='width:145px;' class='btn btn-primary pull-right' href='modificar_anuncio.php?cod=$row[0]'><i class='glyphicon glyphicon-pencil'></i> Editar anuncio</a>
								<br>
								<br>
								 
								<button style='width:145px;' class='btn btn-default pull-right' data-title='drop' data-toggle='modal' data-target='#drop' data-placement='top' rel='tooltip'><i class='glyphicon glyphicon-trash'></i> Eliminar anuncio</button>
								 
							</div>
						</div>
					</div>
				</div>
			</div>

      <div class='modal fade' id='drop' tabindex='-1' role='dialog' aria-labelledby='drop' aria-hidden='true'>
      <div class='modal-dialog'>
    <div class='modal-content'>
          <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
        <h4 class='modal-title custom_align text-center' id='Heading'>Advertencia</h4>
      </div>
         <div class='modal-body'>

         <div class='alert alert-danger text-center' role='alert'>¿Esta seguro que desea eliminar este anuncio?</div>
         </div>
        <div class='modal-footer'>
        <a type='button' class='btn btn-danger btn-lg' style='width: 100%;' href='../script/eliminaranuncio.php?cod=$row[0]'><i class='glyphicon glyphicon-ok-sign'></i> Eliminar anuncio</a>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
		";
        }
		
		}else{
		echo "<div class='page-header text-center' style='font-size:30px;'><p><strong style='color:#0080FF; font-size:45px;'> :( </strong>
                      <small>Oh no! Aún no tienes anuncios publicados</small></p></div>";
		echo "<br>";
		echo "<br>";
		echo '<center><a href="publicar" style="width:50%;" type="button" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> Publica un anuncio!</a></center>';
		}
 } 
 
	?>
		

</div>
    
    <?php if (mysqli_num_rows($result) > 0)  { ?>
    <div class="row"> 
            <div class='col-md-6 col-md-offset-3'>  
            <div id="loadmoreajaxloader" style="display:none;"><center><img src="../img/ajax-loader.gif" /></center></div>
            <h3 id="txtajax" class="text-center alert alert-info" style="display:none;">No hay mas anuncios</h3>
            </div>
            <div class="col-md-12">
            <center><h3 id="btnajax" class="btn btn-default btn-lg btn-block" style="border-radius:0;">Ver mas anuncios</h3><center>
              <br>
              <br>
            </div>  
    </div>
    <?php } ?>
</div>

	<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    var load = 0;
    

    $( "#btnajax" ).click(function() { 

 

        $('div#loadmoreajaxloader').show();
           
         load++;
         
        $.ajax({
        type:"POST",
        url: 'script/anuncios.php',
        data:{load:load},
        success: function(html)
        {
            if(html)
            {
                 
                $("#products").append(html);
                $("div#loadmoreajaxloader").hide();
            }else
            {
                $('div#loadmoreajaxloader').hide();
                $('#txtajax').show();
            }
        }
        });

        }); 

      
    });
 </script>
	    
        
		
 
    
    <script src="../js/bootstrap.js"></script>
 <div>
<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
 </div>
    </body>
</html>
