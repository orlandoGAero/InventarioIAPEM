<?php
	require_once('librerias/recaptchalib.php');
	include 'librerias/conexion.php';
	
	$band=0;
	
	$privatekey = "6LdZA-YSAAAAAEFrZDey3CKSX6ITR_bFDbbPzQca";
	$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_REQUEST["recaptcha_challenge_field"],
									$_REQUEST["recaptcha_response_field"]);

	if (!$resp->is_valid) 
	{
		echo " <script> alert(' El reCAPTCHA no se ha introducido correctamente. Regresa y vuelve a intentarlo') </script> ";
		
	}
	
	
		if(empty($_REQUEST['correo']))
		{
			echo"<script>alert('No has ingresado tu correo')</script>";
		}
		else
		{
			$email = $_REQUEST['correo'];			
			$consulta = mysql_query("SELECT usuario,correo FROM usuarios WHERE correo='$email'");
			if(mysql_num_rows($consulta))
			{
				$filas = mysql_fetch_assoc($consulta);//Devuelve un array asociativo que corresponde a la fila recuperada y mueve el puntero de datos interno hacia adelante.
				$usuario = $filas['usuario'];
				// Enviamos por email la nueva contraseña
				$remite_nombre = "Sistema de Inventario IAPEM"; // Tu nombre o el de tu página
				$remite_email = "-remitente-"; // tu correo
				$asunto = ("=?UTF-8?B?" . base64_encode("Recuperación de usuario") . "?="); //Asunto
				$mensaje = "El usuario recuperado es: <strong>".$usuario."</strong>";
				$cabeceras = "From: ".$remite_nombre." <".$remite_email.">rn";
				$cabeceras = $cabeceras."MIME-Version: 1.0" . "\r\n";
				$cabeceras = $cabeceras."Content-type: text/html; charset=UTF-8" . "\r\n";
				$enviar_email = mail($correo,$asunto,$mensaje,$cabeceras);
				if($enviar_email)
				{
					echo"<script>alert('El usuario ha sido enviado al correo ingresado: $email')</script>";
				}
				else
				{
					echo "<script>alert('No se ha podido enviar el email')</script>";
				}
			}
			else
			{
				echo "<script>alert('El correo ingresado: $email no fué encontrado')</script>";
			}
		}
	
?>