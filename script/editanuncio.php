<?php

			
 include 'conexion.php';
	$cn = conexion();
$cod = $_POST["codigo"];
$titu = $_POST["titulo"];
$anu = $_POST["anunciante"];
$tel = $_POST["telefono"];
$mai = $_POST["mail"];
$pre = $_POST["precio"];
$des = $_POST["descripcion"];
     
 
		    $consulta=mysqli_query($cn,"update anuncio SET titulo_anun='$titu', nombre_anun='$anu', tel_anun='$tel', mail_anun='$mai', precio_anun='$pre', descrip_anun='$des'  where cod_anun='$cod' ");
			 
			if($consulta == true ){
			header("location: ../pages/modificar_anuncio.php?cod=$cod");
			 	
			}else{
			header("location: ../pages/publicados.php");
			echo' <script language = javascript>alert("Ocurrio un error, intente de nuevo")</script>';
			}
		 	
			
?>
			