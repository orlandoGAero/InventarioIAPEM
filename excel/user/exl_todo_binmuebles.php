<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Inventario_BienesInmuebles.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	include '../../librerias/conexion.php';
	
	$consulta = " SELECT bi.IDinmueble,bi.nombre_sede,bi.calle,bi.numero,bi.colonia,bi.cp,bi.ciudad,bi.telefono,bi.fecha_ingreso,bi.activo,r.nombre,r.ap_paterno,r.ap_materno,ea.tipo
				FROM bienes_inmuebles AS bi,resguardatarios AS r,estado_adquisicion AS ea
				WHERE bi.activo='Si' AND r.IDresguardatario=bi.IDresguardatario AND ea.IDest_adq=bi.IDest_adq";
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
	
	<h3 align = 'center' style='color:red'> INVENTARIO DE BIENES INMUEBLES </h3>
	
	<?php echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas2</b></td>
						</tr>
				</table> "; ?>
	
	<p> </p>
<?php
		$dir = "Direcci�n";
			$dir = utf8_encode ($dir);
		$tel =	"Tel�fono";
			$tel = utf8_encode ($tel);
		$esadq = "Estado de Adquisici�n";
			$esadq = utf8_encode ($esadq);
			
			echo "<center>
					<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
						<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
							<th>Clave Inmueble</th>
							<th>Nombre</th>
							<th>$dir</th>
							<th>$tel</th>
							<th>Responsable</th>
							<th>$esadq</th>
							<th>Fecha Ingreso</th>
							<th>Activo</th>
						</tr>";
						
						for ($y=0; $y<$filas2; $y++)
						{
							$idInm = mysql_result($ejecutar,$y,'IDinmueble');
							$nombre = mysql_result($ejecutar,$y,'nombre_sede');
							$nombre = utf8_encode($nombre);
							$calle = mysql_result($ejecutar,$y,'calle');
							$calle = utf8_encode($calle);
							$numero = mysql_result($ejecutar,$y,'numero');
							$colonia = mysql_result($ejecutar,$y,'colonia');
							$colonia = utf8_encode($colonia);
							$cp = mysql_result($ejecutar,$y,'cp');
							$ciudad = mysql_result($ejecutar,$y,'ciudad');
							$ciudad = utf8_encode($ciudad);
							
							if($numero=="S/N")
							{
								$direccion = "$calle $numero"." COL. $colonia"." C.P. $cp".", $ciudad, EDO. MÉXICO";
							}
							else
							{
								$direccion = "$calle"." No. $numero"." COL. $colonia"." C.P. $cp".", $ciudad, EDO. MÉXICO";
							}
							
							$telefono = mysql_result($ejecutar,$y,'telefono');
							$nomR = mysql_result($ejecutar,$y,'nombre');
							$nomR = utf8_encode($nomR);
							$apR = mysql_result($ejecutar,$y,'ap_paterno');
							$apR = utf8_encode($apR);
							$amR = mysql_result($ejecutar,$y,'ap_materno');
							$amR = utf8_encode($amR);
							$nombreR = "$nomR $apR $amR";
							$estado = mysql_result($ejecutar,$y,'tipo');
							$fechaIn = mysql_result($ejecutar,$y,'fecha_ingreso');
							$activo = mysql_result($ejecutar,$y,'activo');
							
							echo "<tr align = 'center'>
								<td>$idInm</td>
								<td>$nombre</td>
								<td>$direccion</td>
								<td>$telefono</td>
								<td>$nombreR</td>
								<td>$estado</td>
								<td>$fechaIn</td>
								<td>$activo</td>
							  </tr>";
						}
			echo "</table></center>";
?>