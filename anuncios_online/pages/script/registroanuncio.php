<?php
require '../../script/conexion.php';
include '../../script/fecha.php';
session_start();
$con = conexion();



 
 if (!$_SESSION['nombre'])

{
// Tomar los campos provenientes del Formulario
$cate = $_POST['categoria'];
$seccion = $_POST['radio'];
$titu = $_POST['titulo'];
$descrip = $_POST['descripcion'];
$tip = $_POST['tipo'];
$prec = $_POST['precio'];
$cod = "";
$soy = $_POST['gender'];
$nom = $_POST['nombre'];
$mail = $_POST['mailcontact'];
$tel = $_POST['telefono'];
$ubi = $_POST['ubicacion'];

}else{

$cate = $_POST['categoria'];
$seccion = $_POST['radio'];
$titu = $_POST['titulo'];
$descrip = $_POST['descripcion'];
$tip = $_POST['tipo'];
$prec = $_POST['precio'];
$cod = $_SESSION['codigo'];
$soy = $_POST['gender'];
$nom = $_SESSION['nombre'];
$mail = $_SESSION['mail'];
$tel = $_POST['telefono'];
$ubi = $_POST['ubicacion'];

}

  // CONVIERTE IMAGEN 1
   
  $tmpName  = $_FILES['file1']['tmp_name'];
  $fileSize = $_FILES['file1']['size'];
  $tipo1 = $_FILES['file1']['type'];
        
  $fp = fopen($tmpName, 'r');
  $contenido1 = fread($fp, $fileSize);
  $contenido1 = addslashes($contenido1);
  fclose($fp);
        
 
  
  // CONVIERTE IMAGEN 1
  
  $tmpName  = $_FILES['file2']['tmp_name'];
  $fileSize = $_FILES['file2']['size'];
  $tipo2 = $_FILES['file2']['type'];
        
  $fp = fopen($tmpName, 'r');
  $contenido2 = fread($fp, $fileSize);
  $contenido2 = addslashes($contenido2);
  fclose($fp);
        
  
    
 	
	
	// Insertar campos en la Base de Datos
$result = mysqli_query($con,"INSERT INTO anuncio (categoria,seccion,titulo_anun,descrip_anun,tipo_venta,precio_anun,tipo1,foto1,tipo2,foto2,tipo_vendedor,cod_usu,nombre_anun,mail_anun,tel_anun,fecha_anun,hora_anun,ubicacion)
VALUES ('$cate','$seccion','$titu','$descrip','$tip','$prec','$tipo1','$contenido1','$tipo2','$contenido2','$soy','$cod','$nom','$mail','$tel','$hoy','$hora','$ubi')");



if($result == true){
    
   $id_generado = mysqli_insert_id($con); 
   
   $id_encode = base64_encode($id_generado);

   $link_generado = "http://localhost/anuncios_online/pages/anuncio.php?cod=$id_encode";

   if (!isset($_SESSION['nombre'])){
    
    $link_borrar = "http://localhost/anuncios_online/script/borrar.php?cod=$id_encode";
    $borrar_message = "Si deseas eliminar el anuncio accede a esta direccion: $link_borrar";

   }

   $subject = "Anuncio publicado";

   $message= "
   <div width='100%' style='background:#2196f3'; padding:10px;><FONT FACE='arial' heigth='50px' SIZE=5 COLOR=white>Marketplace</FONT></div>
   <pre>
   </pre>

   <FONT size='3'>
   Hola <font color='#2196f3'>$nom</font>: Te informamos que tu anuncio ya esta registrado y disponible. <br> Esta es la direccion para acceder al anuncio: $link_generado <br>
   </FONT> <br>
   <FONT size='3'>
    $borrar_message
   </FONT>
   <pre>

   </pre>
  <hr color='#2196f3' >
   Gracias por utilizar nuestros servicios.";
   
   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

   mail($mail,$subject,$message,$cabeceras);

  header("location: ../anuncio.php?cod=$id_encode");
}else{
  echo "<div style='text-align:center; padding-top:150px; color:gray;'>";
  echo "<h1>Disculpe los inconvenientes</h1>";
  echo "<h2>ERROR AL PUBLICAR EL ANUNCIO! <strong>:( </strong></h2>";
  echo "Vuelva a intentarlo mas tarde por favor <a href='../publicar.php'>Aqui</a>";
  echo "</div>";  
 

}
  
mysqli_close($con);
exit;

?> 
