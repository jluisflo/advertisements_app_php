<!DOCTYPE html>
<?php 
//Importa los archivos de la SDK de facebook v4
require_once 'script/facebook/app/start.php';
//consulta los anuncios segun categoria
require_once'script/conexion.php';
include 'script/fecha.php';
 
$con=conexion();

 

      //comprueba si exite una sesion con facebook
      if (isset($_SESSION['facebook'])):

             $_SESSION['codigo'] = $facebook_user->getid(); 
      		   $_SESSION['nombre'] = $facebook_user->getname();

      		   $cod =  $_SESSION['codigo'];
      		   $nom =  $_SESSION['nombre'];
      		   
        		 $query = mysqli_query($con,"SELECT * from user_facebook where id = '$cod'");
        		 $rows = mysqli_num_rows($query); 
      		  
          		  if ($rows == 0 ) :
          		 
          		    header("location: process.php");
          		 
          		  else:
          		  
          		    mysqli_query($con,"UPDATE  user_facebook SET (id='$cod', name='$nom') WHERE  id = '$cod'");
          		   
          		  endif;

      endif;
      
      $request = "cod_anun, titulo_anun, foto1, precio_anun, fecha_anun";

      $consul = mysqli_query($con,"SELECT $request FROM anuncio order by cod_anun desc LIMIT 0 , 20 ");

?>

<html lang="en">

<head>
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

    <!-- js prioritario-->
	  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jqueryvalidator/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
   
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


</head>
<body>
  
  <!-- Navigation & Logo-->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">

  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">

     <div id="nav-header-search">
     <a id="brand1" class="navbar-brand" href="index.php">
      
     Instanun

     </a>



      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
           

      <button id="btn-search-nav" type="button" class="navbar-toggle">
        
       <span><i class="glyphicon glyphicon-search" style="color:#0084B4;"></i></span>
     </button>

     </div>
    
    <div id="navbar-input-search" style="display:none;">
    <div class="container">
     <form class="navbar-form" role="search" method="GET" action="pages/busqueda">
        <div class="input-group">
            <input  type="text" class="form-control" placeholder="Buscar" name="b">
            <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            <button id="navbar-input-close" class="btn btn-default" type="button" style="margin-left:3px;"><i class="fa fa-close"></i></button>
            </div>
        </div>
     </form>
     </div>
    </div> 

  </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <div class="col-sm-5 col-md-5 hidden-xs">
        <form class="navbar-form" role="search" method="GET" action="pages/busqueda">
        <div class="input-group">
            <input  type="text" class="form-control" placeholder="¿Que necesitas hoy?" name="b">
            <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
	
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
		
			<li class="active-li"><a href="pages/publicar"><i class='fa fa-edit fa-fw '></i> Publicar anuncio</a></li>
			<?php
		    if (!isset($_SESSION['nombre'])){
		    ?>
		   	
			<li><a href="#" class="hidden-xs" data-toggle="modal" data-target="#lightbox" > Iniciar sesion </a></li>
			<li><a href="pages/login" class="visible-xs"> Iniciar sesion </a></li>
            
            <?php
            }else{
            ?>	
              <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               hola, <?php echo $_SESSION['nombre']; ?>
		      <i class='fa fa-angle-down'></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
			  <li><a href="pages/perfil"><i class="fa fa-user fa-fw color-blue"></i> Mi perfil</a>
			  <li><a href="pages/publicados"><i class="fa fa-check-square-o fa-fw color-blue"></i> Administrar mis anuncios</a>
               
              <li><a href="script/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesion</a>
              </li>
              </ul>
              </li>
			<?php
			}
			?>
			
			</ul>
			</ul>
		
    </div>
    </div>
	</nav>

	

	<div class="modal fade" id="lightbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">

      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
       <h4 class="modal-title text-center" id="myModalLabel">Iniciar Sesion</h4>
      </div>

      <div class="modal-body"> 

	  <div class="row"> 
      <div class="col-md-6">
      <form action="script/script_acceso_usuario.php" method="POST">
      <div class="form-group">
        <input  class="form-control" type="email" name="usuario" id="myusername" placeholder="Correo Electronico"  style="width:100%;" required autofocus>
      </div>
      <div class="form-group">  
        <input name="contra" id="mypassword" class="form-control" placeholder="Contraseña" type="password" style="width:100%;" required>	  
      </div>
        <input name="submit" type="submit" class="btn btn-primary btn-outline" value="Iniciar sesion"></input>
		<button type="button" class="close hidden"  value="Iniciar sesion" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	  </form>
      </div>
    <div class="col-md-6">
	  <div class="form-group">
	  <br>
	  <div class="text-center">
      <a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>"class="btn btn-stackexchange btn-lg"><i class="fa fa-facebook"></i> Conectate con facebook</a>
	  </div>
	  </div>			
	  </div>
    </div>



      <p class="text-center">Eres nuevo aqui? <span><a href="pages/registro">Registrate</a></span> </p>
      <button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
      </div>
      </div>
      </div>
      </div>
  <br>
  <br>    
 
  <div id="" class="container">	 
     
 
  <div class="row">
  <div class="col-md-6">
  <div class="img-padd">
     
  <img src="img/dibujo.svg" class="img-responsive visible-lg visible-md fade-in one">
  </div>
  </div>
  <div class="col-md-6">
  <div class="padd">
   <h1 class="text-center">Tus anuncios al instante y gratis </h1> 
   <div class="padd-button text-center"> 
   <a href="pages/publicar" class="btn btn-primary btn-lg"> Publicar anuncio</a>
   <a href="pages/conoce" class="btn btn-default btn-lg btn-outline"> Conocer mas</a>
   </div>
  </div>
  </div>
  </div>
  <br>
  <br>
   
   <hr style="width:100%;">


 
  <div id="tags">

  <a href="#" class="scroll-link" data-id="tags" style="text-decoration:none; " >
      <h3 class="text-center"> <i class="fa fa-tags"></i> anuncios en estas categorias</h3>
      <br>
  </a>
<div class="hidden-xs">
  <div class="col-md-6">
        
           <div class="blockquote-box blockquote-primary clearfix ">
              <a href="pages/cat?c=Smarthphones-Tablets" class="">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-phone glyphicon-lg box-team wow bounceInDown" data-wow-delay="0.1s"></span>
                </div>
              </a>
                <a href="pages/cat?c=Smarthphones-Tablets"><h4>Smarthphones-Tablets</h4></a>
                <ul>
                <a href="pages/cat?c=Smarthphones-Tablets&s=smartphones"><li>smartphones</li></a>
                <a href="pages/cat?c=Smarthphones-Tablets&s=Tablets"> <li>Tablets</li></a>
                <a href="pages/cat?c=Smarthphones-Tablets&s=Accesorios"><li>Accesorios</li></a>
                </ul>
        
        
            </div>
      

       
            <div class="blockquote-box blockquote-amethy clearfix">
              <a href="pages/cat?c=Electronicos">
                <div class="square pull-left">
                    <span class="fa fa-desktop fa-3x"></span>
                </div>
              </a> 
                <a href="pages/cat?c=Electronicos"><h4>Electronicos</h4></a>

                <ul>
                <a href="pages/cat?c=Electronicos&s=Computadoras"><li>Computadoras</li></a>
                <a href="pages/cat?c=Electronicos&s=Audio-video"><li>Audio-video</li></a>
                <a href="pages/cat?c=Electronicos&s=Videojuegos"><li>Videojuegos</li></a>
                <a href="pages/cat?c=Electronicos&s=Partes"><li>Partes</li></a>
                </ul>
               
            </div>
      
            <div class="blockquote-box blockquote-success clearfix">
                <a href="pages/cat?c=Vehiculos">
                <div class="square pull-left">
                    <span class="fa fa-car fa-3x"></span>
                </div>
                </a>
                <a href="pages/cat?c=Vehiculos"><h4>Vehiculos</h4></a>
                <ul>
                <a href="pages/cat?c=Vehiculos&s=Automoviles"><li>Automoviles</li></a>
                <a href="pages/cat?c=Vehiculos&s=Camiones"><li>Camiones</li></a>
                <a href="pages/cat?c=Vehiculos&s=Motos"><li>Motos</li></a>
                <a href="pages/cat?c=Vehiculos&s=Repuestos"><li>Repuestos</li></a>
                <a href="pages/cat?c=Vehiculos&s=otros"><li>+vehiculos</li></a>
                </ul>
               
            </div>
     
        
            <div class="blockquote-box blockquote-info clearfix">
              <a href="pages/cat?c=Hogar-jardin"> 
                <div class="square pull-left">
                    <span class="fa fa-tree fa-3x"></span>
                </div>
              </a>  
                <a href="pages/cat?c=Hogar-jardin"><h4>Hogar-jardin</h4></a>
                <ul>
                <a href="pages/cat?c=Hogar-jardin&s=Muebles"><li>Muebles</li></a>
                <a href="pages/cat?c=Hogar-jardin&s=Jardineria"><li>Jardineria</li></a>
                <a href="pages/cat?c=Hogar-jardin&s=Accesorios"><li>Herramientas</li></a>
                </ul>
            </div>
      
      
            <div class="blockquote-box blockquote-indigo clearfix">
              <a href="pages/cat?c=Inmobiliario">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-home glyphicon-lg"></span>
                </div>
              </a>  
                <a href="pages/cat?c=Inmobiliario"><h4>Inmobiliario</h4></a>
                <ul>
                <a href="pages/cat?c=Inmobiliario&s=Casas"><li>Casas</li></a>
                <a href="pages/cat?c=Inmobiliario&s=Apartamentos"><li>Apartamentos</li></a>
                <a href="pages/cat?c=Inmobiliario&s=Terrenos"><li>Terrenos</li></a>
                <a href="pages/cat?c=Inmobiliario&s=Oficinas"><li>Oficinas</li></a>
                <a href="pages/cat?c=Inmobiliario&s=Otros"><li>+inmobiliarios</li></a>
                </ul>
                
            </div>
      
      
      </div>
      
        <div class="col-md-6">
            <div class="blockquote-box blockquote-warning clearfix">
              <a href="pages/cat?c=Moda-belleza">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-user glyphicon-lg"></span>
                </div>
              </a>  
                <a href="pages/cat?c=Moda-belleza"><h4>Moda-belleza</h4></a>
                <ul>
                <a href="pages/cat?c=Moda-belleza&s=Ropa"><li>Ropa</li></a>
                <a href="pages/cat?c=Moda-belleza&s=Calzado"><li>Calzado</li></a>
                <a href="pages/cat?c=Moda-belleza&s=Joyas"><li>Joyas</li></a>
                <a href="pages/cat?c=Moda-belleza&s=Accesorios"><li>Accesorios</li></a>
                 
                </ul>
            </div>
      
      
       
            <div class="blockquote-box blockquote-danger clearfix">
              <a href="pages/cat?c=coleccionables">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-star glyphicon-lg"></span>
                </div>
              </a>  
                <a href="pages/cat?c=coleccionables"><h4>Coleccionables</h4></a>
                <ul>
                <a href="pages/cat?c=coleccionables&s=Libros"><li>Libros</li></a>
                <a href="pages/cat?c=coleccionables&s=Arte"><li>Arte</li></a>
                <a href="pages/cat?c=coleccionables&s=Otros"><li>+coleccionables</li></a>
                </ul>
            </div>
       
      
      
             <div class="blockquote-box blockquote-sun clearfix"> 
              <a href="pages/cat?c=Animales-Mascotas">
                <div class="square pull-left">
                    <span class="fa fa-paw  fa-3x"></span>
                </div>
              </a>  
                <a href="pages/cat?c=Animales-Mascotas"><h4>Animales-Mascotas</h4></a>
                <ul>
                <a href="pages/cat?c=Animales-Mascotas&s=Perros"><li>Perros</li></a>
                <a href="pages/cat?c=Animales-Mascotas&s=Gatos"><li>Gatos</li></a>
                <a href="pages/cat?c=Animales-Mascotas&s=Otros"><li>+Animales-Mascotas</li></a>
                </ul>
                </div>
           
      
       
            <div class="blockquote-box blockquote-silver clearfix">
                <a href="pages/cat?c=Servicios">
                <div class="square pull-left">
                    <span class="fa fa-wrench fa-3x"></span>
                </div>
                </a>
                <a href="pages/cat?c=Servicios"><h4>Servicios</h4></a>
                <ul>
                <a href="pages/cat?c=Servicios&s=Restaurantes"><li>Restaurantes</li></a>
                <a href="pages/cat?c=Servicios&s=Construccion"><li>Construccion</li></a>
                <a href="pages/cat?c=Servicios&s=Informatica"><li>Informatica</li></a>
                <a href="pages/cat?c=Servicios&s=Belleza"><li>Belleza</li></a>
                <a href="pages/cat?c=Servicios&s=Salud-medicina"><li>Salud-medicina</li></a>
                <a href="pages/cat?c=Servicios&s=Eventos"><li>Eventos</li></a>
                <a href="pages/cat?c=Servicios&s=Eroticos"><li>Eroticos</li></a>
                </ul>
                
            </div>
    
      
            <div class="blockquote-box blockquote-teel clearfix">
                <a href="pages/cat?c=Empleo">
                <div class="square pull-left">
                    <span class="fa fa-briefcase fa-3x"></span>
                </div>
                </a>

                <a href="pages/cat?c=Empleo"><h4>Empleo</h4></a>
                <ul>
                <a href="pages/cat?c=Empleo&s=Administracion"><li>Administracion</li></a>
                <a href="pages/cat?c=Empleo&s=Medicina"><li>Medicina</li></a>
                <a href="pages/cat?c=Empleo&s=Educacion"><li>Educacion</li></a>
                <a href="pages/cat?c=Empleo&s=Secretaria"><li>Secretaria</li></a>
                <a href="pages/cat?c=Empleo&s=Temporal"><li>Temporal</li></a>
                <a href="pages/cat?c=Empleo&s=Otros"><li>+empleos</li></a>
                </ul>
                
            </div>
     

        </div>
    </div>
  </div>  
<div class="visible-xs">
 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel Blue">
    <div class="panel-heading" role="tab" id="headingone">
      <h3 class="panel-title">
        <a class="collapsed list-full list-full" data-toggle="collapse" data-parent="#accordion" href="#collapseone" aria-expanded="false" aria-controls="collapseone">
          Smarthphones-Tablets
        </a>  
      </h3>
    </div>
    <div id="collapseone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
      <div class="panel-body">
      <div class="cate-list">
         <a href="pages/cat?c=Smarthphones-Tablets"><li>Smarthphones-Tablets <span class="glyphicon glyphicon-phone"></span></li></a>
         <a href="pages/cat?c=Smarthphones-Tablets&s=smartphones"><li>smartphones</li></a>
         <a href="pages/cat?c=Smarthphones-Tablets&s=Tablets"> <li>Tablets</li></a>
         <a href="pages/cat?c=Smarthphones-Tablets&s=Accesorios"><li>Accesorios</li></a>
       </div>  
      </div>
    </div>
  </div>
  <div class="panel DeepPurple">
    <div class="panel-heading" role="tab" id="head2">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="2">
          Electronicos
        </a>
      </h3>
    </div>
    <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head2">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Electronicos"><li>Electronicos <span class="fa fa-desktciop"></span></li></a>
        <a href="pages/cat?c=Electronicos&s=Computadoras"><li>Computadoras</li></a>
        <a href="pages/cat?c=Electronicos&s=Audio-video"><li>Audio-video</li></a>
        <a href="pages/cat?c=Electronicos&s=Videojuegos"><li>Videojuegos</li></a>
        <a href="pages/cat?c=Electronicos&s=Partes"><li>Partes</li></a>
       </div>          
         
      </div>
    </div>
  </div>
    <div class="panel LightGreen">
    <div class="panel-heading" role="tab" id="head11">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#11" aria-expanded="false" aria-controls="11">
         Vehiculos
        </a>
      </h3>
    </div>
    <div id="11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head11">
      <div class="panel-body">
      <div class="cate-list">
       <a href="pages/cat?c=Vehiculos"><li>Vehiculos <span class="fa fa-car"></span></li></a>
       <a href="pages/cat?c=Vehiculos&s=Automoviles"><li>Automoviles</li></a>
       <a href="pages/cat?c=Vehiculos&s=Camiones"><li>Camiones</li></a>
       <a href="pages/cat?c=Vehiculos&s=Motos"><li>Motos</li></a>
       <a href="pages/cat?c=Vehiculos&s=Repuestos"><li>Repuestos</li></a>
       <a href="pages/cat?c=Vehiculos&s=otros"><li>+vehiculos</li></a> 
       </div>  
      </div>
    </div>
  </div>
    <div class="panel Cyan">
    <div class="panel-heading" role="tab" id="head3">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#3" aria-expanded="false" aria-controls="3">
         Hogar-jardin
         </a>
      </h3>
    </div>
    <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head3">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Hogar-jardin"><li>Hogar-jardin <span class="fa fa-tree"></span></li></a>
        <a href="pages/cat?c=Hogar-jardin&s=Muebles"><li>Muebles</li></a>
        <a href="pages/cat?c=Hogar-jardin&s=Jardineria"><li>Jardineria</li></a>
        <a href="pages/cat?c=Hogar-jardin&s=Accesorios"><li>Herramientas</li></a>
       </div> 
      </div>
    </div>
  </div>
    <div class="panel Indigo">
    <div class="panel-heading" role="tab" id="head4">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#4" aria-expanded="false" aria-controls="4">
         Inmobiliario
        </a>
      </h3>
    </div>
    <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head4">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Inmobiliario"><li>Inmobiliario <span class=" glyphicon  glyphicon-home"></span></li></a>
        <a href="pages/cat?c=Inmobiliario&s=Casas"><li>Casas</li></a>
        <a href="pages/cat?c=Inmobiliario&s=Apartamentos"><li>Apartamentos</li></a>
        <a href="pages/cat?c=Inmobiliario&s=Terrenos"><li>Terrenos</li></a>
        <a href="pages/cat?c=Inmobiliario&s=Oficinas"><li>Oficinas</li></a>
        <a href="pages/cat?c=Inmobiliario&s=Otros"><li>+inmobiliarios</li></a>
      </div> 
      </div>
    </div>
  </div>
    <div class="panel Orange">
    <div class="panel-heading" role="tab" id="head5">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
         Moda-belleza
        </a>
      </h3>
    </div>
    <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head5">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Moda-belleza"><li>Moda-belleza <span class="glyphicon glyphicon-user"></span></li></a>
        <a href="pages/cat?c=Moda-belleza&s=Ropa"><li>Ropa</li></a>
        <a href="pages/cat?c=Moda-belleza&s=Calzado"><li>Calzado</li></a>
        <a href="pages/cat?c=Moda-belleza&s=Joyas"><li>Joyas</li></a>
        <a href="pages/cat?c=Moda-belleza&s=Accesorios"><li>Accesorios</li></a>
      </div>
      </div>
    </div>
  </div>
    <div class="panel Red">
    <div class="panel-heading" role="tab" id="head6">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#6" aria-expanded="false" aria-controls="6">
         Coleccionables
        </a>
      </h3>
    </div>
    <div id="6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head6">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=coleccionables"><li>Coleccionables <span class="glyphicon  glyphicon-star"></span></li></a>
        <a href="pages/cat?c=coleccionables&s=Libros"><li>Libros</li></a>
       <a href="pages/cat?c=coleccionables&s=Arte"><li>Arte</li></a>
       <a href="pages/cat?c=coleccionables&s=Otros"><li>+coleccionables</li></a>
      </div>   
      </div>
    </div>
  </div>
    <div class="panel Amber">
    <div class="panel-heading" role="tab" id="head7">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#7" aria-expanded="false" aria-controls="7">
         Animales-Mascotas
        </a>
      </h3>
    </div>
    <div id="7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head7">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Animales-Mascotas"><li>Animales-Mascotas <span class="fa fa-paw"></span></li></a>
        <a href="pages/cat?c=Animales-Mascotas&s=Perros"><li>Perros</li></a>
        <a href="pages/cat?c=Animales-Mascotas&s=Gatos"><li>Gatos</li></a>
        <a href="pages/cat?c=Animales-Mascotas&s=Otros"><li>+Animales-Mascotas</li></a>
      </div>
      </div>
    </div>
  </div>
    <div class="panel Blue-Grey">
    <div class="panel-heading" role="tab" id="head8">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#8" aria-expanded="false" aria-controls="8">
         Servicios
        </a>
      </h3>
    </div>
    <div id="8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head8">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Servicios"><li>Servicios <span class="fa fa-wrench"></span></li></a>
        <a href="pages/cat?c=Servicios&s=Restaurantes"><li>Restaurantes</li></a>
        <a href="pages/cat?c=Servicios&s=Construccion"><li>Construccion</li></a>
        <a href="pages/cat?c=Servicios&s=Informatica"><li>Informatica</li></a>
        <a href="pages/cat?c=Servicios&s=Belleza"><li>Belleza</li></a>
        <a href="pages/cat?c=Servicios&s=Salud-medicina"><li>Salud-medicina</li></a>
        <a href="pages/cat?c=Servicios&s=Eventos"><li>Eventos</li></a>
        <a href="pages/cat?c=Servicios&s=Eroticos"><li>Eroticos</li></a>
      </div> 
      </div>
    </div>
  </div>
    <div class="panel Teal">
    <div class="panel-heading" role="tab" id="head9">
      <h3 class="panel-title">
        <a class="collapsed list-full" data-toggle="collapse" data-parent="#accordion" href="#9" aria-expanded="false" aria-controls="9">
         Empleo
        </a>
      </h3>
    </div>
    <div id="9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="head9">
      <div class="panel-body">
      <div class="cate-list">
        <a href="pages/cat?c=Empleo"><li>Empleo <span class="fa fa-briefcase"></span></li></a>
        <a href="pages/cat?c=Empleo&s=Administracion"><li>Administracion</li></a>
        <a href="pages/cat?c=Empleo&s=Medicina"><li>Medicina</li></a>
        <a href="pages/cat?c=Empleo&s=Educacion"><li>Educacion</li></a>
        <a href="pages/cat?c=Empleo&s=Secretaria"><li>Secretaria</li></a>
        <a href="pages/cat?c=Empleo&s=Temporal"><li>Temporal</li></a>
        <a href="pages/cat?c=Empleo&s=Otros"><li>+empleos</li></a>
       </div>  
      </div>
    </div>
  </div>
</div>
</div>
 
 
     
    <h4> <i class="fa fa-star"> </i> Anuncios destacados </h4>
     
 
<div class="paneldesign">   
<div id="imgcontainer" class="row">          
  <?php 
     if ($consul):

          while ($row = mysqli_fetch_array($consul))
          {
            $id = $row['0'];
            $a = base64_encode($id);
            $descripcion = strlen($row['1']);
            if ($descripcion > 27){
             $cortar = substr("$row[1]", 0 , 27) ;
             $puntos = "...";
             $des_count = $cortar . $puntos;
            }else{
             $des_count = $row[1];
            }
  ?> 
       

    
       <div class='col-md-3 col-sm-6' id="item">
                <div class='thumbnail'>
                    <a href="pages/anuncio?cod=<?php echo $a;?>" class="capitalize">
                    <span class='price'><?php echo "$ $row[precio_anun]"?></span>
                    <?php if (!empty($row['foto1'])){  ?>
                    <img src='pages/script/imagen.php?id=<?php echo $row[0];?>' style='height:200px;'alt=''></a>
                    <?php }else{ ?>
                    <img src='img/photo_available.jpg' style='height:200px;'alt=''></a>
                    <?php } ?>
                    <div class="caption">
                        
                    <a href="pages/anuncio?cod=<?php echo $a;?>">
                    <p style="margin-bottom:1px;"><?php echo $des_count; ?></p>
                    </a>
                    <small class="text-muted" style="margin-top:0;"><?php echo $row['fecha_anun']; ?></small>
                    </div>
                </div>
            </div>
 
  <?php
        }
        endif;
  ?>   

  </div>    
  <div class="row"> 
            <div class='col-md-6 col-md-offset-3'>  
            <div id="loadmoreajaxloader" style="display:none;"><center><img src="img/ajax-loader.gif" /></center></div>
            <h3 id="txtajax" class="text-center alert alert-info" style="display:none;">No hay mas anuncios</h3>
            </div>
            <div class="col-md-12">
            <center><h3 id="btnajax" class="btn btn-default btn-lg btn-block" style="border-radius:0;">Ver mas anuncios</h3><center>
              <br>
              <br>
            </div>  
            </div>
            </div>
             
             
            

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    var load = 0;


    $( "#btnajax" ).click(function() { 

 

        $('div#loadmoreajaxloader').show();
           
         load++;
         
        $.ajax({
        type:"POST",
        url: 'script/ajax.php',
        data:{load:load},
        success: function(html)
        {
            if(html)
            {
                 
                $("#imgcontainer").append(html);
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

		$("#btn-search-nav").click(function(){
  			$("#nav-header-search").hide();
  			$("#navbar-input-search").show("slow");
		});
        
        $("#navbar-input-close").click(function(){
            $("#nav-header-search").show("slow");
  			$("#navbar-input-search").hide();	
        });

 </script>
		
		<footer>
   <div class="container">
   <div class="text-center">

	  <div id="fb-root"> 
    </div>
	  <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=816436198369663&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>

	   <div class="fb-like" style="padding-bottom:5px;"data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"> 
     </div>
     </div> 
     

 


<div class="row">
        <div class="col-md-6">
        <?php $año = date('Y'); ?>
   	    <h5>Instanun © <?php echo $año; ?> </h5> 
   	    </div>
   	    <div class="col-md-6">
   	    <ul class="ulfooter pull-right">
   	    <a href="pages/publicar"><li>Publicar anuncio</li></a>
        <a href="pages/registro"><li>Registrarme</li></a>
   	    <a href="pages/conoce"><li>Conoce mas</li></a>
   	    <a href="pages/acerca"><li>Acerca del servicio</li></a>
   	    <a href="pages/politica"><li>Politica de privacidad</li></a>
   	    </ul>
   	    </div>
</div>

 
  
 </footer>
 
<a class="btn btn-default scroll-top pull-right"><i class="fa fa-chevron-up"></i></a>
		
   <script src="js/npm.js"></script>
    
    <script src="js/sb-admin-2.js"></script>
    <script src="js/bootstrap.js"></script>
 
</body>

</html>
