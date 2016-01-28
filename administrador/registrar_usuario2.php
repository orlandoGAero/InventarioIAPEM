<?php

	include '../librerias/conexion.php';
	include '../librerias/quitar.php';

	//print_r($_REQUEST);
	$idus = mysql_real_escape_string(quitar($_REQUEST ['IDu']));
	$nombre = mysql_real_escape_string(quitar($_REQUEST ['nombre']));
		$nombre = utf8_decode($nombre);
	$apPaterno = mysql_real_escape_string(quitar($_REQUEST ['ap_paterno']));
		$apPaterno = utf8_decode($apPaterno);
	$apMaterno = mysql_real_escape_string(quitar($_REQUEST ['ap_materno']));
		$apMaterno = utf8_decode($apMaterno);
	$correo = mysql_real_escape_string(quitar($_REQUEST ['correo']));
	$usuario = mysql_real_escape_string(quitar($_REQUEST ['usuario']));
	$password = mysql_real_escape_string(quitar($_REQUEST ['psw']));
		$password = md5($password);
	$confPassword = mysql_real_escape_string(quitar($_REQUEST ['conpsw']));
		$confPassword = md5($confPassword);
	$tipo = mysql_real_escape_string(quitar($_REQUEST ['tipo']));
	$activo = mysql_real_escape_string(quitar($_REQUEST ['activo']));

	$band = 0;

	include '../librerias/libreriaauto.php';

	if ( $nombre != "" && $apPaterno != "" && $apMaterno != "" && $correo != "" && $usuario != "" && $password != "" && $confPassword )
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
				$band = 1;
				echo " <script> alert('Llenar toda la información antes de continuar') </script> ";
			}
	if ($band == 0)
	{
		$consulta = " 	SELECT *
						FROM usuarios
						WHERE usuario = '$usuario' and IDusuario != '$idus'";
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
		 
		 } else {
		
					if ( $password != $confPassword )
					{
						$band = 1;
						echo " <script> alert('Verifica que la contraseña coincida') </script> ";
						
					}  elseif ($band == 0) {
	
											$nombre = mb_strtoupper ($nombre);
											$apPaterno = mb_strtoupper ($apPaterno);
											$apMaterno = mb_strtoupper ($apMaterno);

											$insertar  = " INSERT INTO usuarios (IDusuario,nombre,appat,ammat,correo,usuario,psw,tipo,activo)
														   VALUES ('$idus','$nombre','$apPaterno','$apMaterno','$correo','$usuario','$password','$tipo','$activo')";
											$ejecutar = mysql_query ($insertar) or die (mysql_error());
											
											$nombre = utf8_encode ($nombre); 
											$apPaterno = utf8_encode ($apPaterno);
											$apMaterno = utf8_encode ($apMaterno);
																						
											echo " <script> alert('El usuario $usuario se ha guardado correctamente') </script> ";						
								
											} 	
				}
?>