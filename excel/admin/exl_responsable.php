<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Responsables.xls");
	//header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");

	include '../../librerias/conexion.php';
	include '../../librerias/decode.php';
	
	decode_get($_SERVER["REQUEST_URI"]);

	$crit = $_GET ['crit'];

	$consulta = "SELECT IDresguardatario,nombre,ap_paterno,ap_materno,cargo,tel_part,tel_iapem,activo
				FROM resguardatarios
				WHERE IDresguardatario LIKE '$crit%' OR nombre LIKE '$crit%' OR ap_paterno LIKE '$crit%' OR ap_materno LIKE '$crit%' OR cargo LIKE '$crit%' OR tel_part LIKE '$crit%' OR activo LIKE '$crit%'";
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
	
	<h3 align = 'center' style='color:red'> RESPONSABLES </h3>
	
	<?php echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas</b></td>
						</tr>
				</table> "; ?>
	
	<p> </p>
<?php			
		$tel = "Teléfono Particular";
			$tel = utf8_encode ($tel);
		$ext = "Extensión IAPEM";
			$ext = utf8_encode ($ext);
		
		echo "<center>
				<table bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
					<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
						<th> Clave Responsable </th>
						<th> Nombre </th>
						<th> Apellido Paterno </th>
						<th> Apellido Materno </th>
						<th> Cargo </th>
						<th> $tel </th>
						<th> $ext </th>
						<th> Activo </th>
					</tr> ";

					for ($y=0; $y <$filas ; $y++) 
					{ 
						$idR = mysql_result ($ejecutar,$y,'IDresguardatario');
						$nombre = mysql_result ($ejecutar,$y,'nombre');
						$nombre = utf8_encode($nombre);
						$ap = mysql_result ($ejecutar,$y,'ap_paterno');
						$ap = utf8_encode($ap);
						$am = mysql_result ($ejecutar,$y,'ap_materno');
						$am = utf8_encode($am);
						$cargo = mysql_result ($ejecutar,$y,'cargo');
						$cargo = utf8_encode($cargo);
						$telPart = mysql_result ($ejecutar,$y,'tel_part');
						$telIAPEM = mysql_result ($ejecutar,$y,'tel_iapem');
						$activo = mysql_result ($ejecutar,$y,'activo');
						
						echo " <tr align = 'center'>
									<td> $idR </td>
									<td> $nombre </td>
									<td> $ap </td>
									<td> $am </td>
									<td> $cargo </td>
									<td> $telPart </td>
									<td> $telIAPEM </td>
									<td> $activo </td>
								</tr>";
					}
				echo "</table></center>";
			
?>