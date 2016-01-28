<?php

	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	//print_r($_REQUEST);
	$IDeinformatico = mysql_real_escape_string(quitar($_REQUEST['IDeinformatico']));
	$nombreTec = mysql_real_escape_string(quitar($_REQUEST['equipo_informatico']));
			$nombreTec = utf8_decode($nombreTec);
	$activo =mysql_real_escape_string(quitar($_REQUEST['activo']));
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
				$band = 1 ;
				echo " <script> alert('Llenar toda la información antes de continuar') </script> ";
			}
				
		if ($band==0);
		{
			$consulta = " 	SELECT *
							FROM equipos_informaticos
							WHERE equipo_informatico = '$nombreTec' AND IDeinformatico != '$IDeinformatico' ";
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
			
			$insertar = " CALL modificaArtInf ($IDeinformatico,'$nombreTec','$activo',$idu) ";
			$ejecutar2 = mysql_query($insertar) or die (mysql_error());
			
			$nombreTec = utf8_encode($nombreTec);
			echo"<script>alert('Registro modificado correctamente')</script>";
		}

?>