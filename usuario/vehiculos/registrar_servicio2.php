<?php

	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	//print_r($_REQUEST);
	$codigoNuevoV = mysql_real_escape_string (quitar($_REQUEST ['codigoNuevoV']));
	$fecha = mysql_real_escape_string (quitar($_REQUEST ['fechaS']));
	$tipo_s = mysql_real_escape_string (quitar($_REQUEST ['tipo_servicio']));
		$tipo_s = utf8_decode ($tipo_s);
	$costo = mysql_real_escape_string (quitar($_REQUEST ['costo']));

	$band = 0;
		
		include '../../librerias/libreriaauto.php';
		
		if ($fecha != "" && $tipo_s != "" && $costo != "")
		{
			/*automata tipo servicio*/
			
			if (costo($costo)==1)
			{
				$band = 1;
				echo " <script> alert('Costo no valido: $costo') </script> ";
				
			}
		} else {
					$band = 1;
					echo " <script> alert('Llenar toda la información antes de continuar') </script> ";
				}
				
		if ($codigoNuevoV == 'Seleccione...' )
		{
			$band = 1;
			echo "<script>alert('Seleccionar el Vehículo antes de continuar')</script>";
		}
		
		if ( $band == 0 )
		{

			$tipo_s = mb_strtoupper($tipo_s);
			
			$consulta = " INSERT INTO servicio_vehiculo (fecha,tipoServicio,costo,codigoNuevoV)
						  VALUES ('$fecha','$tipo_s',$costo,'$codigoNuevoV') ";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			
				$tipo_s = utf8_encode ($tipo_s);
			
			$actualizar = " UPDATE planta_vehicular
							SET servicio = 'Si'
							WHERE codigoNuevoV = '$codigoNuevoV' ";
			$ejecutar2 = mysql_query ($actualizar) or die (mysql_error());

			echo"<script>alert('Servicio guardado correctamente')</script>";
		}
?>