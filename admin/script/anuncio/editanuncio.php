<?php

 include '../../../script/conexion.php';
	$cn = conexion();
date_default_timezone_set('America/El_salvador');
$hoy = date("F j, Y, g:i a"); 
$cate = $_POST["categoria"];
$cod = $_POST["codigo"];
$fecha = $_POST["fecha"];
     
	         
		    $consulta = mysqli_query($cn,"update categorias SET nombre='$cate', creacion='$fecha', ultima_modificacion='$hoy' where id='$cod' ");
			 
			if($consulta == true ){
			 echo '<script language = javascript>window.location="../../pages/anuncios.php"</script>';			
			}else{
			 	
			echo"error";
			}
			
			
			
			
			
			
			
			
			
?>
			