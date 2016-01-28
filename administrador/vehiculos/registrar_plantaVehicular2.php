<?php 

	include ('../../librerias/conexion.php');
	include ('../../librerias/quitar.php');

	//print_r($_REQUEST);
	$IDinmueble = mysql_real_escape_string (quitar($_REQUEST ['idI']));
	$IDcoordinacion = mysql_real_escape_string (quitar($_REQUEST ['idCo']));
	$IDresguardatario = mysql_real_escape_string (quitar($_REQUEST ['idR']));
	$fecha_ingreso = mysql_real_escape_string (quitar($_REQUEST ['fecha']));
	$codigoNuevo = mysql_real_escape_string (quitar($_REQUEST ['nuevoCod']));
	$codigoAnterior = mysql_real_escape_string (quitar($_REQUEST ['anteriorCod']));
	$modelo = mysql_real_escape_string (quitar($_REQUEST ['modelo']));
		$modelo = utf8_decode($modelo);
	$marca = mysql_real_escape_string (quitar($_REQUEST ['marca']));
		$marca = utf8_decode($marca);
	$color = mysql_real_escape_string (quitar($_REQUEST ['colorVe']));
		$color = utf8_decode($color);
	$placas = mysql_real_escape_string (quitar($_REQUEST ['placas']));
		$placas = utf8_decode($placas);
	$noSerie = mysql_real_escape_string (quitar($_REQUEST ['noserie']));
	$ano = mysql_real_escape_string (quitar($_REQUEST ['ano']));
	$fechaUltima_verificacion = mysql_real_escape_string (quitar($_REQUEST ['fecha_ultima_v']));
	$fechaProxima_verificacion = mysql_real_escape_string (quitar($_REQUEST ['fecha_proxima_v']));
	$fechaUltima_tenencia = mysql_real_escape_string (quitar($_REQUEST ['fecha_ultima_t']));
	$fechaProxima_tenencia = mysql_real_escape_string (quitar($_REQUEST ['fecha_proxima_t']));
	$noTarjetaCirculacion = mysql_real_escape_string (quitar($_REQUEST ['tarjeta']));
	$tipo_v = mysql_real_escape_string (quitar($_REQUEST['tipo_v']));
		$tipo_v = utf8_decode($tipo_v);
	$activo = mysql_real_escape_string(quitar($_REQUEST ['activo']));
	$idu = $_COOKIE['IDusuario'];

	$band = 0;
	
		include '../../librerias/libreriaauto.php';

	if ( $fecha_ingreso != "" && $codigoNuevo != "" && $modelo != "" && $marca != "" && 
			$placas != "" && $noSerie != "" && $ano != "" && $fechaUltima_verificacion != "" &&
			$fechaProxima_verificacion != "" && $fechaUltima_tenencia != "" && $fechaProxima_tenencia != "" &&
			$noTarjetaCirculacion != "" && $tipo_v != "" )
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

	if ($IDinmueble == "Seleccione..." && $IDcoordinacion == "Seleccione..." && $IDresguardatario == "Seleccione..." )
	{
		$band = 1;
		echo "<script>alert(' Seleccionar todos los datos antes de continuar')</script>";
	} else {
				if ( $IDinmueble == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar el Inmueble')</script>";
				}
				
				if ( $IDcoordinacion == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar la Coordinación')</script>";
				}
				
				if ( $IDresguardatario == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar el Responsable')</script>";
				}
			}
	
	if ( $band == 0)
	{
		if ( $codigoAnterior != "")
		{
			if (codigoAnterior($codigoAnterior)==1)
			{
				$band = 1;
				echo "<script>alert('Código Anterior no valido: $codigoAnterior')</script>";	
			}
			
			$consulta = " 	SELECT * 
							FROM planta_vehicular
							WHERE codigoAnterior = '$codigoAnterior' 
								AND codigoNuevoV != '$codigoNuevo' ";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
				
				if( $filas != 0)
				{
					$band = 1;
					echo "<script>alert('Codigo anterior duplicado: $codigoAnterior')</script>";
				}
		}
	}

	if ( $band == 0)
	{
		
		$modelo = mb_strtoupper ($modelo);
		$marca = mb_strtoupper ($marca);
		$color = mb_strtoupper($color);
		$tipo_v = mb_strtoupper($tipo_v);
			
		$insertar = " 	INSERT INTO planta_vehicular (codigoNuevoV,codigoAnterior,modelo,marca,color,placas,noSerie,ano,fechaUltima_verificacion,fechaProxima_verificacion,fechaUltima_tenencia,fechaProxima_tenencia,noTarjetaCirculacion,tipo_v,IDcoordinacion,IDresguardatario,servicio,fecha_ingreso,activo,IDusuario,fecha_mod,IDinmueble)
						VALUES ('$codigoNuevo','$codigoAnterior','$modelo','$marca','$color','$placas','$noSerie','$ano','$fechaUltima_verificacion','$fechaProxima_verificacion','$fechaUltima_tenencia','$fechaProxima_tenencia','$noTarjetaCirculacion','$tipo_v',$IDcoordinacion,$IDresguardatario,'No','$fecha_ingreso','$activo',$idu,NOW(),$IDinmueble) ";
		$ejecutar2 = mysql_query($insertar) or die (mysql_error());

		$modelo = utf8_encode($modelo);
		$marca = utf8_encode($marca);
		$placas = utf8_encode($placas);
		$tipo_v = utf8_encode($tipo_v);
		$color = utf8_encode($color);

		echo "<script>alert('Registro guardado correctamente')</script>";
	}
?>
			