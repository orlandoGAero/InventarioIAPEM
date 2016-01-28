<?php
	echo"<link type='text/css' href='../../css/style_table.css' rel='stylesheet'/>";
	if($_REQUEST['buscar'])
	{
		include '../../librerias/conexion.php';
		include '../../librerias/encode.php';
		include '../../librerias/quitar.php';
		
		$crit = mysql_real_escape_string(quitar($_REQUEST['buscar']));
		
		$consulta = "SELECT bi.IDinmueble,bi.nombre_sede,bi.calle,bi.numero,bi.colonia,bi.cp,bi.ciudad,bi.telefono,bi.fecha_ingreso,bi.activo,r.nombre,r.ap_paterno,r.ap_materno,ea.tipo
					FROM bienes_inmuebles AS bi,resguardatarios AS r,estado_adquisicion AS ea
					WHERE (bi.nombre_sede LIKE '$crit%' OR bi.telefono LIKE '$crit%' OR bi.activo LIKE '$crit%' OR r.nombre LIKE '$crit%' OR r.ap_paterno LIKE '$crit%' OR r.ap_materno LIKE '$crit%' OR ea.tipo LIKE '$crit%')
					AND bi.activo='Si' AND r.IDresguardatario=bi.IDresguardatario AND ea.IDest_adq=bi.IDest_adq";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$cri = encode("crit=$crit");
		$filas = mysql_num_rows($ejecutar);
		
			if($filas==0)
			{
				echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros con el criterio tecleado</font></td></tr></table></center>";
			}
			else
			{
				echo "<div id='icon_excel'><a href='../../excel/admin/exl_Inmuebles.php?$cri'><img src='../../imagenes/excel2013.png' TITLE='Ver Excel'/></a></div>";
				echo"<center>
						<table border = '0' id='miTabla'>
							<tr>
								<th>Clave Inmueble</th>
								<th>Nombre</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Responsable</th>
								<th>Estado de Adquisición</th>
								<th>Fecha Ingreso</th>
								<th>Activo</th>
								<th>Documentos</th>
								<th>Acciones</th>
							</tr>";
							
							for($y=0;$y<$filas;$y++)
							{
								$idInm = mysql_result($ejecutar,$y,'IDinmueble');
								$j = encode("IDinmueble=$idInm");
								$k = encode("IDinmueble=$idInm");
								$nombre = mysql_result($ejecutar,$y,'nombre_sede');
								$nombre = utf8_encode($nombre);
								$calle = mysql_result($ejecutar,$y,'calle');
								$calle = utf8_encode($calle);
								$numero = mysql_result($ejecutar,$y,'numero');
								$colonia = mysql_result($ejecutar,$y,'colonia');
								$colonia = utf8_encode($colonia);
								$cp = mysql_result($ejecutar,$y,'cp');
								$ciudad = mysql_result($ejecutar,$y,'ciudad');
								$ciudad = utf8_encode($ciudad);
								
								if($numero=="S/N")
								{
									$direccion = "$calle $numero"." COL. $colonia"." C.P. $cp".", $ciudad, EDO. MÉXICO";
								}
								else
								{
									$direccion = "$calle"." No. $numero"." COL. $colonia"." C.P. $cp".", $ciudad, EDO. MÉXICO";
								}
								
								$telefono = mysql_result($ejecutar,$y,'telefono');
								$nomR = mysql_result($ejecutar,$y,'nombre');
								$nomR = utf8_encode($nomR);
								$apR = mysql_result($ejecutar,$y,'ap_paterno');
								$apR = utf8_encode($apR);
								$amR = mysql_result($ejecutar,$y,'ap_materno');
								$amR = utf8_encode($amR);
								$nombreR = "$nomR $apR $amR";
								$estado = mysql_result($ejecutar,$y,'tipo');
								$fechaIn = mysql_result($ejecutar,$y,'fecha_ingreso');
								$activo = mysql_result($ejecutar,$y,'activo');
								$i = encode("IDinmueble=$idInm&fecha_ingreso=$fechaIn&nombre_sede=$nombre&calle=$calle&numero=$numero&colonia=$colonia&cp=$cp&ciudad=$ciudad&telefono=$telefono&nombre=$nomR&ap_paterno=$apR&ap_materno=$amR&tipo=$estado&activo=$activo");
								
								$consultaDoc = "SELECT nombre,ruta FROM documentos_inmuebles WHERE IDinmueble=$idInm";
								$ejecutarDoc = mysql_query($consultaDoc) or die(mysql_error());
								$filasDoc = mysql_num_rows($ejecutarDoc);
									if($filasDoc!=0)
									{	
										echo"<tr>
												<td>$idInm</td>
												<td>$nombre</td>
												<td>$direccion</td>
												<td>$telefono</td>
												<td>$nombreR</td>
												<td><a href='ver_estado-adq.php?$i' TITLE='Ver detalle'>$estado</a></td>
												<td>$fechaIn</td>
												<td>$activo</td>
												<td>
													<a href='ver_documentos-Inm.php?$i'><img src='../../imagenes/documento arriba.png' ALT='Ver Documento' TITLE='Ver Documento' vspace=4 hspace=4/></a>
												</td>
												<td>
													<a href='modificar_Inmuebles.php?$j'><img src='../../imagenes/editar.png' TITLE='Modificar' /></a>
													<a href='eliminar_Inmuebles.php?$k'><img src='../../imagenes/delete.png' TITLE='Eliminar'/></a>
												</td>
											</tr>";
									}
									else
									{
										echo"<tr>
												<td>$idInm</td>
												<td>$nombre</td>
												<td>$direccion</td>
												<td>$telefono</td>
												<td>$nombreR</td>
												<td><a href='ver_estado-adq.php?$i' TITLE='Ver detalle'>$estado</a></td>
												<td>$fechaIn</td>
												<td>$activo</td>
												<td>
													<a href='ver_documentos-Inm.php?$i'><img src='../../imagenes/documento abajo.png' ALT='Sin Documento' TITLE='Sin Documento' vspace=4 hspace=4/></a>
												</td>
												<td>
													<a href='modificar_Inmuebles.php?$j'><img src='../../imagenes/editar.png' TITLE='Modificar' /></a>
													<a href='eliminar_Inmuebles.php?$k'><img src='../../imagenes/delete.png' TITLE='Eliminar'/></a>
												</td>
											</tr>";
									}
							}
					echo "</table></center>";
			}
	}
?>