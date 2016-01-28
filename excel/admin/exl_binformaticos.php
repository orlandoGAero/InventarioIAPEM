<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=BienesInformaticos.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';
	include '../../librerias/decode.php';
	
	decode_get($_SERVER["REQUEST_URI"]);

	//print_r ($_GET);
	$crit = $_GET ['crit'];

	$consulta = " SELECT tec.*, eqinf.IDeinformatico, eqinf.equipo_informatico, coor.IDcoordinacion, coor.coordinacion, resg.IDresguardatario, resg.nombre, resg.ap_paterno, resg.ap_materno, inmueble.IDinmueble, inmueble.nombre_sede
								FROM tecnologias AS tec, equipos_informaticos AS eqinf, coordinaciones AS coor, resguardatarios AS resg, bienes_inmuebles AS inmueble
								WHERE eqinf.equipo_informatico LIKE '%$crit%' AND tec.activo = 'Si'
									AND eqinf.IDeinformatico = tec.IDeinformatico
									AND coor.IDcoordinacion = tec.IDcoordinacion
									AND resg.IDresguardatario = tec.IDresguardatario
									AND inmueble.IDinmueble = tec.IDinmueble ";
	$ejecutar = mysql_query($consulta) or die (mysql_error());
	$filas = mysql_num_rows($ejecutar);
	
	$title = "BIENES INFORMÁTICOS";
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
							<td align = 'left'><b>$filas</b></td>
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
						<th> Fecha de Ingreso </th>
						<th> $coord </th>
						<th> Resguardatario </th>
						<th> Activo </th>
						<th> Inmueble </th>
					</tr>";

				for ($y=0; $y <$filas ; $y++) 
				{ 
					$codNuevoT = mysql_result ($ejecutar, $y, 'codigoNuevoT');
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

					echo " <tr align = 'center'>
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
?>