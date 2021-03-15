<?php 
//Proceso de conexión con la base de datos
include 'conexion.php';
session_start();
$con= conexion();

//Inicio de variables de sesión


//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['contra'];

//Consultar si los datos son están guardados en la base de datos
$consulta= mysqli_query($con,"SELECT * FROM anunciante WHERE email_usu='".$usuario."' AND clav_usu='".$contrasena."'"); 
 
 
$fila = mysqli_fetch_assoc($consulta);

if (!$fila)  //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
 
	  header("location: reintentar.php");
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['codigo'] = $fila['cod_usu'];
	$_SESSION['nombre'] = $fila['nom_usu'];
	$_SESSION['apellido'] = $fila['ape_usu'];
	$_SESSION['mail'] = $fila['email_usu'];
	$_SESSION['clave'] = $fila['clav_usu'];
	
    header("location: ../index.php");
	 
}
?>