<?php

	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	//print_r($_REQUEST);
	$IDeTec = mysql_real_escape_string(quitar($_REQUEST['IDeinformatico']));
	$nombreTec = mysql_real_escape_string(quitar($_REQUEST['equipo_informatico']));
		$nombreTec = utf8_decode($nombreTec);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = $_COOKIE['IDusuario']; 
	
	$band = 0;

		include '../../librerias/libreriaauto.php';
	
		if ($nombreTec != "")
		{
			if (autoTec($nombreTec)==1)
			{
				$nombreTec = utf8_encode($nombreTec);
				echo"<script>alert('Nombre no valido: $nombreTec')</script>";
				$band = 1;
			}
		
		} else {
					$band = 1;
					echo " <script> alert('Llenar toda la información antes de continuar') </script> ";
				}
				
		if ($band==0);
		{
			$consulta = " 	SELECT *
							FROM equipos_informaticos
							WHERE equipo_informatico = '$nombreTec' AND IDeinformatico != $IDeTec ";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
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