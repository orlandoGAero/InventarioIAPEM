<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Coordinaciones.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';
	include '../../librerias/decode.php';
	
	decode_get($_SERVER["REQUEST_URI"]);

	$crit = $_GET ['crit'];

	$consulta = "SELECT IDcoordinacion,coordinacion,activo
				FROM coordinaciones
				WHERE IDcoordinacion LIKE '$crit%' OR coordinacion LIKE '%$crit%' OR activo LIKE '$crit%'";
	$ejecutar = mysql_query($consulta) or die (mysql_error());
	$filas = mysql_num_rows($ejecutar);

?>

	<table border = '0'>
		<tr align = 'center'>
			<td width = '50%'> </td>
			<td colspan = '12' rowspan = '9'>
				<img src = '\\192.168.18.1\local\InventarioIAPEM\imagenes\encab-iapem1.png' BGPROPERTIES='fixed'>
			</td>
		</tr>
	</table>
	
	<h3 align = 'center' style='color:red'> COORDINACIONES </h3>
	
	<?php echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas</b></td>
						</tr>
				</table> "; ?>
	
	<p> </p>
<?php
		$clave = "Clave Coordinación";
			$clave = utf8_encode ($clave);
		$coord = "Coordinación";
			$coord = utf8_encode ($coord);
					
		echo " <center>
			<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
				<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
					<th> $clave </th>
					<th> $coord </th>
					<th> Activo </th>
				</tr> ";

				for ($y=0; $y <$filas ; $y++) 
				{ 
					$idCo = mysql_result ($ejecutar,$y,'IDcoordinacion');
					$coordinacion = mysql_result ($ejecutar,$y,'coordinacion');
					$coordinacion = utf8_encode($coordinacion);
					$activo = mysql_result ($ejecutar,$y,'activo');
					
					echo " <tr align = 'center'>
								<td> $idCo </td>
								<td> $coordinacion </td>
								<td> $activo </td>
							</tr>";
				}
				echo "</table></center>";
?>