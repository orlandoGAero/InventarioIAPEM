<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=BajasPlantaVehicular.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';

	$buscar = " SELECT 	pve.codigoNuevoV,
						pve.codigoAnterior,
						pve.modelo,
						pve.marca,
						pve.color,
						pve.placas,
						pve.noSerie,
						pve.ano,
						pve.fechaUltima_verificacion,
						pve.fechaProxima_verificacion,
						pve.fechaUltima_tenencia,
						pve.fechaProxima_tenencia,
						pve.noTarjetaCirculacion,
						pve.tipo_v,
						pve.servicio,
						pve.fecha_ingreso,
						pve.activo,
						pve.motivo_baja,
						coor.coordinacion, 
						resg.nombre, resg.ap_paterno, resg.ap_materno, 
						inmueble.nombre_sede
				FROM planta_vehicular AS pve, coordinaciones AS coor, resguardatarios AS resg, bienes_inmuebles AS inmueble
				WHERE pve.activo = 'No'
					AND coor.IDcoordinacion = pve.IDcoordinacion
					AND resg.IDresguardatario = pve.IDresguardatario
					AND inmueble.IDinmueble = pve.IDinmueble ";
	$ejecutar2 = mysql_query ($buscar) or die (mysql_error());
	$filas2 = mysql_num_rows ($ejecutar2);
	
	$title = "BAJAS DE PLANTA VEHÍCULAR";
		$title = utf8_encode ($title);
?>
	
	<table border = '0'>
		<tr align = 'center'>
			<td width = '100px'> </td>
			<td colspan = '13' rowspan = '9'>
				<img src = '\\192.168.18.1\local\InventarioIAPEM\imagenes\encab-iapem1.png'>
			</td>
		</tr>
	</table>
	
	<?php echo "<h3 align = 'center' style='color:red'> $title </h3>";
	
		echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas2</b></td>
						</tr>
				</table> "; ?>
	<p> </p>
<?php
		$codNuev = "Código Nuevo";
			$codNuev = utf8_encode ($codNuev);
		$codAnt = "Código Anterior";
			$codAnt = utf8_encode ($codAnt);
		$year = "Año";
			$year = utf8_encode ($year);
		$ultVer = "Última verificación";
			$ultVer = utf8_encode ($ultVer);
		$proVer = "Próxima verificación";
			$proVer = utf8_encode ($proVer);
		$ultTen = "Última Tenencia";
			$ultTen = utf8_encode ($ultTen);
		$proTen = "Próxima Tenencia";
			$proTen = utf8_encode ($proTen);
		$Tar = "Tarjeta de Circulación";
			$Tar = utf8_encode ($Tar);
		$coordi = "Coordinación";
			$coordi = utf8_encode ($coordi);
			
			echo " <center><table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
						<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
							<th> $codNuev </th>
							<th> $codAnt </th>
							<th> Modelo </th>
							<th> Marca </th>
							<th> Color </th>
							<th> Placas </th>
							<th> No.Serie </th>
							<th> $year </th>
							<th> $ultVer </th>
							<th> $proVer </th>
							<th> $ultTen </th>
							<th> $proTen </th>
							<th> $Tar </th>
							<th> Tipo </th>
							<th> Fecha Ingreso </th>
							<th> Inmueble </th>
							<th> $coordi </th>
							<th> Resguardatario </th>
							<th> Servicio </th>
							<th> Motivo de Baja </th>
							<th> Activo </th>
						</tr> ";

						for($y=0;$y<$filas2;$y++)
												
						{
							$codigoNuevoV = mysql_result ($ejecutar2, $y, 'codigoNuevoV');
							$CodigoAnterior	= mysql_result($ejecutar2, $y, 'CodigoAnterior');	
							$modelo = mysql_result($ejecutar2, $y, 'modelo');
								$modelo = utf8_encode($modelo);
							$marca = mysql_result($ejecutar2, $y, 'marca');
								$marca = utf8_encode($marca);
							$color = mysql_result($ejecutar2, $y, 'color');
								$color = utf8_encode($color);
							$placas = mysql_result ($ejecutar2, $y, 'placas');
								$placas = utf8_encode($placas);
							$noserie = mysql_result($ejecutar2, $y, 'noSerie');
							$ano = mysql_result($ejecutar2, $y, 'ano');
							$fechaUltVer = mysql_result($ejecutar2, $y, 'fechaUltima_verificacion');
							$fechaProVer = mysql_result($ejecutar2, $y, 'fechaProxima_verificacion');
							$fechaUltTen = mysql_result($ejecutar2, $y, 'fechaUltima_tenencia');
							$fechaProTen = mysql_result($ejecutar2, $y, 'fechaProxima_tenencia');
							$NoTarjeta = mysql_result($ejecutar2, $y, 'noTarjetaCirculacion');
							$tipo = mysql_result($ejecutar2, $y, 'tipo_v');
								$tipo = utf8_encode($tipo);
							$Coord = mysql_result($ejecutar2, $y, 'coordinacion');
								$Coord = utf8_encode($Coord);
							$Nom = mysql_result($ejecutar2, $y, 'nombre');
								$Nom = utf8_encode($Nom);
							$Ap = mysql_result($ejecutar2, $y, 'ap_paterno');
								$Ap = utf8_encode($Ap);
							$Am = mysql_result($ejecutar2, $y, 'ap_materno');
								$Am = utf8_encode($Am);
							$Resg = " $Nom $Ap $Am";
							$servicio = mysql_result($ejecutar2, $y, 'servicio');
							$fecha_in = mysql_result($ejecutar2, $y, 'fecha_ingreso');
							$activo = mysql_result ($ejecutar2, $y, 'activo');
							$mot_baja = mysql_result ($ejecutar2, $y, 'motivo_baja');
									$mot_baja = utf8_encode ($mot_baja);
							$Inmueble = mysql_result($ejecutar2, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);
							
							echo "<tr align = 'center'>
									<td> $codigoNuevoV </td>
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
									<td> $mot_baja </td>
									<td> $activo </td>
								</tr>";
						}
			echo "</table></center>";
?>
