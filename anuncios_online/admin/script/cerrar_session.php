
<?php 
session_start();

if ($_SESSION)
{	
	session_destroy();
	echo '<script language = javascript>
	window.location="../index.php"
	</script>';}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor regístrese")
	window.location="../index.php"
	</script>';}
?>


