<?php
 include '../../../script/conexion.php';
$con = conexion();
date_default_timezone_set('America/El_salvador');
$hoy = date("F j, Y, g:i a"); 

    if($_POST["categoria"]){
	        $cate = $_POST['categoria'];
		    $consulta=mysql_query("insert into categorias (nombre,creacion) values('".$cate."','".$hoy."')",$con);
			if(mysql_affected_rows()>0){
			 echo '<script language = javascript>window.location="../pages/categorias.php"</script>';			
			}
			else{
			echo"error";
			}
			
	}


	
	
?>