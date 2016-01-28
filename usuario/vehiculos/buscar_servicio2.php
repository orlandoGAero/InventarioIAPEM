<link rel = "stylesheet" type = "text/css" href = "../../css/style_table.css"/>

<?php

	include '../../librerias/conexion.php';
	include '../../librerias/encode.php';
	
	$crit = mysql_real_escape_string ($_REQUEST ['crit']);
		$en_crit = encode ("crit=$crit");

	if ( $crit != "")
	{
		$consulta = " SELECT sveh.*, pv.codigoNuevoV, pv.placas
					  FROM servicio_vehiculo AS sveh, planta_vehicular AS pv
					  WHERE placas LIKE '%$crit%'
					  	AND pv.codigoNuevoV = sveh.codigoNuevoV ";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);

		if ($filas==0) 
				{
					echo "<script>  alert ('No se encuentran registros con el criterio solicitado')</script>";

				} else {
							echo "<div id = 'icon_excel'>
											<a href = '../../excel/user/exl_servicio.php?$en_crit'>
												<img src='../../imagenes/excel2013.png' TITLE='Ver Excel'/>
											</a>
										  </div>";
										  
							echo "<center><table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
											<tr align = 'center'>
												<th> Clave Servicio </th>
												<th> Placas </th>
												<th> Fecha </th>
												<th> tipoServicio </th>
												<th> Costo </th>
												<th> Clave del Vehiculo </th>
											</tr>";

											for ($y=0; $y <$filas ; $y++) 
											{ 
												$IDservicio = mysql_result($ejecutar, $y, 'IDservicio');
												$fecha = mysql_result($ejecutar, $y, 'fecha');
												$tipo_serv = mysql_result($ejecutar, $y, 'tipoServicio');
													$tipo_serv = utf8_encode($tipo_serv);
												$costo = mysql_result($ejecutar, $y, 'costo');
												$codigoNuevoV = mysql_result($ejecutar, $y, 'codigoNuevoV');
												$placas = mysql_result($ejecutar, $y, 'placas');
													$placas = utf8_encode($placas);
											

												echo   "<tr align = 'center'>
																<td> $IDservicio </td>
																<td> $placas </td>
																<td> $fecha </td>
				                                                <td> $tipo_serv </td>
				                                                <td> $costo </td>
				                                                <td> $codigoNuevoV </td>
				                                        </tr> ";
                                        	}
		                }
		                     echo "</table></center>";
	}
?>