<?php

include 'conexion.php';

$con=conexion();


$id=$_GET['cod'];


$res=mysqli_query($con,"DELETE FROM historial WHERE cod_usu = $id");
$n = mysqli_affected_rows($con);

if ($res == false) {
              echo "<div style='text-align:center; padding-top:150px; color:gray;'>";
			  echo "<h1>Disculpe los inconvenientes</h1>";
			  echo "<h2>ERROR AL ELIMINAR HISTORIAL! <strong>:( </strong></h2>";
			  echo "Vuelva a intentarlo por favor <a href='../pages/perfil.php'>Aqui</a>";
			  echo "</div>"; 
}else{
header("location: ../pages/perfil.php?f=$n");
  
mysql_close($con);
}


?>