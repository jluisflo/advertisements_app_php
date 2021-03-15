<?php

 include '../../../script/conexion.php';

$con=conexion();


$id=$_GET['delete'];


$res=mysqli_query($con,"DELETE FROM categorias WHERE categorias.id = $id");

if ($res == true) {

echo '<script>window.location="../../pages/categorias.php" </script>';
mysqli_close($con); 

}else{

  die('Error: ' . mysqli_error($con));

}


?>