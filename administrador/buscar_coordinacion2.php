<?php
	echo"<link type='text/css' href='../css/style_table.css' rel='stylesheet'/>";
	include '../librerias/conexion.php';
	include '../librerias/encode.php';
	include '../librerias/quitar.php';
	
	$crit = mysql_real_escape_string(quitar($_REQUEST['crit']));
		
		if($crit != "")
		{
			$consulta = "SELECT IDcoordinacion,coordinacion,activo
						FROM coordinaciones
						WHERE IDcoordinacion LIKE '$crit%' OR coordinacion LIKE '%$crit%' OR activo LIKE '$crit%'";
						
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
			$cri = encode("crit=$crit");
				if($filas==0)
				{
					echo "<script>alert('No exiten registros con el criterio tecleado')</script>";
					
				} else {
							echo "<div id='icon_excel'><a href='../excel/admin/exl_coordinacion.php?$cri'><img src='../imagenes/excel2013.png' TITLE='Ver Excel'/></a></div>";
							echo "<center><table border = '0' id = 'miTabla'>
											<tr aling = 'center'>
												<th> Clave Coordinación </th>
												<th> Coordinación </th>
												<th> Activo </th>
												<th> Acciones </th>
											</tr>";
											
												for($y=0;$y<$filas;$y++)
												{
														$idCo = mysql_result ($ejecutar,$y,'IDcoordinacion');
														$a = encode("IDcoordinacion=$idCo");/*Base64*/
														$b = encode("IDcoordinacion=$idCo");/*Base64*/
														$coordinacion = mysql_result ($ejecutar,$y,'coordinacion');
														$coordinacion = utf8_encode($coordinacion);
														$activo = mysql_result ($ejecutar,$y,'activo');
												
												
													echo   "<script>
															function asegurar ()
															  {
																  rc = confirm('¿Seguro que desea Eliminar o Desactivar?');
																  return rc;
															  }
															</script>
													
															<tr align = 'center'>
																<td> $idCo </td>
																<td> $coordinacion </td>
																<td> $activo </td>
																<td>
																	<a href='modificar_coordinacion.php?$a'><img src='../imagenes/editar.png' TITLE='Modificar' /></a>
																	<a href='eliminar_coordinacion.php?$b'><img src='../imagenes/delete.png' TITLE='Eliminar' onclick='javascript:return asegurar();'/></a>
																</td>
															</tr>";
												}
							
							echo "</table></center>";
					}
		}
?>