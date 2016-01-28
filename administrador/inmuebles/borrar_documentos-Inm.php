<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$IDdoc = mysql_real_escape_string(quitar($_REQUEST['iddoc']));
	$idInm = mysql_real_escape_string(quitar($_REQUEST['idinm']));
	
	$consulta = "SELECT IDdoc_inmuebles,ruta
				FROM documentos_inmuebles
				WHERE IDdoc_inmuebles=$IDdoc";
	$ejecutar = mysql_query($consulta) or die(mysql_error());
				
	$consultaElim = "DELETE FROM documentos_inmuebles
							WHERE IDdoc_inmuebles=$IDdoc";
	$ejecutarElim = mysql_query($consultaElim) or die(mysql_error());
	
	$row=mysql_fetch_array($ejecutar);
	unlink($row['ruta']);
		
	$consultaDoc = "SELECT IDdoc_inmuebles,nombre,ruta,fecha_ingreso FROM documentos_inmuebles WHERE IDinmueble=$idInm";
	$ejecutarDoc = mysql_query($consultaDoc) or die(mysql_error());
	$filasDoc = mysql_num_rows($ejecutarDoc);
	
		if($filasDoc!=0)
		{
			echo"<br><center>
				<table id='miTabla'>
					<tr>
						<th colspan=3>Documentos Inmueble</th>
					</tr>
					
					<tr>
						<th>Nombre del Documento</th>
						<th>Fecha</th>
						<th>Acciones</th>
					</tr>";
					
			for($x=0;$x<$filasDoc;$x++)
			{
				$IDdoc = mysql_result($ejecutarDoc,$x,'IDdoc_inmuebles');
				$nombre = mysql_result($ejecutarDoc,$x,'nombre');
				$nombre = utf8_encode($nombre);
				$ruta = mysql_result($ejecutarDoc,$x,'ruta');
				$ruta = utf8_encode($ruta);
				$fechaIn = mysql_result($ejecutarDoc,$x,'fecha_ingreso');
		
				echo "<tr>
						<td>$nombre</td>
						<td>$fechaIn</td>
						<td>
							<div id='botonesDocumento'>
								<div id='leftDocumento'>
									<a href='$ruta' target='_blank'><input type='submit' name='ver' value='Ver' class='boton rounded1'/></a>
								</div>
								
								<div id='rightDocumento'>
									<form action='' method = 'POST' enctype='application/x-www-form-urlencoded' name='formu$x' id='formu$x' target='_self'>
										<input type='hidden' name='iddoc' value='$IDdoc' id='doc'/>
										<input type='hidden' name='idinm' value='$idInm' id='inm'/>
										<input type='button' name='borrar' value='Eliminar' class='borrar boton rounded1'/>
									</form>
								</div>
							</div>
						</td>
					 </tr>";
			}
			
			echo"</table></center>";
		}
		else
		{
			echo"<center>
					<table>
						<tr>
							<td align='center'><img src='../../imagenes/advertencia.png'/></td>
						</tr>
						<tr>
							<td><font size='5' face='Constantia Italic' text color='#ff8816'>No existen documentos</font></td>
						</tr>
					</table>
				</center>";
		}
?>

<script type="text/javascript">
	$(function () {
		$('.borrar').click(
			function () {
				formu = this.form;
				$('#ajax2').load('borrar_documentos-Inm.php',$(formu).serialize());
			}
		);
	});
</script>