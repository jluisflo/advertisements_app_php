<?php
 
$destino = $_POST['des'];

$mail = $_POST['mail'];
$telefono = $_POST['tele'];
$nombre = $_POST['nom'];
$message = $_POST['men']. "<br>";
$subject = $_POST['tit'];



if (($_POST['mail']) and ($_POST['men'])) {
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
  if (!empty($telefono)){
  	$message.= "Este es mi telefono: $telefono";
  }  
  
   
  
    mail($destino,$subject,$message,$cabeceras);
    }
 

 

?>  