<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=InventarioBienesInformaticos.xls");
	//header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';
		
		$consultaInv = " 	SELECT tec.codigoNuevoT, tec.codigoAnterior, eqinf.equipo_informatico, tec.modelo, tec.marca, tec.color, tec.caracteristicas, tec.area_ubicacion, tec.fecha_ingreso, coor.coordinacion, resg.nombre, resg.ap_paterno, resg.ap_materno, inmueble.nombre_sede, tec.activo
							FROM tecnologias AS tec, equipos_informaticos AS eqinf, coordinaciones AS coor, resguardatarios AS resg, bienes_inmuebles AS inmueble
							WHERE tec.activo = 'Si'
								AND eqinf.IDeinformatico = tec.IDeinformatico
								AND coor.IDcoordinacion = tec.IDcoordinacion
								AND resg.IDresguardatario = tec.IDresguardatario
								AND inmueble.IDinmueble = tec.IDinmueble";
		$ejecutarInv = mysql_query($consultaInv) or die (mysql_error());
		$filas = mysql_num_rows($ejecutarInv);
		
		$title = "INVENTARIO BIENES INFORMÁTICOS";
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
		
				echo "<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
						<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
							<th> $codiN </th>
							<th> $codAn </th>
							<th> Fecha de Ingreso </th>
							<th> $arti </th>
							<th> Modelo </th>
							<th> Marca </th>
							<th> Color </th>
							<th> $caracter </th>
							<th> Inmueble </th>
							<th> $coord </th>
							<th> Resguardatario </th>
							<th> $area </th>
							<th> Activo </th>
						</tr> ";
				
						for ($y=0; $y <$filas ; $y++) 
						{ 
							$codNuevoT = mysql_result ($ejecutarInv, $y, 'codigoNuevoT');
							$codAnt = mysql_result($ejecutarInv, $y, 'codigoAnterior');
							$eq_inf = mysql_result($ejecutarInv, $y, 'equipo_informatico');
								$eq_inf = utf8_encode($eq_inf);
							$modelo = mysql_result($ejecutarInv, $y, 'modelo');
								$modelo = utf8_encode($modelo);
							$marca = mysql_result($ejecutarInv, $y, 'marca');
								$marca = utf8_encode($marca);
							$color = mysql_result($ejecutarInv, $y, 'color');
								$color = utf8_encode($color);
							$Caracteristicas = mysql_result($ejecutarInv, $y, 'caracteristicas');
								$Caracteristicas = utf8_encode($Caracteristicas);
							$area_u = mysql_result($ejecutarInv, $y, 'area_ubicacion');
								$area_u = utf8_encode($area_u);
							$fecha_in = mysql_result($ejecutarInv, $y, 'fecha_ingreso');
							$Coord = mysql_result($ejecutarInv, $y, 'coordinacion');
								$Coord = utf8_encode($Coord);
							$Nom = mysql_result($ejecutarInv, $y, 'nombre');
								$Nom = utf8_encode($Nom);
							$Ap = mysql_result($ejecutarInv, $y, 'ap_paterno');
								$Ap = utf8_encode($Ap);
							$Am = mysql_result($ejecutarInv, $y, 'ap_materno');
								$Am = utf8_encode($Am);
							$Resg = " $Nom $Ap $Am";	
							$activo = mysql_result($ejecutarInv, $y, 'activo');
							$Inmueble = mysql_result($ejecutarInv, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);
							
							echo "<tr align = 'center'>
									<td> $codNuevoT </td>
									<td> $codAnt </td>
									<td> $fecha_in </td>
									<td> $eq_inf </td>
									<td> $modelo </td>
									<td> $marca </td>
									<td> $color </td>
									<td> $Caracteristicas </td>
									<td> $Inmueble </td>
									<td> $Coord </td>
									<td> $Resg </td>
									<td> $area_u </td>
									<td> $activo </td>
								  </tr>";
						}
				echo"</table></center>";
?>