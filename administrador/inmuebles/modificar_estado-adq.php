<!--ARCHIVO AJAX-->
<!DOCTYPE HTML PUBLIC "- / / W3C / / DTD HTML 4.01 Transitional / / EN""Http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
	<head>
		<!--Calendario-->
		<script type="text/javascript" src="../../calendario/js/jquery-ui-1.8.2.custom.min.js"></script>
		<link type="text/css" href="../../calendario/css/ui-darkness/jquery-ui-1.8.2.custom.css" rel="stylesheet"/>
		<script type="text/javascript">
			$(function() {
				$(".date").datepicker(
					{
						dateFormat:'yy-mm-dd'
						, monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
						, dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
					}
				);
			});
		</script>
		
		<!--RENTA-->
		<script type="text/javascript">
			$(function (e) {
				$('#modRent').submit(function (e) {
					e.preventDefault()
					$('#ajaxR').load('modificar_renta-Inm.php?' + $('#modRent').serialize())
				})
			})
		</script>
		<!--PRESTAMO-->
		<script type="text/javascript">
			$(function (e) {
				$('#modPre').submit(function (e) {
					e.preventDefault()
					$('#ajaxP').load('modificar_prestamo-Inm.php?' + $('#modPre').serialize())
				})
			})
		</script>
	</head>
	</body>
	<?php
		include '../../librerias/conexion.php';
		include '../../librerias/quitar.php';
		
		$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
		$estado = mysql_real_escape_string(quitar($_REQUEST['est']));

		if($estado=="RENTA")
		{
			$consulta = "SELECT IDrenta,nombre,costo,fechaRenta,fechaEntrega
						FROM renta_inmuebles
						WHERE IDinmueble=$idInm";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$idRent = mysql_result($ejecutar,0,'IDrenta');
			$nomRent = mysql_result($ejecutar,0,'nombre');
			$nomRent = utf8_encode($nomRent);
			$cost = mysql_result($ejecutar,0,'costo');
			$fechaRent = mysql_result($ejecutar,0,'fechaRenta');
			$fechaEntr = mysql_result($ejecutar,0,'fechaEntrega');
	?>
			<center>
				<fieldset><legend>Modificación de Renta Inmueble</legend>
					<form name='modRent' action='' method='POST' id='modRent' target='_self'>
						<ul>
							<li>
								<?php
									echo"<input type='hidden' name='idInm' value='$idInm'>
										 <input type='hidden' name='idRe' value='$idRent'>";
								?>
							</li>
							<li>
								<label>¿Quien lo renta?: <font color='#FF0000'>*</font></label>
							</li>
							<li>
								<table border='0' align='left'>
									<tr>
										<td>
											<?php
												echo"<input type='text' name='nom' value='$nomRent' class='rounded' onKeyUp='letras(this.value,nomRen);'>";
											?>
										</td>
										<td id='nomRen' width='22'> </td>
									</tr>
								</table>
							</li>
							
							<li>
								<label>Costo: <font color='#FF0000'>*</font></label>
							</li>
							<li>
								<table border='0' align='left'>
									<tr>
										<td>
											<?php
												echo"<input type='text' name='costo' value='$cost' class='rounded' onKeyUp='cost(this.value,cos);'>";
											?>
										</td>
										<td id='cos' width='22'> </td>
									</tr>
								</table>
							</li>
							
							<li>
								<label>Fecha renta: <font color='#FF0000'>*</font></label>
							</li>
							<li>
								<?php
									echo"<input type='text' name='fecha_r' value='$fechaRent' class='ancho date rounded calend'>";
								?>
							</li>
							
							<li>
								<label>Fecha de entrega: <font color='#FF0000'>*</font></label>
							</li>
							<li>
								<?php
									echo"<input type='text' name='fecha_e' value='$fechaEntr' class='ancho date rounded calend'>";
								?>
							</li>
							
							<li>
								<input type='submit' name='modificar' value='Modificar' class='boton rounded1' />
							</li>
							
							<div id='campos'>
								* Campos Obligatorios
							</div>
						</ul>
					</form>
				</fieldset>
			</center>
			
			<div id="ajaxR"></div>
	<?php
		}
		else
		{
			$consulta = "SELECT IDprestamo,nombre
						FROM prestamo_inmuebles
						WHERE IDinmueble=$idInm";
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			$idPre = mysql_result($ejecutar,0,'IDprestamo');
			$nomPre = mysql_result($ejecutar,0,'nombre');
			$nomPre = utf8_encode($nomPre);
	?>
		<center>
			<fieldset><legend>Modificación de Prestamo Inmueble</legend>
				<form name='modPre' action='' method='POST' id='modPre' target='_self'>
					<ul>					
						<li>
							<?php
								echo"<input type='hidden' name='idInm' value='$idInm'>
									 <input type='hidden' name='idP' value='$idPre'>";
							?>
						</li>
						<li>
							<label>¿Quien lo presta?: <font color='#FF0000'>*</font></label>
						</li>
						<li>
							<table border='0' align='left'>
								<tr>
									<td>
										<?php
											echo"<input type='text' name='nom' value='$nomPre' class='rounded' onKeyUp='letras(this.value,nomPre);'>";
										?>
									</td>
									<td id='nomPre' width='22'> </td>
								</tr>
							</table>
						</li>
						
						<li>
							<input type='submit' name='modificar' value='Modificar' class='boton rounded1' />
						</li>
						
						<div id='campos'>
							* Campo Obligatorio
						</div>
					</ul>
				</form>
			</fieldset>
		</center>
		
		<div id="ajaxP"></div>
	<?php
		}
	?>
	</body>
</html>