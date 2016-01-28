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
	
	
		if(empty($_REQUEST['nomUser']))
		{
			echo"<script>alert('No has ingresado el usuario')</script>";
		}
		else
		{
			$usuario = $_REQUEST['nomUser'];
			$usuario = trim($usuario);//Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
			
			$consulta = mysql_query("SELECT usuario,correo FROM usuarios WHERE usuario='$usuario'");
			if(mysql_num_rows($consulta))
			{
				$filas = mysql_fetch_assoc($consulta);//Devuelve un array asociativo que corresponde a la fila recuperada y mueve el puntero de datos interno hacia adelante.
				$num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña.
				$new_pass = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria.
				$usuario = $filas['usuario'];
				$pass = $new_pass; // la nueva contraseña que se enviará por correo al usuario.
				$pass2 = md5($pass); // encriptamos la nueva contraseña para guardarla en la BD.
				$correo = $filas['correo'];
				mysql_query("UPDATE usuarios SET pass='$pass2' WHERE usuario='$usuario'");// actualizamos los datos (contraseña) del usuario que solicitó su contraseña.
				// Enviamos por email la nueva contraseña
				$remite_nombre = "Sistema de Inventario IAPEM"; // Tu nombre o el de tu página
				$remite_email = "-remitente-"; // tu correo
				$asunto = ("=?UTF-8?B?" . base64_encode("Recuperación de contraseña") . "?="); //Asunto
				$mensaje = "Se ha generado una nueva contraseña para el usuario: <strong>".$usuario."</strong><br/>
				La nueva contraseña es: <strong>".$pass."</strong>";
				$cabeceras = "From: ".$remite_nombre." <".$remite_email.">rn";
				$cabeceras = $cabeceras."MIME-Version: 1.0" . "\r\n";
				$cabeceras = $cabeceras."Content-type: text/html; charset=UTF-8" . "\r\n";
				$enviar_email = mail($correo,$asunto,$mensaje,$cabeceras);
				if($enviar_email)
				{
					echo"<script>alert('La nueva contraseña ha sido enviada al correo asociado al usuario: $usuario')</script>";
				}
				else
				{
					echo "<script>alert('No se ha podido enviar el email')</script>";
				}
			}
			else
			{
				echo "<script>alert('El usuario ingresado: $usuario no fué encontrado')</script>";
			}
		}
	
?>