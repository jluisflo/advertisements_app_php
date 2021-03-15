<?php
require_once '../script/facebook/app/start.php';
 
 
 if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acerca</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/social-buttons.css" rel="stylesheet">
	
	 <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../css/landing-page.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../css/marketplace.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
</head>
<body>
     <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
       
	  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <h2>Acerca<small></small></h2>
			<hr class="colorgraph">
               <div class="text-justify">
					<h2>ACERCA DE ANUNCIOS Y SUBASTAS ONLINE</h2>

  <p>Anuncios y subastas online es la nueva generación de anuncios online.<br>

  Anuncios y subastas online provee una solución a todas las tareas de venta, compra, discusión, organización, intercambio y encuentro con personas cerca de ti.<br>

  EnAnuncios y subastas online tu puedes:<br>
  
  <li>Diseñar tus anuncios calcificados con fotos e información del producto.</li>

  <li>Acceder al sitio web desde tu teléfono o computadora personal.</li>

</p>
                   
				</div><!-- col -->


   </div>
   
   </div>
<br>
<br>
<br>
<br>
  
  
 <!-- Footer -->
	   <footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
</body>
 
    <script src="../js/bootstrap.js"></script>
     </html>
