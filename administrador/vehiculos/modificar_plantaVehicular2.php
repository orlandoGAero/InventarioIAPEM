<?php

	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	//print_r($_REQUEST);
	$IDinmueble = mysql_real_escape_string(quitar($_REQUEST ['IDinmueble']));
	$IDcoord = mysql_real_escape_string(quitar($_REQUEST ['IDcoordinacion']));
	$IDresg = mysql_real_escape_string(quitar($_REQUEST ['IDresguardatario']));
	$fecha_in = mysql_real_escape_string(quitar($_REQUEST ['fecha']));
	$codigoNuevo = mysql_real_escape_string(quitar($_REQUEST ['nuevoCod']));
	$codigoAnterior = mysql_real_escape_string(quitar($_REQUEST ['anteriorCod']));
	$modelo = mysql_real_escape_string(quitar($_REQUEST ['modelo']));
		$modelo = utf8_decode($modelo);
	$marca = mysql_real_escape_string(quitar($_REQUEST ['marca']));
		$marca = utf8_decode($marca);
	$color = mysql_real_escape_string(quitar($_REQUEST ['colorVe']));
		$color = utf8_decode($color);
	$placas = mysql_real_escape_string(quitar($_REQUEST ['placas']));
		$placas = utf8_decode($placas);
	$noSerie = mysql_real_escape_string(quitar($_REQUEST ['noserie']));
	$ano = mysql_real_escape_string(quitar($_REQUEST ['ano']));
	$ultVer = mysql_real_escape_string(quitar($_REQUEST ['fecha_ultima_v']));
	$proVer = mysql_real_escape_string(quitar($_REQUEST ['fecha_proxima_v']));
	$ultTen = mysql_real_escape_string(quitar($_REQUEST ['fecha_ultima_t']));
	$proTen = mysql_real_escape_string(quitar($_REQUEST ['fecha_proxima_t']));
	$TarjetaCirculacion = mysql_real_escape_string(quitar($_REQUEST ['tarjeta']));
	$tipo_v = mysql_real_escape_string(quitar($_REQUEST ['tipo_v']));
		$tipo_v = utf8_decode($tipo_v);
	$activo = mysql_real_escape_string(quitar($_REQUEST ['activo']));
	$idu = $_COOKIE['IDusuario'];

	$band = 0;
		
		include '../../librerias/libreriaauto.php';

	if ( $fecha_in != "" && $codigoNuevo != "" && $modelo != "" && $marca != "" && 
			$placas != "" && $noSerie != "" && $ano != "" && $ultVer != "" &&
			$proVer != "" && $ultTen != "" && $proTen != "" &&
			$TarjetaCirculacion != "" && $tipo_v != "" )
	{
		if (codigoNuevo($codigoNuevo)==1)
		{
			$band = 1;
			echo "<script>alert('Código Nuevo no valido: $codigoNuevo')</script>";	
		}
	
		if (marca($marca)==1)
		{
			$band = 1;
			echo "<script>alert('Marca no valida: $marca')</script>";	
		}
		
		if (placas($placas)==1)
		{
			$band = 1;
			echo "<script>alert('Placas no valida: $placas')</script>";	
		}
		
		if (vin($noSerie)==1) 
		{
			$band = 1;
			echo "<script>alert('Número de serie no valido: $noSerie')</script>";	
		}
		
		if (year($ano)==1)
		{
			$band = 1;
			echo "<script>alert('Año no valido: $ano')</script>";	
		}
		
		if (tipoV($tipo_v)==1)
		{
			$band = 1;
			$tipo_v = utf8_encode ($tipo_v);
			echo "<script>alert('Tipo de vehículo no valido: $tipo_v')</script>";
		}
	} else {
				$band = 1;
				echo "<script>alert(' Llenar toda la información antes de continuar')</script>";	
			}
			
		if ($color != "")
		{	
			if (color($color)==1)
			{
				$color = utf8_encode ($color);
				$band = 1;
				echo"<script>alert('Color no valido: $color')</script>";

			}
		}

		if ($codigoAnterior != "") 
		{
	
			if ( $band == 0)
			{
				$consulta = " 	SELECT * 
								FROM planta_vehicular
								WHERE codigoAnterior = '$codigoAnterior' 
									AND codigoNuevoV != '$codigoNuevo' ";
				$ejecutar = mysql_query($consulta) or die (mysql_error());
				$filas = mysql_num_rows($ejecutar);
					
					if (codigoAnterior($codigoAnterior)==1)
					{
						$band = 1;
						echo "<script>alert('Código Anterior no valido: $codigoAnterior')</script>";	
					}
				
					if( $filas != 0)
					{
						$band = 1;
						echo "<script>alert('Codigo anterior duplicado: $codigoAnterior')</script>";
					}
			}
		}

	if ($band ==0)
	{
		
		$modelo = mb_strtoupper ($modelo);
		$marca = mb_strtoupper ($marca);
		$color = mb_strtoupper($color);
		$tipo_v = mb_strtoupper($tipo_v);
		
		$modificar = " CALL modificarVehiculos('$codigoNuevo','$codigoAnterior','$modelo','$marca','$color','$placas','$noSerie','$ano','$ultVer','$proVer','$ultTen','$proTen','$TarjetaCirculacion','$tipo_v',$IDcoord,$IDresg,'$fecha_in','$activo',$idu,$IDinmueble) ";
		$ejecutar2 = mysql_query($modificar) or die (mysql_error());
		
		$modelo = utf8_encode($modelo);
		$marca = utf8_encode($marca);
		$placas = utf8_encode($placas);
		$tipo_v = utf8_encode($tipo_v);
		$color = utf8_encode($color);
		
		echo "<script>alert('Registro modificado correctamente')</script>";
	}
?>