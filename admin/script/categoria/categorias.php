<?php
 include '../../../script/conexion.php';
$con = conexion();
date_default_timezone_set('America/El_salvador');
$hoy = date("F j, Y, g:i a"); 

    
$cate = $_POST['categoria'];

		    $consulta = mysqli_query($con,"insert into categorias (categoria) values('".$cate."')");

			if($consulta == true){
			 echo '<script language = javascript>window.location="../../pages/categorias.php"</script>';			
			}
			else{
			echo"error";
			}
			
  
	
	
?>