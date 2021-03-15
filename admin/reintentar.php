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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Reintentar</h3>
                    </div>
                    <div class="panel-body">
					<div class="alert alert-danger" role="alert">Usuario o Contaseña incorrecta, Intente otra vez </div>
                       <form action="script/script_acceso_usuario.php" method="POST">
                            <fieldset>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Nombre de Usuario" name="usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contaseña" name="contra" type="password" value="">
                                </div>
                               <a href="#">Olvido su contaseña</a>
							   <br>
							   <br>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar sesion">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    <script src="../../js/bootstrap.js"></script>
	 
</html>