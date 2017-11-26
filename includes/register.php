<?php
	include("conexion.php");
	
	$email = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL);
	$nombre = filter_var($_REQUEST['nombre'], FILTER_SANITIZE_STRING);
	$apellido = filter_var($_REQUEST['apellido'], FILTER_SANITIZE_STRING);
	$tipo_user = filter_var($_REQUEST['tipo'], FILTER_VALIDATE_INT);
	$contrasena = filter_var($_REQUEST['contrasena'], FILTER_SANITIZE_STRING);
	
	
	$consulta = " SELECT email FROM usuarios WHERE email = '".$email."' limit 1;";
	$rscon = mysqli_query($db, $consulta);
		if ($rscon){
			$r = mysqli_fetch_array($rscon);
			if ($r['email'] == $email){
				header("location: ../index.php?e=true");
				die();
			}
			
		}

	

		$sql= " INSERT INTO usuarios (nombre, apellido, email, tipo_user, contrasena) VALUES ('" . $nombre . "' ,'  " . $apellido . "' , '" . $email . "' , '" . $tipo_user . "' , '" . md5($contrasena) ."'); ";
		$rs = mysqli_query($db, $sql);
		if ($rs){
			header("location: ../index.php?r=true");
				die();
			}	
	
?>