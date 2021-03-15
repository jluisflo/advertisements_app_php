<?php

 include '../../../script/conexion.php';

$con=conexion();


$id=$_GET['delete'];


$res=mysqli_query($con,"DELETE FROM usuario WHERE usuario.cod_usuario = $id");

if ($res == true) {
 echo '<script>window.location="../../pages/usuarios.php" </script>';
 mysqli_close($con);
}else{

   die('Error: ' . mysqli_error($con));

}


?>