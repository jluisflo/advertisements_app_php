<!DOCTYPE html>
 
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

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
 
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		 <form  method="post" action="reintentar_acceso.php">
			<fieldset>
			
			    <center><a href="../index.php"><img class="img-responsive" src="../img/marketplace.jpg" style ="width:150px"></a>
				<h2 class="text-center">Iniciar sesion</h2>
				
				<hr class="colorgraph">
				<div class="form-group">
                    <input  name="usuario"   class="form-control input-lg" placeholder="Correo Electronico" required autofocus>
				</div>
				<div class="form-group">
                    <input  name="contra" type="password"   class="form-control input-lg" placeholder="Contraseña" required autofocus>
				</div>
				<div class="alert alert-danger" role="alert">Correo electronico o Contraseña incorrecta, Intente otra vez. </div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Iniciar Sesion" >
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="../pages/registro.php" class="btn btn-lg btn-primary btn-block">Registrarse</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</div>

	
</body>
    
    <script src="../../js/bootstrap.js"></script>
	 
</html>