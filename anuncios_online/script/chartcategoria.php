<?php
include 'conexion.php';

$con=conexion();

$smar=mysqli_query($con,"select count(*) from anuncio where categoria like '%smartphones y tablets%'");
$reg = mysqli_fetch_array($smar) ;
$cantidad1 = $reg['count(*)'] ; 

$elec=mysqli_query($con,"select count(*) from anuncio where categoria like '%Electronicos%';");
$reg = mysqli_fetch_array($elec) ;
$cantidad2 = $reg['count(*)'] ; 

$aut=mysqli_query($con,"select count(*) from anuncio where categoria like '%Autos y motos%';");
$reg = mysqli_fetch_array($aut) ;
$cantidad3 = $reg['count(*)'] ; 

$hog=mysqli_query($con,"select count(*) from anuncio where categoria like '%Hogar y jardin%';");
$reg = mysqli_fetch_array($hog) ;
$cantidad4 = $reg['count(*)'] ; 

$moda=mysqli_query($con,"select count(*) from anuncio where categoria like '%Moda y belleza%';");
$reg = mysqli_fetch_array($moda) ;
$cantidad5 = $reg['count(*)'] ; 

$arti=mysqli_query($con,"select count(*) from anuncio where categoria like '%Articulos coleccionables%';");
$reg = mysqli_fetch_array($arti) ;
$cantidad6 = $reg['count(*)'] ; 

$ani=mysqli_query($con,"select count(*) from anuncio where categoria like '%Animales y mascotas%';");
$reg = mysqli_fetch_array($ani) ;
$cantidad7 = $reg['count(*)'] ;

$equi=mysqli_query($con,"select count(*) from anuncio where categoria like '%Equipamiento y herramientas%';");
$reg = mysqli_fetch_array($equi) ;
$cantidad8 = $reg['count(*)'] ;
 
 ?>