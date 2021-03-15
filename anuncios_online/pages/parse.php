<?php
require_once '../script/facebook/app/start.php';

// incluye la conexion a base de datos
include '../script/conexion.php';
$con = conexion(); 
   
   
   
   
  $page = 1; //inicializamos la variable $page a 1 por default
		    if(array_key_exists('pg', $_GET)){
		        $page = $_GET['pg']; //si el valor pg existe en nuestra url, significa que estamos en una pagina en especifico.
		    }
   

 $inicio = microtime(true);

      $busqueda = $_GET['b'];
      $dep = $_GET['d'];

        $role = mysqli_query($con,"SELECT * FROM anuncio ");
        $conteo = mysqli_num_rows($role);

        $segmento = mysqli_query($con,"SELECT * FROM anuncio LIMIT ".(($page-1)*1).", 1 ");
        $r = mysqli_num_rows($segmento);
        $max_num_paginas = intval($conteo/1);

 


$final = microtime(true);
$ope = $final- $inicio;
$total = round($ope,4);  

	 
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
 

    </head>
    <body>
        

     <!-- Navigation & Logo-->
      <!-- Navigation & Logo-->
  <?php
include 'inc/nabvar.inc';


 ?>
 
			<br>
			<div class="container">
<div class="visible-xs visible-sm">      
<ol class="breadcrumb">
Filtrar:
   <li class='dropdown'>
               <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                  Departamentos
            <i class='fa fa-angle-down'></i>
               </a>
               <ul class='dropdown-menu dropdown-user'>
               <?php
                while ($fill = mysqli_fetch_row($depar)) {
                ?>

                <li><a href="busqueda.php?b=<?php echo $busqueda ?>&d=<?php echo$fill[1] ?>"><?php echo $fill['1']." (".$fill['0'].")" ?></a></li>
                <?php
                    
                 }
                
                ?>
               
               </li>
               </ul>
               </li>
   
</ol>
</div>

			<?php
			if (mysqli_num_rows($segmento) > 0){
              
             echo "<div style='float:right;'> $r resultados en ($total segundos) </div> <br>";
			 

			};
			
			?>
      <div class="visible-xs ">
      <div class="col-md-12">
        <form class="navbar-form" role="search" method="GET" action="busqueda.php">
            <div class="input-group">
            <input  type="text" class="form-control" placeholder="Buscar" value="<?php echo $_GET['b'] ?>" name="b">
            <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form> 
          
        </div>          
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
 

     <div class="panel panel-default">
  <div class="panel-body">
    Departamentos
  </div>
</div>  
 
      <div class="list-group">
      <a href="busqueda.php?b=<?php echo $busqueda ?> " class="list-group-item lidepar active">Todos</a>
    <?php
     mysqli_data_seek($depar, 0);
    while ($row = mysqli_fetch_array($depar)) {
     ?>
    <a href="busqueda.php?b=<?php echo $busqueda ?>&d=<?php echo$row[1] ?>" class="list-group-item lidepar"><?php echo $row['1'] ?> <span class="badge"><?php echo $row['0'] ?></span></a>
   <?php   
     }
    ?>
   
</div>
 
<br>
<div style="background:#90a4ae; color:#fff; height:500px;">
 <p class="text-center" style="padding-top:150px; color:white;"> anunciate con nosotros <br>
 <a href="publicidad.php">info</a>
 </p>
</div>
 
 </div>      
 </div>
<style type="text/css">

.imgdt{
  width: 100%;
  border: 1px solid white;
}
.imgdt:hover{
  border: 1px solid #9e9e9e;
}

.details{
  margin-left: 2%;
  padding-left: 0;
}
.details li{
  
  list-style: outside none;
}
.details .title{
font-weight: 500;
font-family: arial;
font-size: 18px;
margin-bottom: 4%;
}
.details .price{
  font-size: 20px;
  font-weight: 700;
  font-family: arial;
  margin-bottom: 3%;
  color: #546e7a;
}
.details .count{
 
 font-family: arial; 
 font-size: 14px;
  color: #9e9e9e;
}
.details .time{
 
 font-family: arial; 
 font-size: 14px;
  color: #9e9e9e;
}
 
.back{

background: gray;
}
 
 
</style>
<div class="col-sm-10">
<div class="row"> 

<div class="back">
<div class="col-xs-4" style="padding:0;">  
  <a href=""><img src="../img/divider3.jpg" class="imgdt"><a>  
</div>
<div class="col-xs-8" style="padding:0;">
 <ul class="details"> 
 <li class="title"><a href="">articulos nuevos 100% traidos de usa</a></li>
 <li class="price"><i class="fa fa-dollar"></i></button> 3000 </li>
 <li class="count"><i class="fa fa-map-marker"></i>  San salvador</li>
 <li class="time"><i class="fa fa-calendar-o"></i> martes 18 2014</li>
 </ul> 
</div>

</div>
</div>
</div>

</div>
</div>


<style type="text/css">
.off{
  display: none;
}  

</style>

       


 
<?php
           

            //ahora viene la parte importante, que es el paginado
		    //recordemos que $max_num_paginas fue previamente calculado.
			if (isset($_GET['b'])):
			$var = $_GET['b'];
      $dep = $_GET['d'];

      $pre = $page - 1;
      $next = $page +1;  
			
			echo "<div class='row text-center'>";
            echo "<h5 class='text-primary'>Pagina actual $page</h5>";
            echo "<ul class='pagination'>";
        if ($page == 1){

        if ($pre > 0){
         echo "<li><a href='busqueda.php?b=$var&d=$dep&pg=$next'> >> </a> </li> ";
        }else{
          echo "<li style='display:none;'><a href='busqueda.php?b=$var&d=$dep&pg=$next'> >> </a> </li> ";
        }

          echo "<li class='active'><a href='busqueda.php?b=$var&d=$dep&pg=$page'>".$page."</a> </li> ";
          for($i=1; $i<$max_num_paginas;$i++){

           echo "<li><a href='busqueda.php?b=$var&d=$dep&pg=".($i+1)."'>".($i+1)."</a> </li> ";
          }

        if ($next > $max_num_paginas){
         echo "<li style='display:none;'><a href='busqueda.php?b=$var&d=$dep&pg=$next'> disable</a> </li> ";
        }else{
          echo "<li class='true'><a href='busqueda.php?b=$var&d=$dep&pg=$next'> >> </a> </li> ";
        }

        }else{

         echo "<li><a href='busqueda.php?b=$var&d=$dep&pg=$pre'> << </a> </li> ";

          for($i=0; $i<$max_num_paginas;$i++){


                 echo "<li><a href='busqueda.php?b=$var&d=$dep&pg=".($i+1)."'>".($i+1)."</a> </li> ";

        }
        if ($next > $max_num_paginas){
         echo "<li style='display:none;'><a href='busqueda.php?b=$var&d=$dep&pg=$next'> disable</a> </li> ";
        }else{
          echo "<li class='true'><a href='busqueda.php?b=$var&d=$dep&pg=$next'> >> </a> </li> ";
        }

			   

		    } 
             echo "</ul>";
             echo "</div>";


			
            endif			
?>
 	

	    
        
		
 
     <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
     

    </body>
</html>
