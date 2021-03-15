<?php
 include '../../../script/conexion.php';
$con = conexion();
  
 $nom = $_POST['nombre'];
 $ape = $_POST['ape'];
 $mail = $_POST['mail'];
 $clav = $_POST['contra'];
    
	        
		    $consulta = mysqli_query($con,"insert into anunciante (nom_usu,ape_usu,email_usu,clav_usu) values('".$nom."','".$ape."','".$mail."','".$clav."')");
			if($consulta == true){
			 echo '<script language = javascript>window.location="../../pages/anunciante.php"</script>';			
			}else{
			echo"error";
			}
 
 

	
	
?>