<?php

			
 include '../../../script/conexion.php';
	$cn = conexion();
$cod = $_POST["codigo"];
$nom = $_POST["nombre"];
$pass = $_POST["pass"];
$nivel = $_POST["nivel"];
     
	         
		    $consulta=mysqli_query($cn,"update usuario SET nom_usuario='$nom', pass_usuario='$pass', nivel_usuario='$nivel' where cod_usuario='$cod' ");
			 
			if($consulta == true ){
			 echo '<script language = javascript>window.location="../../pages/usuarios.php"</script>';			
			}else{
			echo "Ha ocurrido un error";
			}
		 
			
			
			
			
			
			
			
?>
			