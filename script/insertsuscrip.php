<?php

include 'conexion.php';

$con=conexion();

$mail=$_POST['mail'];
$name=$_POST['name'];

if (!empty($mail and $name)){

	$res=mysqli_query($con,"insert into sub_noticia (nombre_sub,mail_sub) values('".$name."','".$mail."')");
}




?>
 