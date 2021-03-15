<?php 
//Proceso de conexión con la base de datos
include '../../script/conexion.php';
session_start();
$con= conexion();

//Inicio de variables de sesión


//Recibir los datos ingresados en el formulario
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

//Consultar si los datos son están guardados en la base de datos
$consulta=  mysqli_query($con,"SELECT * FROM usuario WHERE nom_usuario='".$usuario."' AND pass_usuario='".$contra."'"); 
 
$fila = mysqli_fetch_array($consulta);


if (!$fila) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script>window.location="../reintentar.php"</script>';
}
else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['codigo'] = $fila['cod_usuario'];
	$_SESSION['nombre'] = $fila['nom_usuario'];
	$_SESSION['nivel'] = $fila['nivel_usuario'];
	 
	

	echo '<script language = javascript>
	window.location="../pages/dashboard.php"
	</script>';
}
?>