
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
	alert("No ha iniciado ninguna sesi�n, por favor reg�strese")
	window.location="../index.php"
	</script>';}
?>


