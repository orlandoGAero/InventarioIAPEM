<link rel = "stylesheet" type = "text/css" href = "../../css/style_table.css"/>
<?php

	if ($_REQUEST['buscar'])
	{
		include '../../librerias/conexion.php';
		include '../../librerias/encode.php';
		include '../../librerias/quitar.php';
		
		$crit = mysql_real_escape_string(quitar($_REQUEST['buscar']));
			$crit = utf8_decode ($crit);

			if($crit != "")
			{
				$consultBuscar = "	SELECT tec.*, eqinf.IDeinformatico, eqinf.equipo_informatico, coor.IDcoordinacion, coor.coordinacion, resg.IDresguardatario, resg.nombre, resg.ap_paterno, resg.ap_materno, inmueble.IDinmueble, inmueble.nombre_sede
									FROM tecnologias AS tec, equipos_informaticos AS eqinf, coordinaciones AS coor, resguardatarios AS resg, bienes_inmuebles AS inmueble
									WHERE (eqinf.equipo_informatico LIKE '$crit%' OR tec.modelo LIKE '$crit%' OR tec.marca LIKE '$crit%') AND tec.activo = 'Si'
										AND eqinf.IDeinformatico = tec.IDeinformatico
										AND coor.IDcoordinacion = tec.IDcoordinacion
										AND resg.IDresguardatario = tec.IDresguardatario
										AND inmueble.IDinmueble = tec.IDinmueble ";

				$ejecutar = mysql_query($consultBuscar) or die (mysql_error());
				$filas = mysql_num_rows($ejecutar);
					$en_crit = encode("crit=$crit");
						
					
				if ($filas==0) 
				{
					echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros con el criterio tecleado</font></td></tr></table></center>";
				} else {
							echo "<div id = 'icon_excel'>
									<a href = '../../excel/user/exl_binformaticos.php?$en_crit'>
										<img src='../../imagenes/excel2013.png' TITLE='Ver Excel'/>
									</a>
								  </div>";
								  
							echo "<center><table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
											<tr aling = 'center'>
												<th> Codigo Nuevo </th>
												<th> Codigo Anterior </th>
												<th> Artículo </th>
												<th> Modelo </th>
												<th> Marca </th>
												<th> Color </th>
												<th> Caracteristicas </th>
												<th> Área de ubicación </th>
												<th> Fecha de Ingreso </th>
												<th> Coordinación </th>
												<th> Resguardatario </th>
												<th> Activo </th>
												<th> Inmueble </th>
											</tr> ";

													for ($y=0; $y <$filas ; $y++) 
													{ 
														$codNuevoT = mysql_result ($ejecutar, $y, 'codigoNuevoT');
															$en_codNuevoT = encode ("codigoNuevoT=$codNuevoT");
															$en_codNuevoT2 = encode ("codigoNuevoT=$codNuevoT");
														$codAnt = mysql_result($ejecutar, $y, 'codigoAnterior');
														$eq_inf = mysql_result($ejecutar, $y, 'equipo_informatico');
															$eq_inf = utf8_encode($eq_inf);
														$modelo = mysql_result($ejecutar, $y, 'modelo');
															$modelo = utf8_encode($modelo);
														$marca = mysql_result($ejecutar, $y, 'marca');
															$marca = utf8_encode($marca);
														$color = mysql_result($ejecutar, $y, 'color');
															$color = utf8_encode($color);
														$Caracteristicas = mysql_result($ejecutar, $y, 'caracteristicas');
															$Caracteristicas = utf8_encode($Caracteristicas);
														$area_u = mysql_result($ejecutar, $y, 'area_ubicacion');
															$area_u = utf8_encode($area_u);
														$fecha_in = mysql_result($ejecutar, $y, 'fecha_ingreso');
														$Coord = mysql_result($ejecutar, $y, 'coordinacion');
															$Coord = utf8_encode($Coord);
														$Nom = mysql_result($ejecutar, $y, 'nombre');
															$Nom = utf8_encode($Nom);
														$Ap = mysql_result($ejecutar, $y, 'ap_paterno');
															$Ap = utf8_encode($Ap);
														$Am = mysql_result($ejecutar, $y, 'ap_materno');
															$Am = utf8_encode($Am);
														$Resg = " $Nom $Ap $Am";	
														$activo = mysql_result($ejecutar, $y, 'activo');
														$Inmueble = mysql_result($ejecutar, $y, 'nombre_sede');
															$Inmueble = utf8_encode($Inmueble);


														echo "<tr aling = 'center'>
																<td> $codNuevoT </td>
																<td> $codAnt </td>
																<td> $eq_inf </td>
																<td> $modelo </td>
																<td> $marca </td>
																<td> $color </td>
																<td> $Caracteristicas </td>
																<td> $area_u </td>
																<td> $fecha_in </td>
																<td> $Coord </td>
																<td> $Resg </td>
																<td> $activo </td>
																<td> $Inmueble </td>
															</tr>";
													}
									echo "</table></center>";
						}
			}
	}
?>