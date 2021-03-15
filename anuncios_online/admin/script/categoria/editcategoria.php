<?php

 include '../../../script/conexion.php';
	$cn = conexion();
date_default_timezone_set('America/El_salvador');
$hoy = date("F j, Y, g:i a"); 
$cate = $_POST["categoria"];
$cod = $_POST["codigo"];
$fecha = $_POST["fecha"];

if($_POST["categoria"]){
	         
		    $consulta=mysqli_query($cn,"update categorias SET categoria='$cate' where id='$cod' ");
			 
			if($consulta == true){
			 echo '<script language = javascript>window.location="../../pages/categorias.php"</script>';			
			 
			}else{
			
			echo"error";
			}
			
}	
			
			
			
?>
			