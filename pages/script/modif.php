<?php			
			include '../../script/conexion.php';
            $con = conexion();			
			session_start();
			
			$cod = $_GET['cod'];
			$f = $_GET['f'];
			$consulta= mysqli_query($con,"SELECT * FROM anunciante WHERE cod_usu='".$cod."'"); 
            $fila = mysqli_fetch_assoc($consulta);
			
			$_SESSION['codigo'] = $fila['cod_usu'];
	        $_SESSION['nombre'] = $fila['nom_usu'];
			$_SESSION['mail'] = $fila['email_usu'];
			$_SESSION['clave'] = $fila['clav_usu'];	
			
			header("location: ../perfil.php?f=$f"); 
			
?>			