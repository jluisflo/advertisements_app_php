<?php
 include '../../../script/conexion.php';

$con = conexion();

  
    
$sec=$_POST['seccion'];
$cod=$_POST['relacion'];

		    $consulta = mysqli_query($con,"insert into secciones (nombre,relacion) values('".$sec."','".$cod."')");

			if($consulta){

			 echo '<script language = javascript>window.location="../../pages/categorias.php"</script>';			
			}
			else{
			echo"error";
			}
			
  
	
	
?>