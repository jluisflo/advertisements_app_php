<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Marketplace</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
     <link href="css/login.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 
</head>

<body>
<br>
<br>
<br>
     
	
	
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Iniciar sesion</h1>
            <div class="account-wall">
                <center><img class="img-responsive"  src="../img/marketplace.jpg" style ="width:125px; padding-bottom:25px; ">
                    
                <form  class="form-signin" action="script/script_acceso_usuario.php" method="POST">
                <input type="text" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
                <input type="password" class="form-control" placeholder="Contraseña" name="contra" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Iniciar sesion</button>
                
                 
                </form>
            </div>
            
        </div>
    </div>
</div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
