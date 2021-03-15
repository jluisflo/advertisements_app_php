<?php
 include '../../../script/conexion.php';
$con = conexion();
$nom = $_POST["nombre"];
$pass = $_POST["pass"];
$nivel = $_POST["nivel"];

    
		    $consulta=mysqli_query($con,"insert into usuario (nom_usuario,pass_usuario, nivel_usuario) values('".$nom."','".$pass."','".$nivel."')");
			
			if($consulta == true){
			 echo '<script language = javascript>window.location="../../pages/usuarios.php"</script>';			
			}else{
			
			echo"error";
			}
			


	
	
?>