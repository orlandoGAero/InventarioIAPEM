<?php

	include '../librerias/conexion.php';
	include '../librerias/quitar.php';
	
		$idu = mysql_real_escape_string (quitar($_REQUEST ['IDu']));
		$nombre = mysql_real_escape_string (quitar($_REQUEST ['nombre']));
			$nombre = utf8_decode($nombre); 
		$apPaterno = mysql_real_escape_string (quitar($_REQUEST ['ap_paterno']));
			$apPaterno = utf8_decode($apPaterno);
		$apMaterno = mysql_real_escape_string (quitar($_REQUEST ['ap_materno']));
			$apMaterno = utf8_decode($apMaterno);
		$correo = mysql_real_escape_string (quitar($_REQUEST ['correo']));
		$usuario = mysql_real_escape_string (quitar($_REQUEST ['usuario']));
		$tipo = mysql_real_escape_string (quitar($_REQUEST ['tipo']));
		$activo = mysql_real_escape_string (quitar($_REQUEST ['activo']));
		
		$band = 0;
		
		include '../librerias/libreriaauto.php';
		
		if ($nombre != "" && $apPaterno != "" && $apMaterno != "" && $usuario )
		{
			if (nombre($nombre)==1)
		{
			$nombre = utf8_encode ($nombre);
			$band = 1;
			echo "<script>alert('Nombre no valido: $nombre')</script>";
		}
		
		if (apPat($apPaterno)==1)
		{
			$apPaterno = utf8_encode ($apPaterno);
			$band = 1;
			echo "<script>alert('Apellido Paterno no valido: $apPaterno')</script>";
		}
		
		if (apMat($apMaterno)==1)
		{
			$apMaterno = utf8_encode ($apMaterno);
			$band = 1;
			echo "<script>alert('Apellido Materno no valido: $apMaterno')</script>";
		}

		if (email($correo)==1)
			{
				$band = 1;
				echo "<script>alert('Correo no valido: $correo')</script>";
			}
			
		} else {
					echo "<script> alert('Llenar toda la información antes de continuar') </script>";
				}
				
		if ($band == 0)
		{
			$consulta = " 	SELECT *
							FROM usuarios
							WHERE usuario = '$usuario' and IDusuario != '$idu'";
			$ejecutar = mysql_query ($consulta) or die (mysql_error());
			$filas = mysql_num_rows ($ejecutar);
				if ( $filas != 0)
				{
					$band = 1;
					echo " <script> alert('El usuario $usuario ya esta disponible') </script> ";				
				}
		}

	require_once('../librerias/recaptchalib.php');
	  
	  $privatekey = "6LdZA-YSAAAAAEFrZDey3CKSX6ITR_bFDbbPzQca";
	  $resp = recaptcha_check_answer ($privatekey,
	                                $_SERVER["REMOTE_ADDR"],
	                                $_REQUEST["recaptcha_challenge_field"],
	                                $_REQUEST["recaptcha_response_field"]);
		
		if (!$resp->is_valid)
		{
			echo " <script> alert(' El reCAPTCHA no se ha introducido correctamente. Regresa y vuelve a intentarlo') </script> ";
		} elseif ($band == 0) 
							{
									$nombre = mb_strtoupper ($nombre);
									$apPaterno = mb_strtoupper ($apPaterno);
									$apMaterno = mb_strtoupper ($apMaterno);
									
									$modificar = " CALL modificarUsuario ($idu,'$nombre','$apPaterno','$apMaterno','$correo','$usuario','$tipo','$activo')";
									$ejecutar = mysql_query ($modificar) or die (mysql_error());
									
									$nombre = utf8_encode ($nombre);
									$apPaterno = utf8_encode ($apPaterno);
									$apMaterno = utf8_encode ($apMaterno);
									
									echo " <script> alert('El usuario $usuario se ha modificado correctamente') </script> ";						
							}
				
?>