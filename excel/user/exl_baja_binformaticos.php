<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Bajas_BienesInformÃ¡ticos.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	include '../../librerias/conexion.php';
	
	$buscar = " SELECT tec.codigoNuevoT, 
				   tec.codigoAnterior, 
				   eqinf.equipo_informatico, 
				   tec.modelo, tec.marca, 
				   tec.color, 
				   tec.caracteristicas,
				   tec.area_ubicacion,
				   tec.fecha_ingreso,
				   coord.coordinacion,
				   resg.nombre, resg.ap_paterno, resg.ap_materno,
				   tec.activo,
				   tec.motivo_baja,
				   inm.nombre_sede 
			FROM tecnologias AS tec, equipos_informaticos AS eqinf, coordinaciones AS coord, resguardatarios AS resg, bienes_inmuebles AS inm
			WHERE tec.activo = 'No'
				AND eqinf.IDeinformatico = tec.IDeinformatico
				AND coord.IDcoordinacion = tec.IDcoordinacion
				AND resg.IDresguardatario = tec.IDresguardatario
				AND inm.IDinmueble = tec.IDinmueble ";
		$ejecutar2 = mysql_query ($buscar) or die (mysql_error());
		$filas2 = mysql_num_rows ($ejecutar2);
		
		$title = "BAJAS DE BIENES INFORMÁTICOS";
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
		$codiN = "Código Nuevo";
			$codiN = utf8_encode ($codiN);
		$codAn = "Código Anterior";
			$codAn = utf8_encode ($codAn);
		$arti = "Artículo";
			$arti = utf8_encode ($arti);
		$caracter = "Características";
			$caracter = utf8_encode ($caracter);
		$area = "Área de ubicación";
			$area = utf8_encode ($area);
		$coord = "Coordinación";
			$coord = utf8_encode ($coord);
		
		echo "<center>
					<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
						<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
							<th> $codiN </th>
							<th> $codAn </th>
							<th> $arti </th>
							<th> Modelo </th>
							<th> Marca </th>
							<th> Color </th>
							<th> $caracter </th>
							<th> $area </th>
							<th> Fecha Ingreso </th>
							<th> $coord </th>
							<th> Resguardatario </th>
							<th> Inmueble </th>
							<th> Motivo de Baja </th>
							<th> Activo </th>
						</tr>";
						
						for ($y=0; $y<$filas2; $y++)
						{
							$codNuevoT = mysql_result ($ejecutar2, $y, 'codigoNuevoT');
							$codAnt = mysql_result ($ejecutar2, $y, 'codigoAnterior');
							$equi_inf = mysql_result ($ejecutar2, $y, 'equipo_informatico');
								$equi_inf = utf8_encode ($equi_inf);
							$modelo = mysql_result ($ejecutar2, $y, 'modelo');
								$modelo = utf8_encode ($modelo);
							$marca = mysql_result ($ejecutar2, $y, 'marca');
								$marca = utf8_encode ($marca);
							$color = mysql_result ($ejecutar2, $y, 'color');
								$color = utf8_encode($color);
							$caract = mysql_result ($ejecutar2, $y, 'caracteristicas');
								$caract = utf8_encode ($caract);
							$area_ubi = mysql_result ($ejecutar2, $y, 'area_ubicacion');
								$area_ubi = utf8_encode ($area_ubi);
							$fecha_in = mysql_result ($ejecutar2, $y, 'fecha_ingreso');
							$coord = mysql_result ($ejecutar2, $y, 'coordinacion');
								$coord = utf8_encode ($coord);
							$nom = mysql_result ($ejecutar2, $y, 'nombre');
								$nom = utf8_encode ($nom);
							$appat = mysql_result ($ejecutar2, $y, 'ap_paterno');
								$appat = utf8_encode ($appat);
							$apmat = mysql_result ($ejecutar2, $y, 'ap_materno');
								$apmat = utf8_encode ($apmat);
							$resg = "$nom $appat $apmat";
							$inmueble = mysql_result ($ejecutar2, $y, 'nombre_sede');
								$inmueble = utf8_encode ($inmueble);
							$mot_baja = mysql_result ($ejecutar2, $y, 'motivo_baja');
								$mot_baja = utf8_encode ($mot_baja);
							$activo = mysql_result ($ejecutar2, $y, 'activo');
							
							echo "<tr align = 'center'>
								<td> $codNuevoT </td>
								<td> $codAnt </td>
								<td> $equi_inf </td>
								<td> $modelo </td>
								<td> $marca </td>
								<td> $color </td>
								<td> $caract </td>
								<td> $area_ubi </td>
								<td> $fecha_in </td>
								<td> $coord </td>
								<td> $resg </td>
								<td> $inmueble </td>
								<td> $mot_baja </td>
								<td> $activo </td>
							  </tr>";
						}
				echo "</table></center>";
?>