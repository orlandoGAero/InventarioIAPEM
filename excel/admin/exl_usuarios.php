<?php
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=Usuarios.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	include '../../librerias/conexion.php';
	include '../../librerias/decode.php';
	
	decode_get($_SERVER["REQUEST_URI"]);

	//print_r ($_GET);
	$crit = $_GET ['crit'];
	
	$consulta = " 	SELECT *
					FROM usuarios
					WHERE nombre LIKE '$crit%' OR appat LIKE '$crit%' OR ammat LIKE '$crit%' OR usuario LIKE '$crit%'";
	$ejecutar = mysql_query($consulta) or die (mysql_error());
	$filas = mysql_num_rows($ejecutar);
?>

		<table border = '0'>
			<tr align = 'center'>
				<td width = '10px'> </td>
				<td colspan = '13' rowspan = '9'>
					<img src = '\\192.168.18.1\local\InventarioIAPEM\imagenes\encab-iapem1.png'>
				</td>
			</tr>
		</table>
	
	<h3 align = 'center' style='color:red'> USUARIOS </h3>
	
	<?php echo " <table><tr style='color:red; font-size:14px;'>
							<td><b>Total de registros:</b></td>
							<td align = 'left'><b>$filas</b></td>
						</tr>
				</table> "; ?>
	
	<p> </p>

			<table align = 'right' bordercolor = 'orange'  border = '1' cellspacing = '0' cellpadding = '0'>
					<tr align = 'center' bgcolor = '#CC6600' style='color:#fff'>
						<th> Clave usuario </th>
						<th> Nombre </th>
						<th> Apellido Paterno </th>
						<th> Apellido Materno </th>
						<th> Correo </th>
						<th> Usuario </th>
						<th> Tipo </th>
						<th> Activo </th>
					</tr>
<?php
					for ($y=0; $y <$filas ; $y++) 
					{ 
						$idu = mysql_result($ejecutar, $y, 'IDusuario');
						$nom = mysql_result($ejecutar, $y, 'nombre');
							$nom = utf8_encode($nom);
						$appat = mysql_result($ejecutar, $y, 'appat');
							$appat = utf8_encode($appat);
						$ammat = mysql_result($ejecutar, $y, 'ammat');
							$ammat = utf8_encode($ammat);
						$correo = mysql_result($ejecutar, $y, 'correo');
						$usuario = mysql_result($ejecutar, $y, 'usuario');
						$tipo = mysql_result($ejecutar, $y, 'tipo');
						$activo = mysql_result($ejecutar, $y, 'activo');
						
						echo "<tr align = 'center'>
								<td> $idu </td>
								<td> $nom </td>
								<td> $appat </td>
								<td> $ammat </td>
								<td> $correo </td>
								<td> $usuario </td>
								<td> $tipo </td>
								<td> $activo </td>
							</tr>";
					}
		echo "</table>";
?>