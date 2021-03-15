<?php
require_once '../script/facebook/app/start.php';
include '../script/conexion.php';


    if (isset($_SESSION['facebook'])){ 
		  $_SESSION['nombre'] = $facebook_user->getName(); 
		  }
         $page = 1; //inicializamos la variable $page a 1
        if(array_key_exists('pag', $_GET)){
            $page = $_GET['pag']; //si el valor pag existe en nuestra url, significa que estamos en una pagina en especifico.
        }

      $con = conexion();
      
      $bus = $_GET['b'];
      $cat = $_GET['c'];
      $sec = $_GET['s'];
      $dep = $_GET['d'];
      $max_rows = 10;
      $request = "cod_anun, titulo_anun, tipo_venta, foto1, precio_anun, ubicacion, fecha_anun, hora_anun";

   //FOX ENGINE SEARCH

    if (!empty($cat) and empty($sec)){
      
        if (!empty($dep) and empty($bus)){
        
       $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and ubicacion='$dep'");
       $conteo = mysqli_num_rows($role);
       $max_num_paginas = ceil($conteo/10);
       $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and ubicacion='$dep' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
       $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE categoria='$cat' group by ubicacion");

        }elseif(!empty($bus) and empty($dep)){
        
       $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat'");
       $conteo = mysqli_num_rows($role);
       $max_num_paginas = ceil($conteo/10);
       $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
       $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' group by ubicacion");

        }elseif(!empty($bus and $dep)){

       $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and ubicacion='$dep'");
       $conteo = mysqli_num_rows($role);
       $max_num_paginas = ceil($conteo/10);
       $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and ubicacion='$dep' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
       $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' group by ubicacion");

        }else{

        $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat'");
        $conteo = mysqli_num_rows($role);
        $max_num_paginas = ceil($conteo/10);
        $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
        $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE categoria='$cat' group BY ubicacion");

        }
        
 
        

    }elseif (!empty($cat and $sec)) {

       if (!empty($dep) and empty($bus)){
        
       $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and seccion='$sec' and ubicacion='$dep'");
       $conteo = mysqli_num_rows($role);
       $max_num_paginas = ceil($conteo/10);
       $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and seccion='$sec' and ubicacion='$dep' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
       $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE categoria='$cat' and seccion='$sec' group by ubicacion");

       }elseif(!empty($bus) and empty($dep)){

      $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec'");
      $conteo = mysqli_num_rows($role);
      $max_num_paginas = ceil($conteo/10);
      $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
      $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec' group by ubicacion");
      
      }elseif(!empty($bus and $dep)) {
        
      $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec' and ubicacion='$dep'");
      $conteo = mysqli_num_rows($role);
      $max_num_paginas = ceil($conteo/10);
      $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec' and ubicacion='$dep' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
      $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE titulo_anun LIKE '%$bus%' and categoria='$cat' and seccion='$sec' group by ubicacion");

      }else{

        $role = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and seccion='$sec'");
        $conteo = mysqli_num_rows($role);
        $max_num_paginas = ceil($conteo/10);
        $query = mysqli_query($con,"SELECT $request FROM anuncio WHERE categoria='$cat' and seccion='$sec' ORDER BY cod_anun DESC LIMIT ".(($page-1)*10).", 10 ");
        $depar = mysqli_query($con,"SELECT count(*) ,ubicacion FROM anuncio WHERE categoria='$cat' and seccion='$sec' group BY ubicacion");

      }
             
    }else{
     
       header("location: ../index.php"); 
     
    }

//Generando las variables get para panel departamento
 

		if (!empty($sec and $bus)){
		  
		   $url1 = "c=".urlencode($cat)."&s=".urlencode($sec)."&b=".urlencode($bus)."";

		}elseif (!empty($sec) and empty($bus)){

		   $url1 = "c=".urlencode($cat)."&s=".urlencode($sec)."";	

		}elseif(empty($sec) and !empty($bus)){

		   $url1 = "c=".urlencode($cat)."&b=".urlencode($bus)."";

		}else{   

		   $url1 = "c=".urlencode($cat)."";
		}

//Generando url de la paginacion
 
       	if (!empty($sec)){
		    
		   if(!empty($dep) and empty($bus)){   
           
           $urlpagi = "?c=".urlencode($cat)."&s=".urlencode($sec)."&d=".urlencode($dep)."&";

           }elseif(!empty($bus) and empty($dep)){
           
           $urlpagi = "?c=".urlencode($cat)."&s=".urlencode($sec)."&b=".urlencode($bus)."&";

           }elseif(!empty($bus and $dep)){  

           $urlpagi = "?c=".urlencode($cat)."&s=".urlencode($sec)."&d=".urlencode($dep)."&b=".urlencode($bus)."&"; 

           }else{

           $urlpagi = "?c=".urlencode($cat)."&s=".urlencode($sec)."&"; 

           }

		}else{

           if(!empty($dep) and empty($bus)){   
           
           $urlpagi = "?c=".urlencode($cat)."&d=".urlencode($dep)."&";

           }elseif(!empty($bus) and empty($dep)){
           
           $urlpagi = "?c=".urlencode($cat)."&b=".urlencode($bus)."&";

           }elseif(!empty($bus and $dep)){  

           $urlpagi = "?c=".urlencode($cat)."&d=".urlencode($dep)."&b=".urlencode($bus)."&"; 

           }else{

           $urlpagi = "?c=".urlencode($cat)."&"; 

           }

		}
 

?> 
<!DOCTYPE html>
 <html> 
    <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anuncios online</title>

        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/marketplace.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/materialdesign.css">
		<link href="../css/social-buttons.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		 
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>

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
        if (actual>1) texto += '<li><a href=<?php echo $urlpagi; ?>' + enlace + anterior + ' title="Back">Anterior</a></li>';
      maximo = Math.min(minimo + maxpags - 1, total_paginas);
      for (var i=minimo; i <= maximo; i++) {
        if(i == actual) {
          texto += '<li class="active"><a><b>' + actual + "</b></a></li>";
        }
        else {
          texto += '<li><a href=<?php echo $urlpagi; ?>'+ enlace + i + ' >' + i + '</a></li>';
        }
      }
      if (actual < total_paginas ) 
        texto += '<li><a href=<?php echo $urlpagi; ?>' + enlace + posterior + ' title="Next">Siguiente</a></li>';
      texto += '</ul></div>';
      return texto;
    }
  -->
</script>

    </head>

    <body class="body-gray">
  <?php
include 'inc/nabvar.inc';
 ?>

 
 <br>

<div class="container">

    <ol class="breadcrumb" style="margin-bottom:3px; padding-left:5px;">
        <li><a href="cat?c=<?php echo $cat ?>"> <?php echo $cat ?> </a></li>
        <li><a href="cat?c=<?php echo $cat ?>&s=<?php echo urlencode($sec) ?>"> <?php echo $sec; ?> </a></li>
    </ol>

    <div class="visible-xs visible-sm"> 
              <ol class="breadcrumb" style="padding-left:5px; margin-bottom:0px;">
     
                  Filtrar:
                  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                   Ubicacion <i class="fa fa-angle-down"></i>
                 </a>
               
               </ol>

    <div class="collapse" id="collapseExample">
        <div class="well" style="background: #fff; padding:0px; margin:0px;">
            <ul class="list-group" style="margin:0px;">
                
              <?php 
                    if (empty($dep)) { 
                    ?>

                    <a href="cat?<?php echo "$url1"; ?>" class="list-group-item lidepar active">Todos </a>

                    <?php 
                      }else{ 
                    ?>

                    <a href="cat?<?php echo "$url1"; ?>" class="list-group-item lidepar">Todos </a>

                    <?php  
                      }
                     ?>
                  <?php
                  while ($row = mysqli_fetch_array($depar)) {

                 $estado = array($dep => 'active',);
                   ?>
                  <a href="cat?d=<?php echo urlencode($row[1])?>&<?php echo $url1; ?>" class="list-group-item lidepar <?php echo $estado[$row['1']] ?>"><?php echo $row['1'] ?> <span class="badge"><?php echo $row['0'] ?></span></a>
                 <?php   
                   }
                  ?>
            </ul>
        </div>
    </div>
   </div>         

            
    <div class="row">  
          <div class="col-md-6 col-md-offset-3">
            <form class="navbar-form" role="search" method="GET" action="cat">
                <div class="input-group">
                <?php
                if (!empty($sec) and empty($dep)){
                ?>
                <input  type="text" name="c" value="<?php echo $cat ?>" style="display:none;">
                <input  type="text" name="s" value="<?php echo $sec ?>" style="display:none;">
                <?php
                }elseif (!empty($dep) and empty($sec)){
                ?>
                
                <input  type="text" name="c" value="<?php echo $cat ?>" style="display:none;">
                <input  type="text" name="d" value="<?php echo $dep ?>" style="display:none;">  

                <?php
                }elseif(!empty($dep and $sec)){
                ?>
                <input  type="text" name="c" value="<?php echo $cat ?>" style="display:none;">
                <input  type="text" name="s" value="<?php echo $sec ?>" style="display:none;">
                <input  type="text" name="d" value="<?php echo $dep ?>" style="display:none;">  

                <?php 	
                }else{
                ?>  
                <input  type="text" name="c" value="<?php echo $cat ?>" style="display:none;">
                <?php
                }
                ?>
                <input  type="text" class="form-control" placeholder="Buscar en esta categoria" value="<?php echo $_GET['b'] ?>" name="b" required>
                <div class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
            </form> 
          </div>  <!--col md 6 -->      
    </div>      
     
   <div class="zte">
      <div class="row">
          <div class="col-md-2">
          <div class="hidden-xs hidden-sm">
          <br>

       <?php
       if (mysqli_num_rows($depar) > 0){
       ?>

            <a style="background:#f5f5f5;" class="list-group-item lidepar" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="true" aria-controls="collapseListGroup1">
             Ubicacion <i class="fa fa-chevron-down"></i>
            </a>  

            <div id="collapseListGroup1" class="collapse in">
            <div class="list-group">
            <?php if (empty($dep)) { ?>
            <a href="cat?<?php echo "$url1"; ?>" class="list-group-item lidepar active">Todos</a>
            <?php }else{ ?>
            <a href="cat?<?php echo "$url1"; ?>" class="list-group-item lidepar">Todos</a>
            <?php  
            }
            ?>
          <?php
          mysqli_data_seek($depar, 0); 
          while ($row = mysqli_fetch_array($depar)) {

            $estado = array(
                $dep => '
            active
            ',
            );
           ?>
          <a href="cat?d=<?php echo urlencode($row[1])?>&<?php echo $url1; ?>" class="list-group-item lidepar <?php echo $estado[$row['1']] ?>"><?php echo $row['1'] ?> <span class="badge"><?php echo $row['0'] ?></span></a>
         
         <?php } ?>
         
          </div>
          </div>
       <?php } ?>

        </div>
        </div> <!-- col md-2-->

      <div class="col-sm-10"> 
         <div id="result" class="result"> 
        <?php
        if (!empty($_GET['c'])){

            if (mysqli_num_rows($query) > 0){
              while ($row = mysqli_fetch_array($query)){  
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
<div class="fade-in one">
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
 <li class="title"><a href="anuncio.php?cod=<?php echo $a; ?>"> <?php echo $des_count ?></a></li>
 <li class="price"><i class="fa fa-dollar"></i></button> <?php echo $row['precio_anun']; ?> <small> <?php echo $row['tipo_venta']; ?></small> </li>
 <li class="count"><i class="fa fa-map-marker"></i> <?php echo $row['ubicacion']; ?></li>
 <li class="time"><i class="fa fa-calendar-o"></i> <?php echo $row['fecha_anun']; ?></li>
 </ul> 
</div>
</div> 
</div> 
<div class="hr-item"></div>              
        
    <?php
    ;}
     
    }else{

     echo"<div class='page-header text-center alert alert-info' style='font-size:50px;'><p><strong style='color:#0080FF; font-size:75px;'> :( </strong><small>No hay resultados</small></p></div>";
    }


    }else{
    echo "<div class='page-header text-center alert alert-info' style='font-size:50px;'><p><strong style='color:#0080FF; font-size:55px;'> ;) </strong><small>Debe Escribir algo.</small></p></div>";
    }
    ?>
</div>
</div>
</div><!--end row  -->
</div>

     
<div id="sider-nav"></div>
<?php
    echo '<script> 
    document.getElementById("sider-nav").innerHTML =
    paginar('. $page .','. $conteo . ','.$max_rows.', "pag=",8);
    </script>';
?> 

 </div><!-- end container -->




   
      


  
     <script src="../js/bootstrap.js"></script>
   

    </body>
</html>