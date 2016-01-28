<link rel = "stylesheet" type = "text/css" href = "../../css/style_table.css"/>

<?php
	
	if ($_REQUEST['buscar'])
	{
		include '../../librerias/conexion.php';
		include '../../librerias/encode.php';
		include '../../librerias/quitar.php';
		
		$crit = mysql_real_escape_string (quitar($_REQUEST ['buscar']));
			$crit = utf8_decode ($crit);
			
			if ($crit != "")
			{
				$consulta = " SELECT pve.*, coor.coordinacion, resg.nombre, resg.ap_paterno, resg.ap_materno, inmueble.nombre_sede
								FROM planta_vehicular AS pve, coordinaciones AS coor, resguardatarios AS resg, bienes_inmuebles AS inmueble
								WHERE (codigoNuevoV LIKE '$crit%' OR placas LIKE '$crit%'
										OR modelo LIKE '$crit%' OR marca LIKE '$crit%'
										OR noSerie LIKE '$crit%') AND pve.activo = 'Si'
									AND coor.IDcoordinacion = pve.IDcoordinacion
									AND resg.IDresguardatario = pve.IDresguardatario
									AND inmueble.IDinmueble = pve.IDinmueble";
							
				$ejecutar = mysql_query($consulta) or die (mysql_error());
				$filas = mysql_num_rows($ejecutar);
					$en_crit = encode("crit=$crit");
				
				if ($filas==0) 
					{
						echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros con el criterio tecleado</font></td></tr></table></center>";
					} else {
								echo "<div id = 'icon_excel'>
									<a href = '../../excel/admin/exl_vehiculos.php?$en_crit'>
										<img src='../../imagenes/excel2013.png' TITLE='Ver Excel'/>
									</a>
								  </div>";
								  
								echo "<center><table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
												<tr aling = 'center'>
													<th> Codigo Nuevo </th>
													<th> Codigo Anterior </th>
													<th> Modelo </th>
													<th> Marca </th>
													<th> Color </th>
													<th> Placas </th>
													<th> No. Serie </th>
													<th> Año </th>
													<th> Ultima verificación </th>
													<th> Próxima verificación  </th>
													<th> Ultima Tenencia </th>
													<th> Próxima Tenencia </th>
													<th> Tarjeta de Circulación </th>
													<th> Tipo </th>
													<th> Fecha Ingreso </th>
													<th> Inmueble </th>
													<th> Coordinación </th>
													<th> Resguardatario </th>
													<th> Servicio </th>
													<th> Activo </th>
													<th> Acciones </th>
												</tr>";
				
													
								
											for($y=0;$y<$filas;$y++)
												
											{
													$codigoNuevo = mysql_result ($ejecutar, $y, 'codigoNuevoV');
														$en_codigoNuevoV = encode ("codigoNuevoV=$codigoNuevo");
														$en_codigoNuevoV2 = encode ("codigoNuevoV=$codigoNuevo");
													$CodigoAnterior	= mysql_result($ejecutar, $y, 'CodigoAnterior');	
													$modelo = mysql_result($ejecutar, $y, 'modelo');
														$modelo = utf8_encode($modelo);
													$marca = mysql_result($ejecutar, $y, 'marca');
														$marca = utf8_encode($marca);
													$color = mysql_result($ejecutar, $y, 'color');
														$color = utf8_encode($color);
													$placas = mysql_result ($ejecutar, $y, 'placas');
														$placas = utf8_encode($placas);
													$noserie = mysql_result($ejecutar, $y, 'noSerie');
													$ano = mysql_result($ejecutar, $y, 'ano');
													$fechaUltVer = mysql_result($ejecutar, $y, 'fechaUltima_verificacion');
													$fechaProVer = mysql_result($ejecutar, $y, 'fechaProxima_verificacion');
													$fechaUltTen = mysql_result($ejecutar, $y, 'fechaUltima_tenencia');
													$fechaProTen = mysql_result($ejecutar, $y, 'fechaProxima_tenencia');
													$NoTarjeta = mysql_result($ejecutar, $y, 'noTarjetaCirculacion');
													$tipo = mysql_result($ejecutar, $y, 'tipo_v');
														$tipo = utf8_encode($tipo);
													$Coord = mysql_result($ejecutar, $y, 'coordinacion');
														$Coord = utf8_encode($Coord);
													$Nom = mysql_result($ejecutar, $y, 'nombre');
														$Nom = utf8_encode($Nom);
													$Ap = mysql_result($ejecutar, $y, 'ap_paterno');
														$Ap = utf8_encode($Ap);
													$Am = mysql_result($ejecutar, $y, 'ap_materno');
														$Am = utf8_encode($Am);
													$Resg = " $Nom $Ap $Am";
													$servicio = mysql_result($ejecutar, $y, 'servicio');
													$fecha_in = mysql_result($ejecutar, $y, 'fecha_ingreso');
													$activo = mysql_result ($ejecutar, $y, 'activo');
													$Inmueble = mysql_result($ejecutar, $y, 'nombre_sede');
														$Inmueble = utf8_encode($Inmueble);

													echo   "<script>
																function asegurar ()
																  {
																	  rc = confirm('¿Seguro que desea Eliminar o Desactivar?');
																	  return rc;
																  }
															</script>";
				
													echo   "<tr aling = 'center'>
																<td> $codigoNuevo </td>
																<td> $CodigoAnterior </td>
																<td> $modelo </td>
																<td> $marca </td>
																<td> $color </td>
																<td> $placas </td>
																<td> $noserie </td>
																<td> $ano </td>
																<td> $fechaUltVer </td>
																<td> $fechaProVer </td>
																<td> $fechaUltTen </td>
																<td> $fechaProTen </td>
																<td> $NoTarjeta </td>
																<td> $tipo </td>
																<td> $fecha_in </td>
																<td> $Inmueble </td>
																<td> $Coord </td>
																<td> $Resg </td>
																<td> $servicio </td>
																<td> $activo </td>
																<td> <a href = 'modificar_plantaVehicular.php?$en_codigoNuevoV'><img src='../../imagenes/editar.png' TITLE='Modificar' /></a>
																	 <a href='eliminar_plantaVehicular.php?$en_codigoNuevoV2'><img src='../../imagenes/delete.png' TITLE='Eliminar' onclick='javascript:return asegurar();'/></a>
																</td>
																
															</tr>";
											}
								
								echo "</table></center>";
							}
	}		}
?>
