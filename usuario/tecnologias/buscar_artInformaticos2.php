<link rel = "stylesheet" type = "text/css" href = "../../css/style_table.css"/>
<?php

	include '../../librerias/conexion.php';
	include '../../librerias/encode.php';
	include '../../librerias/quitar.php';
	
	$crit = mysql_real_escape_string(quitar($_REQUEST['crit']));
		$crit = utf8_decode ($crit);

		if($crit != "")
		{

			$consulta = " 	SELECT IDeinformatico, equipo_informatico, activo
							FROM equipos_informaticos
							WHERE equipo_informatico LIKE '$crit%' ";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
				$en_crit = encode ("crit = $crit");


			if ($filas == 0) 
			{
				echo "<script>  alert ('No se encuentran registros con el criterio solicitado')</script>";

			} else {

					echo " <center><table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
										<tr aling = 'center'>
											<th> Clave </th>
											<th> Artículo </th>
											<th> Activo </th> ";

						for ($y=0; $y <$filas ; $y++) 
						{ 
							$IDeinformatico = mysql_result($ejecutar, $y, 'IDeinformatico');
								$en_inf = encode ("IDeinformatico=$IDeinformatico");
								$en_inf2 = encode ("IDeinformatico=$IDeinformatico");
							$articulo = mysql_result($ejecutar, $y, 'equipo_informatico');
								$articulo = utf8_encode($articulo);
							$activo = mysql_result($ejecutar, $y, 'activo');

							echo " <tr aling = 'center'>
										<td> $IDeinformatico </td>
										<td> $articulo </td>
										<td> $activo </td>
									</tr>";
						}
					}
		}
?>