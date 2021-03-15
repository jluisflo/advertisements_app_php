<?php
//Importa los archivos de la SDK de facebook v4
require_once '../script/facebook/app/start.php';
 
 //comprueba si existe una sesion confacebook paradeterminar las variables de sesion si en caso de haber una sesion 
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

    <title>Conoce</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/social-buttons.css" rel="stylesheet">
	
	 

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


    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1 style="color:white;">Bienvenido a la revolucion</h1>
                        <h3 style="color:white;">Una nueva forma de comprar y vender en linea</h3>
                        <hr class="intro-divider">
                        
                    </div>

<button type="button" class="btn btn-primary btn-circle btn-xl scroll-link" data-id="1" ><i class="fa fa-shopping-cart "></i></button>
<button type="button" class="btn btn-success btn-circle btn-xl scroll-link" data-id="2"><i class="fa fa-clock-o"></i></button>
<button type="button" class="btn btn-info btn-circle btn-xl scroll-link" data-id="3"><i class="fa fa-pencil"></i></button>
<button type="button" class="btn btn-warning btn-circle btn-xl scroll-link" data-id="4"><i class="fa fa-desktop"></i></button>
<button type="button" class="btn btn-danger btn-circle btn-xl scroll-link" data-id="5"><i class="fa fa-users"></i></button>

                </div>
				
				
	 <script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
    // navigation click actions
    $('.scroll-link').on('click', function(event){
    event.preventDefault();
    var sectionID = $(this).attr("data-id");
    scrollToID('#' + sectionID, 750);
    });
    // scroll to top action
    $('.scroll-top').on('click', function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop:0}, 'slow');
    });
    // mobile nav toggle
    $('#nav-toggle').on('click', function (event) {
    event.preventDefault();
    $('#main-nav').toggleClass("open");
    });
    });
    // scroll function
    function scrollToID(id, speed){
    var offSet = 50;
    var targetOffset = $(id).offset().top - offSet;
    var mainNav = $('#main-nav');
    $('html,body').animate({scrollTop:targetOffset}, speed);
    if (mainNav.hasClass("open")) {
    mainNav.css("height", "1px").removeClass("in").addClass("collapse");
    mainNav.removeClass("open");
    }
    }
    if (typeof console === "undefined") {
    console = {
    log: function() { }
    };
    }
    </script>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	 <div class="content-section-b">

        <div class="container">

            <div class="row">
			 <div class=" col-sm-4">
                    <img class="img-responsive" src="../icons/poc.png" alt="">
                </div>
				<div id="1"></div>
                <div class=" col-sm-8">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1 class="section-heading">Donde Tu eliges</h1>
                    <p class="lead">Quieres comprar o necesitas vender, y si aun no es suficiente puedes hasta subastar lo que quieras!</p>
                </div>
               
            </div>

        </div>
        <!-- /.container -->

    </div>

    <div class="content-section-a">
<div id="2"></div>
        <div class="container">

            <div class="row">
                <div class=" col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1 class="section-heading">Todo al Instante</h1>
                        
                    <p class="lead">Compras o Vendes! todo lo podras hacer al instante.</p>
                </div>
                <div class="col-sm-6">
                    <img class="img-responsive" src="../img/versioning.png" alt="">
					 <br>
			   
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">
<div id="3"></div>
        <div class="container">

            <div class="row">
			 <div class=" col-sm-4">
                    <img class="img-responsive" src="../icons/pen.png" alt="">
                </div>
				
                <div class=" col-sm-8">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1 class="section-heading">Lo mejor en diseño integrado</h1>
                    <p class="lead">Notaras en cada una de las funciones que ofrecemos que hay un toque de creatividad</p>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br><br>
			   <br>
                </div>
               
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">
<div id="4"></div>
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1 class="section-heading">Diseñado para dispositivos de todos los tamaños </h1>
                    <p class="lead">En marketplace descubriras que el dispositivo no es una excusa para comenzar a usar la plataforma.</p>
                </div>
                <div class=" col-sm-6">
                    <img class="img-responsive" src="../img/responsive-website.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
	<div class="content-section-b">
<div id="5"></div>
        <div class="container">

            <div class="row">
			 <div class=" col-sm-4">
                    <img class="img-responsive" src="../img/social.png" alt="">
                </div>
				
                <div class=" col-sm-8">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h1>Social por Diseño</h1>
					
					<p class="lead">No existe limites para compartir lo que vendes o quieres comprar<strong></strong>.</p>
                </div>
               
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
<section class="section-divider textdivider " style="background:#B3D371;">
			<div class="container">
				<h1>Necesitas vender algo? Comienza ya!</h1>
				<a href="publicar.php"class="btn btn-default btn-outline btn-lg" >Comenzar</a>
			</div><!-- container -->
		</section>
    

   <footer>
    <?php
            include 'inc/footer.inc';
    ?>
 </footer>

    <!-- JavaScript -->
 
    <script src="../js/bootstrap.js"></script>

</body>

</html>
