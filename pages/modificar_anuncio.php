<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
 
  //comprueba si existe una sesion con facebook paradeterminar las variables de sesion si en caso de haber una sesion 
 if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
$codigo=$_GET['cod'];

//incluye la conexion 
include'../script/conexion.php';
$cn = conexion();
    
//realiza la consulta	
$consulta = mysqli_query($cn,"SELECT * FROM anuncio WHERE cod_anun=$codigo");

 	if (mysqli_num_rows($consulta)!=0){
	($filas = mysqli_fetch_array($consulta));
	}else{
	echo"<h1>Error del servidor</h1>";
	}
	

	 ?>	 

<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>modificar: <?php echo $filas['1']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet"> 
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/social-buttons.css" rel="stylesheet">
	
    <!-- Add custom CSS here -->
    <link href="../css/marketplace.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
	<link href="../css/gh-fork-ribbon.css" rel="stylesheet">
	
    <!-- BootstrapValidator CSS -->
    <link rel="stylesheet" href="../css/jqueryvalidator/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
  

    <!-- BootstrapValidator JS -->
    <script type="text/javascript" src="../js/jqueryvalidator/bootstrapValidator.min.js"></script>
	
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->
<script>
$(document).ready(function(){

  $("#enviarmail").click(function(){

  	$("#myDiv").show();//muestra el div

    m=$("#mensaje").val();
	n=$("#nombre").val();
	e=$("#email").val();
	t=$("#telefono").val();
    
	
    $.ajax({url:"script/enviomail.php",cache:false,type:"POST",data:{mensaje:m, name:n, mail:e, telefo:t },success:function(result){
      $("#myDiv").html();
    }});


   });


  $("#myDiv").click(function(){

  	$("#myDiv").hide(1000);//oculta el div cuando se hace clic sobre el mismo	
  });
});

</script>
	
	
	
	
	
</head>
<body>

      <!-- Navigation & Logo-->
       <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
   
	<div class="section">
	    	<div class="container">
	    		<div class="row">
	    			<!-- enlace para zoom -->

<script src="../js/elevatezoom/jquery.elevatezoom.js"></script>

	    			<div class="col-sm-6">
	    			
					<div class="github-fork-ribbon-wrapper left">
                      <div class="github-fork-ribbon">
                         <a>$ <strong><?php echo ($filas['precio_anun']); ?></strong></a>
                      </div>
                    </div>
	    				<div class="product-image-large">
	    					<img id="zoom_01" src="<?php echo "script/imagen.php?id=$filas[cod_anun]"?>" >
	    				</div>
						
 				 
 
						
	    			</div>
	    			<!-- End Product Image & Available Colors -->
	    			<!-- Product Summary & Options -->
	    			<div class="col-sm-6 product-details ">
					<legend> Modificar detalles de anuncio! </legend>
					    <form action="../script/editanuncio.php" method="POST">
	    				<input style="display:none;" type="text" name="codigo" class="form-control" value="<?php echo ($filas['cod_anun']); ?> " id="inputSuccess1">
	    				<div class="form-group">
                        <label class="control-label" for="inputinfo1"> titulo del anuncio: </label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo ($filas['titulo_anun']); ?> " id="inputSuccess1">
                        </div>
						<div class="form-group">
                        <label class="control-label" for="inputSuccess1">Nombre del Anunciante:  </label>
                        <input type="text"  name="anunciante" class="form-control" value="<?php  echo ($filas['nombre_anun']); ?>" id="inputSuccess1">
                        </div>
						<div class="form-group">
                        <label class="control-label" for="inputSuccess1">telefono:  </label>
                        <input type="text"  name="telefono" class="form-control" value="<?php  echo ($filas['tel_anun']); ?>" id="inputSuccess1">
                        </div>
						<div class="form-group">
                        <label class="control-label" for="inputSuccess1"> E-mail: </label>
                        <input type="text"  name="mail" class="form-control" value="<?php  echo ($filas['mail_anun']); ?>" id="inputSuccess1">
                        </div>
						<div class="form-group">
                        <label class="control-label" for="inputSuccess1">Precio:  </label>
                        <input type="text"  name="precio" class="form-control" value="<?php  echo ($filas['precio_anun']); ?>" id="inputSuccess1">
                        </div>
                        <div class="form-group">
                        <label class="control-label" for="inputSuccess1">Descripcion:  </label>
                        <textarea id="textinput" name="descripcion" type="text" placeholder="" class="form-control input-md"><?php echo ($filas['descrip_anun']); ?></textarea>
                        </div>
	    			<!-- End Product Summary & Options -->
	 
	    	
				        <button type="submit" name="modificar"  class="btn btn-lg btn-primary btn-block">Guardar cambios</button>
				        </form>
				
		           </div>
    
 


    
    <script src="../js/bootstrap.js"></script>
    <script src="../js/modern-business.js"></script>
<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
</body>

</html>