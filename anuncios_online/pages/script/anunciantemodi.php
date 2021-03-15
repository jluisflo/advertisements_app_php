<?php

session_destroy();
 include '../../script/conexion.php';
	$cn = conexion();
$cod = $_POST["codigo"]; 
$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$mail = $_POST["mail"];
$contra = $_POST["contraseña"];
    
		    $operacion = mysqli_query($cn,"update anunciante SET nom_usu='$nom', ape_usu='$ape', email_usu='$mail', clav_usu='$contra' where cod_usu='$cod' ");

		    $n = mysqli_affected_rows($cn);
			 
			if($operacion == true){
				
            header("location: modif.php?cod=$cod&f=$n"); 	
           

			}else{
			
			  echo "<div style='text-align:center; padding-top:150px; color:gray;'>";
			  echo "<h1>Disculpe los inconvenientes</h1>";
			  echo "<h2>ERROR AL CONFIGURAR PERFIL! <strong>:( </strong></h2>";
			  echo "Vuelva a intentarlo por favor <a href='../perfil.php'>Aqui</a>";
			  echo "</div>";  
			};
				
			
			
?>
			