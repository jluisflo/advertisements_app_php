
<?php 
session_start();

if ($_SESSION)
{	
	session_destroy();
	header("location: ../index.php");
}else{

	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesi�n, por favor reg�strese")
	window.location="javascript:history.back(-1);"
	</script>';}
?>


