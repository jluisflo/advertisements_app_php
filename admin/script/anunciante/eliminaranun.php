<?php

 include '../../../script/conexion.php';

$con=conexion();


$id=$_GET['delete'];


$res=mysqli_query($con,"DELETE FROM anunciante WHERE cod_usu =$id");
$res1=mysqli_query($con,"DELETE FROM anuncio WHERE cod_usu =$id");


if ($res and $res1 == true) {

echo '<script>window.location="../../pages/anunciante.php" </script>';
 mysqli_close($con);
 
}else{
 die('Error: ' . mysqli_error($con));
  

}


?>
