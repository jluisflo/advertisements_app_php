<?php
require_once '../script/facebook/app/start.php';

// incluye la conexion a base de datos
include '../script/conexion.php';
$con = conexion(); 
   
   
   
   
  $page = 1; //inicializamos la variable $page a 1
        if(array_key_exists('pag', $_GET)){
            $page = $_GET['pag']; //si el valor pag existe en nuestra url, significa que estamos en una pagina en especifico.
        }

  

      $bus = $_GET['b'];
      $dep = $_GET['d'];
      $max_rows = 15;
      $request = "cod_anun, titulo_anun, tipo_venta, foto1, precio_anun, ubicacion, fecha_anun, hora_anun";


 if  (!empty($bus) and empty($dep)){

    
        $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%'");
        $conteo = mysqli_num_rows($role);

		    $segmento = mysqli_query($con,"SELECT $request  FROM anuncio WHERE titulo_anun LIKE '%$bus%' ORDER BY cod_anun desc LIMIT ".(($page-1)*$max_rows).", $max_rows ");
			  $r = mysqli_num_rows($segmento);
        $max_num_paginas = intval($conteo/$max_rows);

        $depar = mysqli_query($con,"SELECT count(*) ,ubicacion  FROM anuncio WHERE titulo_anun LIKE '%$bus%' GROUP BY ubicacion");
        
   }elseif(!empty($bus and $dep)){
         
        $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and ubicacion='$dep'");
        $conteo = mysqli_num_rows($role);

		    $segmento = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' AND ubicacion='$dep' ORDER BY cod_anun desc LIMIT ".(($page-1)*$max_rows).", $max_rows ");
			  $r = mysqli_num_rows($segmento);
        $max_num_paginas = intval($conteo/$max_rows);

        $depar = mysqli_query($con,"SELECT count(*) ,ubicacion  FROM anuncio WHERE titulo_anun LIKE '%$bus%' GROUP BY ubicacion");


   }else{

        $role = mysqli_query($con,"SELECT $request  FROM anuncio WHERE ubicacion='$dep'");
        $conteo = mysqli_num_rows($role);

        $segmento = mysqli_query($con,"SELECT $request  FROM anuncio WHERE ubicacion='$dep' ORDER BY cod_anun desc LIMIT ".(($page-1)*$max_rows).", $max_rows ");
        $r = mysqli_num_rows($segmento);
        $max_num_paginas = intval($conteo/$max_rows);

        $depar = mysqli_query($con,"SELECT count(*) ,ubicacion  FROM anuncio GROUP BY ubicacion");

   }

 
?> 
<!DOCTYPE html>
 <html class="no-js"> 
    <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resultados</title>

        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/marketplace.css">
		<link type="text/css" rel="stylesheet" href="../css/materialdesign.css"  media="screen,projection"/>
		<link rel="stylesheet" href="../css/main.css">
		<link href="../css/social-buttons.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
 
    <script type="text/javascript">
    <!--
    function paginar(actual, total, por_pagina, enlace, maxpags) {

      var  texto = '<div class="row text-center"><ul class="pagination">';  
      var total_paginas = Math.ceil(total/por_pagina);
      var anterior = actual - 1;
      var posterior = actual + 1;
      var med = maxpags/2;
        var minimo = 0; 

      if( (actual + med) >= total_paginas) {
        minimo = Math.max(total_paginas - maxpags + 1,1);
      }
      else {
        minimo = ( (actual-med)>0 )? actual - med : 1; 
      }   
      var maximo = 0;  
        if (actual>1) texto += '<li><a href=?b=<?php echo urlencode($bus) ?>&d=<?php echo urlencode($dep) ?>&' + enlace + anterior + ' title="Back">Anterior</a></li>';
      maximo = Math.min(minimo + maxpags - 1, total_paginas);
      for (var i=minimo; i <= maximo; i++) {
        if(i == actual) {
          texto += '<li class="active"><a><b>' + actual + "</b></a></li>";
        }
        else {
          texto += '<li><a href=?b=<?php echo urlencode($bus) ?>&d=<?php echo urlencode($dep) ?>&'+ enlace + i + ' >' + i + '</a></li>';
        }
      }
      if (actual < total_paginas ) 
        texto += '<li><a href=?b=<?php echo urlencode($bus) ?>&d=<?php echo urlencode($dep) ?>&' + enlace + posterior + ' title="Next">Siguiente</i></a></li>';
      texto += '</ul></div>';
      return texto;
    }
  -->
</script>
    </head>
    <body class="body-gray">
        

     <!-- Navigation & Logo-->
      <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
 
			<br>
    <div class="container">
		<div class="visible-xs visible-sm">
    <ol class="breadcrumb" style="padding-left:1px; margin-bottom:0px;">
     
    Filtrar:
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
     Ubicacion <i class="fa fa-chevron-down"></i>
   </a>
 
   </ol>
<div class="collapse" id="collapseExample">
  <div class="well" style="background: #fff; padding:0px; margin:0px;">
       <ul class="list-group" style="margin:0px;">
          <?php 
      if (empty($dep)) { 
      ?>

      <a href="busqueda?b=<?php echo urlencode($bus) ?> " class="list-group-item lidepar active">Todos </a>

      <?php 
        }else{ 
      ?>

      <a href="busqueda?b=<?php echo urlencode($bus) ?> " class="list-group-item lidepar ">Todos </a>

      <?php  
        }
       ?>
    <?php
    while ($row = mysqli_fetch_array($depar)) {

   $estado = array($dep => 'active',);
     ?>
    <a href="busqueda?b=<?php echo urlencode($bus) ?>&d=<?php echo urlencode($row[1]) ?>" class="list-group-item lidepar <?php echo $estado[$row['1']] ?>"><?php echo $row['1'] ?> <span class="badge"><?php echo $row['0'] ?></span></a>
   <?php   
     }
    ?>

    </ul>
  </div>
</div>      
		</div>
 
      <div class="visible-xs ">
       
        <form class="navbar-form" role="search" method="GET" action="busqueda">
            <div class="input-group">
            <input  type="text" class="form-control" placeholder="Buscar" value="<?php echo $_GET['b'] ?>" name="b">
            <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form> 
              
        </div>
			
     
      


<style type="text/css">

  .lidepar:hover{
   text-decoration: underline;
   color: #1e88e5;
  }
</style>
    <div class="zte">
     <div class="row">
     <div class="hidden-xs hidden-sm">
          
     <div class="col-md-2">
       <br>

     
 
          <a style="background:#f5f5f5;" class="list-group-item lidepar" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="true" aria-controls="collapseListGroup1">
             Ubicacion <i class="fa fa-chevron-down"></i>
          </a>
   
      <div id="collapseListGroup1" class="collapse in">
        <ul class="list-group">
          <?php 
      if (empty($dep)) { 
      ?>

      <a href="busqueda?b=<?php echo urlencode($bus) ?> " class="list-group-item lidepar active">Todos </a>

      <?php 
        }else{ 
      ?>

      <a href="busqueda?b=<?php echo urlencode($bus) ?> " class="list-group-item lidepar ">Todos </a>

      <?php  
        }
       ?>
    <?php

     mysqli_data_seek($depar, 0);
    while ($row = mysqli_fetch_array($depar)) {

   $estado = array($dep => 'active',);
     ?>
    <a href="busqueda?b=<?php echo urlencode($bus) ?>&d=<?php echo urlencode($row[1]) ?>" class="list-group-item lidepar <?php echo $estado[$row['1']] ?>"><?php echo $row['1'] ?> <span class="badge"><?php echo $row['0'] ?></span></a>
   <?php   
     }
    ?>

      </ul>
    </div>
 

  
<br>
<div style="background:#90a4ae; color:#fff; height:500px;">
 <p class="text-center" style="padding-top:150px; color:white;"> anunciate con nosotros <br>
 <a href="publicidad">info</a>
 </p>
</div>
 
 </div>      
 </div>
 
     <div class="col-sm-10"> 
     <div id="result" class="result">         
<?php
 

    if (mysqli_num_rows($segmento) > 0){
	 		
 
while ($row = mysqli_fetch_array($segmento)){  

	$id = $row['cod_anun'];
	 $a = base64_encode($id);
	 $descripcion = strlen($row['descrip_anun']);
     if ($descripcion > 40){
      $cortar = substr("$row[descrip_anun]", 0 , 40) ;
      $puntos = "...";
      $des_count = $cortar . $puntos;
     }else{
      $des_count = $row['titulo_anun'];
     }
   $tipo = array(
    'true' => '
    color: #31708F;
    background-color: #D9EDF7;
    border: 1px solid #BCE8F1;
    border-radius: 4px;
    ',
    );
     $display = array(
        '' => '
    display:none;
    ',
    );  
            
      ?>
 
<div class="row item" style="<?php echo $tipo[$row['destacado']] ?>">
<div class="col-xs-4" style="padding:0;">

   <?php if (!empty($row['foto1'])){  ?>
  <a href="anuncio?cod=<?php echo $a; ?>">
  <img src="script/imagen.php?id=<?php echo $row['cod_anun']; ?>" class="imgdt" id="img">
  </a>
  <?php }else{ ?>
  <a href="anuncio?cod=<?php echo $a; ?>">
  <img src="../img/photo_available.jpg" class="imgdt" id="img">
  </a>
 <?php
  }
  ?>
</div>

<div class="col-xs-8" style="padding:0;">
 <ul class="details">
 <li class="pull-right" style="<?php echo $display[$row['destacado']] ?>"><i class="fa fa-star" style="padding:5px;"></i></li> 
 <li class="title"><a href="anuncio?cod=<?php echo $a; ?>"> <?php echo $des_count; ?></a></li>
 <li class="price"><i class="fa fa-dollar"></i></button> <?php echo $row['precio_anun']; ?> <small> <?php echo $row['tipo_venta']; ?></small> </li>
 <li class="count"><i class="fa fa-map-marker"></i> <?php echo $row['ubicacion']; ?></li>
 <li class="time"><i class="fa fa-calendar-o"></i> <?php echo $row['fecha_anun']; ?></li>
 </ul> 
</div>
</div> 
  
<div class="hr-item"></div>      
      <?php
		;}
 
}else{

 echo"
 <div class='page-header text-center alert alert-info' style='font-size:30px;'>
 <p><strong style='color:#0080FF; font-size:75px;'> :( </strong><small>No hay Anuncios</small></p>
 <div class='row'>
  <div class='col-md-6 col-md-offset-3'>
   <form class='navbar-form' role='search' method='GET' action='busqueda.php'>
        <div class='input-group'>
            <input  type='text' class='form-control' placeholder='Intenta otra vez' name='b' required>
            <div class='input-group-btn'>
            <button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>
            </div>
        </div>
        </form>
</div>
</div>
 </div>";
}


 
 
?>
</div>
</div>
</div>
</div>

       


 
<div id="sider-nav"></div>
<?php
    echo '<script> 
    document.getElementById("sider-nav").innerHTML =
    paginar('. $page .','. $conteo . ','.$max_rows.', "pag=",10);
    </script>';
?>  
 	
</div>
	    
        
		
 
     <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
     

    </body>
</html>
