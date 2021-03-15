<?php
include '../../script/conexion.php';	
$con = conexion();

 if (!$con){
 
$dato1 = 0;
$dato2 = 0;
$dato3 = 0;
$dato4 = 0;
 
  
 }else{

$totalanun = mysqli_query($con,"SELECT count(*) FROM anuncio");
$row = mysqli_fetch_row($totalanun);
$dato1 = $row['0'];

$totaluser = mysqli_query($con,"SELECT count(*) FROM usuario");
$row = mysqli_fetch_row($totaluser);
$dato2 = $row['0'];

$totalcate = mysqli_query($con,"SELECT count(*) FROM categorias");
$row = mysqli_fetch_row($totalcate);
$dato3 = $row['0'];

$totalanun = mysqli_query($con,"SELECT count(*) FROM anunciante");
$row = mysqli_fetch_row($totalanun);
$dato4 = $row['0'];

}












?>