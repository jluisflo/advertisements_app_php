<!-- Navigation & Logo-->
    <script>
$(document).ready(function(){

   /* $("#div1").fadeIn();
    $("#div2").fadeIn("slow");
    $("body").fadeIn(3000);*/
    $("body").css("display", "none");
   $("body").fadeIn(700);
   $("img").fadeIn(500);
});
 </script>
 
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">

  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

     <div id="nav-header-search">
     <a id="brand1" class="navbar-brand" href="../index.php">
      
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
     <form class="navbar-form" role="search" method="GET" action="busqueda">
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
        <form class="navbar-form" role="search"  method="get" action="busqueda">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="¿Que necesitas hoy?" name="b">
            <div class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        </form>
    </div>
      <ul class="nav navbar-nav navbar-right">
         
		
			<li class="active-li"><a href="publicar"><i class='fa fa-edit fa-fw '></i> Publicar anuncio</a></li>
			<?php
        if (!isset($_SESSION['nombre'])){
      echo "<li class='market'><a href='#' data-toggle='modal' data-target='#lightbox' > Iniciar sesion </a></li>";
           
            }else{
              echo "<li class='dropdown'>";
              echo "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>";
               echo "hola, $_SESSION[nombre]";
          echo " <i class='fa fa-angle-down'></i>";
              echo "</a>";
              echo "<ul class='dropdown-menu dropdown-user'>";
        echo "<li><a href='perfil'><i class='fa fa-user fa-fw color-blue'></i> Mi perfil</a>";
        echo "<li><a href='publicados'><i class='fa fa-check-square-o fa-fw color-blue'></i> Administrar mis anuncios</a>";
               
              echo "<li><a href='../script/cerrar_session.php'><i class='fa fa-sign-out fa-fw'></i> Cerrar sesion</a>";
              echo "</li>";
              echo "</ul>";
              echo "</li>";
      
      }
      ?>
			
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
      <form action="../script/script_acceso_usuario.php" method="POST">
      <div class="form-group">
        <input  class="form-control" type="text" name="usuario" id="myusername" placeholder="Correo Electronico"  style="width:100%;" required autofocus>
      </div>
      <div class="form-group">  
        <input name="contra" id="mypassword" class="form-control" placeholder="Contraseña" type="password" style="width:100%;" required autofocus>	  
      </div>
        <input name="submit" type="submit" class="btn btn-primary btn-outline" value="Iniciar sesion"></input>
		<button type="button" class="close hidden"  value="Iniciar sesion" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	  </form>
      </div>
	  <div class="col-md-6">
	  <div class="form-group">
	  <br>
    <center>
      <a href="<?php echo $helper->getLoginUrl($config['scopes']); ?>"class="btn btn-stackexchange btn-lg"><i class="fa fa-facebook"></i> Conectate con facebook</a>
    </center>  
	  </div>			
	  </div>
      </div>
      <p class="text-center">Eres nuevo aqui? <span><a href="registro.php">Registrate</a></span> </p>
      <button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
      </div>
      </div>
   </div>
   </div>
<script>

    $('.scroll-top').on('click', function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop:0}, 'slow');
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