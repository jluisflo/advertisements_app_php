<?php

require '../../script/conexion.php';

$con = conexion();

	$id=$_GET["id"];
 

	$result = mysqli_query($con,"SELECT tipo, foto_anun FROM anuncio WHERE cod_anun=$id");
	$datos = mysqli_fetch_array($result);
	$tipo = $datos[0];
	$imagen = $datos[1];
 
	header("Content-Type: $tipo");// Muestra la imagen
	echo $imagen;
 


?>