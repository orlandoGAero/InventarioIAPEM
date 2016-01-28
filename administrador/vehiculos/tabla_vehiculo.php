<link rel = "stylesheet" type = "text/css" href = "../../css/style_table.css"/>
<?php
	include '../../librerias/conexion.php';
	
	$codNuevo = $_REQUEST['codigoNuevoV'];
	
		$consulta = mysql_query (" 	SELECT pv.codigoNuevoV,pv.modelo,pv.marca,resg.nombre,resg.ap_paterno,resg.ap_materno 
									FROM planta_vehicular AS pv, resguardatarios AS resg
									WHERE pv.codigoNuevoV = '$codNuevo'
										AND resg.IDresguardatario=pv.IDresguardatario ");
		$filas = mysql_num_rows ($consulta);							
	
	echo "<center>
			<table border = '0' cellspacing = '0' cellpadding = '0' id = 'miTabla'>
				<tr aling = 'center'>
					<th> Código Nuevo </th>
					<th> Modelo </th>
					<th> Marca </th>
					<th> Responsable </th>
				</tr>";
				
				for($x=0;$x<$filas;$x++)
				{
					$codNuevo = mysql_result ($consulta, $x, 'codigoNuevoV');
					$modelo = mysql_result ($consulta, $x, 'modelo');
						$modelo = utf8_encode ($modelo);
					$marca = mysql_result ($consulta, $x, 'marca');
						$marca = utf8_encode ($marca);
					$nom = mysql_result ($consulta, $x, 'nombre');
						$nom = utf8_encode ($nom);
					$ap = mysql_result ($consulta, $x, 'ap_paterno');
						$ap = utf8_encode ($ap);
					$am = mysql_result ($consulta, $x, 'ap_materno');
						$am = utf8_encode ($am);
					$resg = "$nom $ap $am";
					
					echo " 	<tr>
								<td> $codNuevo </td>
								<td> $modelo </td>
								<td> $marca </td>
								<td> $resg </td>
							</tr>";
				}
	echo "</table></center>";
?>