<?php

require '../../script/conexion.php';

$con = conexion();

	$id=$_GET["id"];
 

	$result = mysqli_query($con,"SELECT tipo2, foto2 FROM anuncio WHERE cod_anun=$id");
	$datos = mysqli_fetch_array($result);
	$tipo = $datos[0];
	$imagen = $datos[1];
    
       header("Content-Type: $tipo");// Muestra la imagen
	   echo $imagen;
   

?>