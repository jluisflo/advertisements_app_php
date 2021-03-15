<!DOCTYPE html>

<?php
require_once '../script/facebook/app/start.php';
if (isset($_SESSION['nombre'])){

  Echo '<script language="JavaScript" type="text/javascript">alert("Hay una sesion activa"); window.location="../pages/perfil.php";</script>"';
  
}




?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
	<link href="../css/social-buttons.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../css/marketplace.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
  

    
	
	
</head>
<body>
<?php

include 'inc/nabvar.inc';

?>
<div class="container">
    <h2 class="text-center" style="margin-bottom:5%; margin-top:1%;">Iniciar Sesion</h2>
      <div class="row">
         <div class="col-md-10 col-md-offset-1">

         <div class="col-md-5" style="padding-top:10%; padding-bottom:10%;">
           
            <div class="text-center">
            <a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>" class="btn btn-stackexchange btn-lg btn-block"><i class="fa fa-facebook"></i> Iniciar sesion con facebook</a>
            </div>
           
         </div>
         <div class="col-md-1">
          <div class="visible-md visible-lg" style="width:1px; background: #ecf0f1; height:300px;"></div>
         </div>
         <hr class="visible-xs">
         <div class="col-md-6">
            
		 <form  method="post" action="../script/reintentar_acceso.php">
			 
			
				<div class="form-group">
                    <input  name="usuario" class="form-control input-lg" placeholder="Correo Electronico" required autofocus>
				</div>
				<hr>
				<div class="form-group">
                    <input  name="contra" type="password"   class="form-control input-lg" placeholder="Contraseña" required autofocus>
				</div>
				 
	 
				<div class="row">
					 
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar Sesion <i class="fa fa-sign-in"></i></button>
					 
				</div>
			 
		</form>
        
         </div>
          
         </div>
      </div>
</div>


	<footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
</body>
    
    <script src="../js/bootstrap.js"></script>
	 
</html>