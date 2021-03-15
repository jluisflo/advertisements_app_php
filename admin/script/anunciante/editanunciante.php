<?php

 include '../../../script/conexion.php';
	$cn = conexion();
$cod = $_POST["codigo"]; 
$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$mail = $_POST["mail"];
$contra = $_POST["contraseña"];
    
		    $consulta=mysqli_query($cn,"update anunciante SET nom_usu='$nom', ape_usu='$ape', email_usu='$mail', clav_usu='$contra' where cod_usu='$cod' ");
			 
			if($consulta == true){
			 echo '<script language = javascript>window.location="../../pages/anunciante.php"</script>';			
			}else{
			 
			
			echo"error";
			}
			
			
			
			
			
			
			
			
			
?>
			