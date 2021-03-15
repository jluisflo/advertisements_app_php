<?php
include 'conexion.php';

$con = conexion();

$cod = $_GET['cod'];

$id = base64_decode($cod);

$consul = mysqli_query($con,"SELECT con_anun FROM anuncio WHERE cod_anun='$id'");

if (mysqli_num_rows($consul) == 0){

	echo "No hemos encontrado el anuncio, el anuncio ya fue eliminado.";

}else{

$query = mysqli_query($con,"DELETE FROM anuncio WHERE cod_anun = '$id'");

if ($query == True){

	echo "Tu anuncio ha sido eliminado exitosamente. <br>
            GRACIAS POR UTILIZAR NUESTROS SERVICIOS";

}else{
   
   echo "UPS. Vuelve a intentarlo mas tarde";

}

}



?>