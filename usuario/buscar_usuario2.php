<link rel = "stylesheet" type = "text/css" href = "../css/style_table.css"/>
<?php

	include '../librerias/conexion.php';
	include '../librerias/encode.php';
	include '../librerias/quitar.php';

	$crit = mysql_real_escape_string(quitar($_REQUEST['crit']));
		$crit = utf8_decode($crit);

	if ( $crit != "") 
	{
		$consulta = " 	SELECT *
						FROM usuarios
						WHERE nombre LIKE '$crit%' OR appat LIKE '$crit%' OR ammat LIKE '$crit%' OR usuario LIKE '$crit%'";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);

		$en_crit = encode ("crit=$crit");

			if ($filas == 0) 
			{
				echo "<script>  alert ('No se encuentran registros con el criterio solicitado')</script>";

			} else {
						echo "<div id = 'icon_excel'>
								<a href = '../excel/user/exl_usuarios.php?$en_crit'>
									<img src='../imagenes/excel2013.png' TITLE='Ver Excel'/>
								</a>
							  </div>";

						echo "<center><table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
										<tr align = 'center'>
											<th> Clave usuario </th>
											<th> Nombre </th>
											<th> Apellido Paterno </th>
											<th> Apellido Materno </th>
											<th> Correo </th>
											<th> Usuario </th>
											<th> Tipo </th>
											<th> Activo </th>
										</tr> ";

										for ($y=0; $y <$filas ; $y++) 
													{ 
														$idu = mysql_result($ejecutar, $y, 'IDusuario');
															$en_idu = encode ("IDusuario=$idu");
															$en_idu2 = encode ("IDusuario=$idu");
														$nom = mysql_result($ejecutar, $y, 'nombre');
															$nom = utf8_encode($nom);
														$appat = mysql_result($ejecutar, $y, 'appat');
															$appat = utf8_encode($appat);
														$ammat = mysql_result($ejecutar, $y, 'ammat');
															$ammat = utf8_encode($ammat);
														$correo = mysql_result($ejecutar, $y, 'correo');
														$usuario = mysql_result($ejecutar, $y, 'usuario');
														$tipo = mysql_result($ejecutar, $y, 'tipo');
														$activo = mysql_result($ejecutar, $y, 'activo');

															echo "<tr align = 'center'>
																	<td> $idu </td>
																	<td> $nom </td>
																	<td> $appat </td>
																	<td> $ammat </td>
																	<td> $correo </td>
																	<td> $usuario </td>
																	<td> $tipo </td>
																	<td> $activo </td>
																</tr>";
													}
								echo "</table></center>";
					}
	}
?>