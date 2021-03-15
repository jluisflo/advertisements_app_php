<?php

include 'conexion.php';

$con=conexion();


$id=$_GET['cod'];


$res=mysqli_query($con,"DELETE FROM anuncio WHERE cod_anun = $id");

if ($res == false) {
  die('Error: ' . mysqli_error($con));
}else{
header("location: ../pages/publicados.php");
  
mysql_close($con);
}


?>