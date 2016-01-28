<?php
	# incluye libreria para conectarse al hosting y a la base de datos
	include '../../librerias/conexion.php';
	# incluye libreria para quitar caracteres no perminitidos que pueden ser inyectados dentro de la URL
	include '../../librerias/quitar.php';
	
	#Se reciben los datos con $_REQUEST y el usuario con $_COOKIE
	$IDeTec = mysql_real_escape_string(quitar($_REQUEST['IDeinformatico']));
	$nombreTec = mysql_real_escape_string(quitar($_REQUEST['equipo_informatico']));
		$nombreTec = utf8_decode($nombreTec);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = $_COOKIE['IDusuario']; 
	
	# La bandera 0 indica que todo lo que se valido es coorecto
	$band = 0;
		
		# Incluye la librería de autómatas para validar la información recibida
		include '../../librerias/libreriaauto.php';
	
		# Se valida que el campo nombre no este vacío
		if ($nombreTec != "")
		{
			# Si el nombre no es válido muestra un mensaje de error
			if (autoTec($nombreTec)==1)
			{
				$nombreTec = utf8_encode($nombreTec);
				echo"<script>alert('Nombre no valido: $nombreTec')</script>";
				$band = 1;
			}
		# Si no se reciben los datos muestra un mensaje de error
		} else {
					$band = 1;
					echo " <script> alert('Llenar toda la información antes de continuar') </script> ";
				}
				
		if ($band==0);
		{
			# Se realiza la consulta a la tabla equipos_informaticos, donde 
			$consulta = " 	SELECT *
							FROM equipos_informaticos
							WHERE equipo_informatico = '$nombreTec' AND IDeinformatico != $IDeTec ";
			# Ejecuta la consulta
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			# Cuenta las filas 
			$filas = mysql_num_rows($ejecutar);
				if ($filas !=0)
				{
					$band = 1;
					echo "<script> alert('El equipo informático $nombreTec ya se encuentra registrado ') </script>";
				}
		}
		
		if ($band==0)
		{
			$nombreTec = mb_strtoupper($nombreTec);
			
			$insertar = " 	INSERT INTO equipos_informaticos (equipo_informatico,activo,fecha_mod,IDusuario)
							VALUES ('$nombreTec','$activo',NOW(),$idu) ";
			$ejecutar = mysql_query($insertar) or die (mysql_error());
			
			$nombreTec = utf8_encode($nombreTec);
			echo"<script>alert('Registro guardado correctamente')</script>";
		}

?>