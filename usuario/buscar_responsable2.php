<?php
	echo"<link type='text/css' href='../css/style_table.css' rel='stylesheet'/>";
	include '../librerias/conexion.php';
	include '../librerias/encode.php';
	include '../librerias/quitar.php';
	
	$crit = mysql_real_escape_string(quitar($_REQUEST['crit']));
		
		if($crit != "")
		{
			$consulta = "SELECT IDresguardatario,nombre,ap_paterno,ap_materno,cargo,tel_part,tel_iapem,activo
						FROM resguardatarios
						WHERE IDresguardatario LIKE '$crit%' OR nombre LIKE '$crit%' OR ap_paterno LIKE '$crit%' OR ap_materno LIKE '$crit%' OR cargo LIKE '$crit%' OR tel_part LIKE '$crit%' OR activo LIKE '$crit%'";
						
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
			$cri = encode("crit=$crit");
				if($filas==0)
				{
					echo "<script>alert('No exiten registros con el criterio tecleado')</script>";
					
				} else {
							echo "<div id='icon_excel'><a href='../excel/user/exl_responsable.php?$cri'><img src='../imagenes/excel2013.png' TITLE='Ver Excel'/></a></div>";
							echo "<center><table border = '0' id='miTabla'>
											<tr aling = 'center'>
												<th> Clave Responsable </th>
												<th> Nombre </th>
												<th> Apellido Paterno </th>
												<th> Apellido Materno </th>
												<th> Cargo </th>
												<th> Teléfono Particular </th>
												<th> Extensión IAPEM </th>
												<th> Activo </th>
											</tr>";
											
												for($y=0;$y<$filas;$y++)
												{
														$idR = mysql_result ($ejecutar,$y,'IDresguardatario');
														$c = encode("IDresguardatario=$idR");/*Base64*/
														$d = encode("IDresguardatario=$idR");/*Base64*/
														$nombre = mysql_result ($ejecutar,$y,'nombre');
														$nombre = utf8_encode($nombre);
														$ap = mysql_result ($ejecutar,$y,'ap_paterno');
														$ap = utf8_encode($ap);
														$am = mysql_result ($ejecutar,$y,'ap_materno');
														$am = utf8_encode($am);
														$cargo = mysql_result ($ejecutar,$y,'cargo');
														$cargo = utf8_encode($cargo);
														$telPart = mysql_result ($ejecutar,$y,'tel_part');
														$telIAPEM = mysql_result ($ejecutar,$y,'tel_iapem');
														$activo = mysql_result ($ejecutar,$y,'activo');
																										
													echo   "<tr align = 'center'>
																<td> $idR </td>
																<td> $nombre </td>
																<td> $ap </td>
																<td> $am </td>
																<td> $cargo </td>
																<td> $telPart </td>
																<td> $telIAPEM </td>
																<td> $activo </td>
															</tr>";
												}
							
							echo "</table></center>";
					}
		}
?>