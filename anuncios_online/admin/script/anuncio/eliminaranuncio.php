<?php

 include '../../../script/conexion.php';

$con=conexion();


$id=$_GET['delete'];


$res=mysqli_query($con,"DELETE FROM anuncio WHERE anuncio.cod_anun = $id");

if ($res == false) {
  die('Error: ' . mysql_error($con));
}else{
echo '<script>window.location="../../pages/anuncios.php" </script>';
  
mysql_close($con);
}


?>