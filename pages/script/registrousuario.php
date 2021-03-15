<?php
include '../../script/conexion.php';
session_start();
$con=conexion();
 date_default_timezone_set('America/El_salvador');
$hoy = date("F j, Y"); 
// Tomar los campos provenientes del Formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];

$email = $_POST['email'];
$contra = $_POST['password'];

// Insertar campos en la Base de Datos
$result = mysqli_query($con,"INSERT INTO anunciante (nom_usu, ape_usu, email_usu, clav_usu, registro)
VALUES ('$nombre', '$apellido', '$email','$contra','$hoy')");


if ($result == false) {
  die('Error: ' . mysqli_error($con));
}else{

$consulta= mysqli_query($con,"SELECT * FROM anunciante ORDER BY cod_usu DESC LIMIT 1"); 
$fila = mysqli_fetch_assoc($consulta);


$_SESSION['codigo'] = $fila['cod_usu'];
$_SESSION['nombre'] = $fila['nom_usu'];
$_SESSION['apellido'] = $fila['ape_usu'];
$_SESSION['mail'] = $fila['email_usu'];
$_SESSION['clave'] = $fila['clav_usu'];

header("location: ../../index.php");
mysqli_close($con);
}


?>  
 