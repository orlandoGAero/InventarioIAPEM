<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=ServicioVehiculo.xls");
	//header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';
	include '../../librerias/decode.php';
	
	decode_get($_SERVER["REQUEST_URI"]);

	//print_r ($_GET);
	$crit = $_GET ['crit'];

	$consulta = " 	SELECT sveh.*, pv.codigoNuevoV, pv.placas
					FROM servicio_vehiculo AS sveh, planta_vehicular AS pv
					WHERE placas LIKE '%$crit%'
						AND pv.codigoNuevoV = sveh.codigoNuevoV ";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);
		
		$title = "SERVICIOS AL VEHÍCULO";
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
		$cVeh = "Clave del Vehículo";
			$cVeh = utf8_encode ($cVeh);
		
		echo "<center><table align = 'center' bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
					<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
						<th> Clave Servicio </th>
						<th> Placas </th>
						<th> Fecha </th>
						<th> Tipo de Servicio </th>
						<th> Costo </th>
						<th> $cVeh </th>
					</tr> ";

				for ($y=0; $y <$filas ; $y++) 
				{ 
					$IDservicio = mysql_result($ejecutar, $y, 'IDservicio');
					$fecha = mysql_result($ejecutar, $y, 'fecha');
					$tipo_serv = mysql_result($ejecutar, $y, 'tipoServicio');
						$tipo_serv = utf8_encode($tipo_serv);
					$costo = mysql_result($ejecutar, $y, 'costo');
					$codigoNuevoV = mysql_result($ejecutar, $y, 'codigoNuevoV');
					$placas = mysql_result($ejecutar, $y, 'placas');
						$placas = utf8_encode($placas);
				
				echo   "<tr align = 'center'>
								<td> $IDservicio </td>
								<td> $placas </td>
								<td> $fecha </td>
			                    <td> $tipo_serv </td>
			                    <td> $costo </td>
			                    <td> $codigoNuevoV </td>
			                    
			            </tr> ";
 				}
 		echo "</table></center>";
?>