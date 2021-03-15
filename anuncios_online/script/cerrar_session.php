
<?php 
session_start();

if ($_SESSION)
{	
	session_destroy();
	header("location: ../index.php");
}else{

	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor regístrese")
	window.location="javascript:history.back(-1);"
	</script>';}
?>


