<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
 
  //comprueba si existe una sesion con facebook paradeterminar las variables de sesion si en caso de haber una sesion 
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

    <title>Politica y Privacidad</title>

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
      <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
       
	

    <section class="about-us-1 light-gray-bg">
        <div class="container">
            <div class="row">
                <!-- Page Title -->
                <div data-scroll-reveal class="col-md-10 col-md-offset-1 text-center section-title">
                    <div class="page-header">
   <h1><small>Politicas y privacidad</small></h1>
</div>
                   
                    <p class="text-justify">es una colección de recursos en línea que incluyen anuncios clasificados, foros, y algunos servicios de correo electrónico. 
					Al utilizar este servicio, usted se compromete a cumplir todas las directrices publicadas y aplicables para este servicio, que 
					puedes cambiar con el paso del tiempo . Usted entiende y acepta que es el único responsable de leer de vez en cuando dichas directrices. 
					Si se opone a cualquier termino o condición de Anuncios y subastas online de cualquier manera, su única opción es dejar de utilizar el 
					servicio de all auction-sale de manera inmediata. All Auction-Sale puede enviarle notificaciones con los cambios de directrices directo 
					a su correo electrónico.</p>
                </div>
  <div data-scroll-reveal="wait .5s, enter right" class="col-md-10 col-md-offset-1 text-center section-title">
                    <h5>ANUNCIOS DESTACADOS</h5>
                      
                 <p class="text-justify">Anuncios y subastas online ofrece un servicio conocido como “anuncios destacados” por medio de paga no reembolsable para dar 
				mas vistosidad a los anuncios publicados por los usuarios y aumentar las posibilidades de venta de los productos ofrecidos.
                </div>
                <!-- Who We Are-->
                <div data-scroll-reveal class="col-md-10 col-md-offset-1 text-center section-title">
				 <h5>DESCRIPCION DEL SERVICIO Y POLITICA DE CONTENIDO</h5>
                     <p class="text-justify">Anuncios y subastas online es la nueva generación de anuncios clasificados para la compra
					y venta de productos en línea. Usted no está en la posibilidad de realizar el pago por medio del
					sitio web utilizando PayPal, Anuncios y subastas online no obliga a los usuarios a pagar con PayPal 
					ya que pueden comunicarse entre si y acordar una forma de pago. </p>
					</div>
					<div data-scroll-reveal class="col-md-10 col-md-offset-1 text-center section-title">
					 <p class="text-justify">Anuncios y subastas online no maneja pagos por medio de tarjetas de crédito para evitar cualquier molestia 
					entre los usuarios, por lo tanto no el sitio web no se hace responsable de la utilización de dichos métodos de pago.</P><br>
					</div>
                <div data-scroll-reveal class="col-md-10 col-md-offset-1 text-center section-title">
                    <p class="text-justify">Anuncios y subastas online no es responsable de los anuncios y la información de los anuncios, mensajes, 
				   comentarios entre los usuarios, al utilizar el sitio web puede estar expuesto a contenido ofensivo o engañoso. 
				   Usted conoce y acepta los riesgos de asociados a cualquier contenido del cual desconfié, de cualquier manera All 
				   Auction-Sale no se hace responsable del contenido publicado en el sitio web.</P>
                 
</div>
                <!-- Goals -->
              

                <!-- The Team -->
               
            </div>
        </div>
    </section>

 
	 
  
  
 <!-- Footer -->
	   <footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>
</body>
    
    <script src="../js/bootstrap.js"></script>
     
</html>
