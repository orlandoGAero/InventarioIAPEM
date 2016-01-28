<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Bajas_BienesMuebles.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	include '../../librerias/conexion.php';
	
	$consulta = " SELECT bm.codigoNuevoM,bm.codigoAnterior,bm.caracteristicas,bm.area_ubicacion,bm.fecha_ingreso,bm.motivo_baja,bm.activo,
						m.nombre,
						bi.nombre_sede,
						c.coordinacion,
						r.nombre AS nomR,r.ap_paterno,r.ap_materno
				FROM bienes_muebles AS bm,muebles AS m,bienes_inmuebles AS bi,coordinaciones AS c,resguardatarios AS r
				WHERE bm.activo='No' 
					AND m.IDmueble=bm.IDmueble
					AND c.IDcoordinacion=bm.IDcoordinacion
					AND r.IDresguardatario=bm.IDresguardatario
					AND bi.IDinmueble=bm.IDinmueble";
		$ejecutar = mysql_query ($consulta) or die (mysql_error());
		$filas2 = mysql_num_rows ($ejecutar);
?>
	
	<table border = '0'>
		<tr align = 'center'>
			<td width = '100px'> </td>
			<td colspan = '13' rowspan = '9'>
				<img src = '\\192.168.18.1\local\InventarioIAPEM\imagenes\encab-iapem1.png'>
			</td>
		</tr>
	</table>
	
	<h3 align = 'center' style='color:red'> BAJAS DE BIENES MUEBLES </h3>
	
	<?php echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas2</b></td>
						</tr>
				</table> "; ?>
	
	<p> </p>
<?php
		$codN = "Código Nuevo";
			$codN = utf8_encode ($codN);
		$codA = "Código Anterior";
			$codA = utf8_encode ($codA);
		$art = "Artículo";
			$art = utf8_encode ($art);
		$car = "Características";
			$car = utf8_encode ($car);
		$coord = "Coordinación";
			$coord = utf8_encode ($coord);
		$area = "Área de Ubicación";
			$area = utf8_encode ($area);
				
			echo "<center>
					<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
						<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
							<th>$codN</th>
							<th>$codA</th>
							<th>Fecha Ingreso</th>
							<th>$art</th>
							<th>$car</th>
							<th>Inmueble</th>
							<th>$coord</th>
							<th>Responsable</th>
							<th>$area</th>
							<th>Motivo de Baja</th>
							<th>Activo</th>
						</tr> ";
						
						for ($y=0; $y<$filas2; $y++)
						{
							$codigoNuevoM = mysql_result($ejecutar,$y,'codigoNuevoM');
							$codigoAnteriorM = mysql_result($ejecutar,$y,'codigoAnterior');
							$fechaIn = mysql_result($ejecutar,$y,'fecha_ingreso');
							$articulo = mysql_result($ejecutar,$y,'nombre');
							$articulo = utf8_encode($articulo);
							$caract = mysql_result($ejecutar,$y,'caracteristicas');
							$caract = utf8_encode($caract);
							$nomInm = mysql_result($ejecutar,$y,'nombre_sede');
							$nomInm = utf8_encode($nomInm);
							$nomCo = mysql_result($ejecutar,$y,'coordinacion');
							$nomCo = utf8_encode($nomCo);
							$nomR = mysql_result($ejecutar,$y,'nomR');
							$nomR = utf8_encode($nomR);
							$apR = mysql_result($ejecutar,$y,'ap_paterno');
							$apR = utf8_encode($apR);
							$amR = mysql_result($ejecutar,$y,'ap_materno');
							$amR = utf8_encode($amR);
							$nomResp = "$nomR $apR $amR";
							$areaUb = mysql_result($ejecutar,$y,'area_ubicacion');
							$areaUb = utf8_encode($areaUb);
							$motBaja = mysql_result($ejecutar,$y,'motivo_baja');
							$motBaja = utf8_encode($motBaja);
							$activo = mysql_result($ejecutar,$y,'activo');
							
							echo "<tr align = 'center'>
									<td>$codigoNuevoM</td>
									<td>$codigoAnteriorM</td>
									<td>$fechaIn</td>
									<td>$articulo</td>
									<td>$caract</td>
									<td>$nomInm</td>
									<td>$nomCo</td>
									<td>$nomResp</td>
									<td>$areaUb</td>
									<td>$motBaja</td>
									<td>$activo</td>
								  </tr>";
						}
			echo "</table></center>";
?>