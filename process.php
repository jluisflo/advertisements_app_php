<?php
//Importa los archivos de la SDK de facebook v4
require_once 'script/facebook/app/start.php';
//consulta los anuncios segun categoria
require_once'script/conexion.php';
include 'script/fecha.php';
 
$con=conexion();


      if (isset($_SESSION['facebook'])):

            if (isset($_POST['mail'])){

             $_SESSION['codigo'] = $facebook_user->getid(); 
      		   $_SESSION['nombre'] = $facebook_user->getname();
             $_SESSION['mail'] = $_POST['mail'];

      		   $cod =  $_SESSION['codigo'];
      		   $nom =  $_SESSION['nombre'];
             $mail = $_POST['mail'];

               $query = mysqli_query($con,"INSERT INTO user_facebook (id, name, mail, registro) VALUES ('$cod', '$nom', '$mail', '$hoy')");           
               
               if ($query == true){

               	 header("location: index.php");
               	 
               }else{

               	echo "Oh no. ocurrio un error.";
               }  

          
            }

      endif;
 




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anuncios Gratis</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	  <link href="css/main.css" rel="stylesheet">
	  <link href="css/social-buttons.css" rel="stylesheet">
 

    <!-- Add custom CSS here -->
    <link href="css/marketplace.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialdesign.css"/>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jqueryvalidator/bootstrapValidator.min.css"/>
</head>
<body>

<div class="container">

<div class="row">
  <div class="col-md-6 col-md-offset-3">
   
   <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Registro via facebook</h3>
  </div>
  <div class="panel-body">
    <div class="alert alert-info" role="alert">Necesitamos que nos proporciones un correo electronico.</div>
    <form method="POST" action="process.php"> 

    <input  type="Email" class="form-control" placeholder="Correo Electronico" name="mail" required>
    <br>
    <br>
    <button type="submit" class="btn btn-default" >Registrarme</button>
    </form>
  </div>
</div>

  </div>
</div>

</div>
   
</body>
</html>
