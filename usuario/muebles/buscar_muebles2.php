<?php
	echo"<link type='text/css' href='../../css/style_table.css' rel='stylesheet'/>";
	include '../../librerias/conexion.php';
	include '../../librerias/encode.php';
	include '../../librerias/quitar.php';
	
	$crit = mysql_real_escape_string(quitar($_REQUEST['crit']));
		
		if($crit != "")
		{
			$consulta = "SELECT IDmueble,nombre,activo
						FROM muebles
						WHERE IDmueble LIKE '$crit%' OR nombre LIKE '$crit%' OR activo LIKE '$crit%'";
						
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
			
				if($filas==0)
				{
					echo "<script>alert('No exiten registros con el criterio tecleado')</script>";
					
				} else {
							echo "<center><table border = '0' id = 'miTabla'>
											<tr>
												<th> Clave Mueble </th>
												<th> Artículo </th>
												<th> Activo </th>
											</tr>";
											
												for($y=0;$y<$filas;$y++)
												{
														$idM = mysql_result ($ejecutar,$y,'IDmueble');
														$e = encode("IDmueble=$idM");
														$f = encode("IDmueble=$idM");
														$nomM = mysql_result ($ejecutar,$y,'nombre');
														$nomM = utf8_encode($nomM);
														$activo = mysql_result ($ejecutar,$y,'activo');
																																								
													echo   "<tr align = 'center'>
																<td> $idM </td>
																<td> $nomM </td>
																<td> $activo </td>
															</tr>";
												}
							
							echo "</table></center>";
						}
		}
?>