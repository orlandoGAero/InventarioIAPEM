<?php
	echo "<!--Calendario-->
		<script type='text/javascript' src='../../calendario/js/jquery-ui-1.8.2.custom.min.js'></script>
		<link type='text/css' href='../../calendario/css/ui-darkness/jquery-ui-1.8.2.custom.css' rel='stylesheet'/>
		<script type='text/javascript'>
			$(function() {
				$('.date').datepicker(
					{
						dateFormat:'yy-mm-dd'
						, monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
						, dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
					}
				);
			});
		</script>";
		
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
	$idE = mysql_real_escape_string(quitar($_REQUEST['idE']));
	$estado = mysql_real_escape_string(quitar($_REQUEST['est']));
	
	if($estado=="RENTA")
	{
		$consulta1 = "DELETE FROM renta_inmuebles WHERE IDinmueble=$idInm";
		$ejecutar1 = mysql_query($consulta1) or die (mysql_error());
	}
	else
	{
		$consulta2 = "DELETE FROM prestamo_inmuebles WHERE IDinmueble=$idInm";
		$ejecutar2 = mysql_query($consulta2) or die (mysql_error());
	}
	
	$consulta = "UPDATE bienes_inmuebles SET IDest_adq=$idE WHERE IDinmueble=$idInm";
	$ejecutar = mysql_query($consulta) or die (mysql_error());
	
	$consultaE = "SELECT * FROM estado_adquisicion WHERE IDest_adq=$idE";
	$ejecutarE = mysql_query($consultaE) or die (mysql_error());
	$tipoE = mysql_result($ejecutarE,0,'tipo');
	
	if($tipoE == "PROPIO")
	{
		echo"<br/><img src='../../imagenes/palomita.png' vspace=10/><br/>";							
		echo"<font size='4' face='Constantia Italic' text color='#8edc48'>Registro guardado correctamente</font>";
	}
	else
	{	/*===========================================Renta================================================*/
		if($tipoE == "RENTA")
		{
			echo"<center>
					<fieldset><legend>Registro de Renta Inmueble</legend>
						<form name='altaRent' action='' method='POST' id='altaRent' target='_self'>
							<ul>";
							
								$consultaRent = 'SELECT IDrenta FROM renta_inmuebles ORDER BY IDrenta DESC LIMIT 1';
								$ejecutarRent = mysql_query($consultaRent) or die (mysql_error());
								$filasRent = mysql_num_rows($ejecutarRent);
									if($filasRent==0)
									{
										$idRent = 1;
									}
									else
									{
										$idRent = mysql_result($ejecutarRent,0,'IDrenta');
										$idRent = $idRent+1;
									}
							
							echo"<li>
									<input type='hidden' name='idRe' value='$idRent' />
								 </li>
							
								<li>
									<input type='hidden' name='idInm' value='$idInm'>
								</li>
																						
								<li>
									<label>¿Quien lo renta?: <font color='#FF0000'>*</font></label>
								</li>
								<li>
									<table border='0' align='left'>
										<tr>
											<td>
												<input type='text' name='nom' class='rounded' onKeyUp='letras(this.value,nomRen);'>
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
												<input type='text' name='costo' class='rounded' onKeyUp='cost(this.value,cos);'>
											</td>
											<td id='cos' width='22'> </td>
										</tr>
									</table>
								</li>
								
								<li>
									<label>Fecha renta: <font color='#FF0000'>*</font></label>
								</li>
								<li>
									<input type='text' name='fecha_r' class='ancho date rounded calend'>
								</li>
								
								<li>
									<label>Fecha de entrega: <font color='#FF0000'>*</font></label>
								</li>
								<li>
									<input type='text' name='fecha_e' class='ancho date rounded calend'>
								</li>
								
								<li>
									<input type='submit' name='guardar' value='Guardar' class='boton rounded1' />
									<input type='reset' value='Limpiar' class='boton rounded1' />
								</li>
								
								<div id='campos'>
									* Campos Obligatorios
								</div>
							</ul>
						</form>
					</fieldset>
				</center><br/>";
				
			echo"<div id='ajax'></div>
				<script type='text/javascript'>
					$(function (e) {
						$('#altaRent').submit(function (e) {
							e.preventDefault()
							$('#ajax').load('guardar_renta-Inm.php?' + $('#altaRent').serialize())
						})
					})
				</script>";
		}
	
		/*=========================================================Prestamo===========================================================================*/
		if($tipoE == "PRESTAMO")
		{
			echo"<center>
					<fieldset><legend>Registro de Prestamo Inmueble</legend>
						<form name='altaPre' action='' method='POST' id='altaPre' target='_self'>
							<ul>";
							
								$consultaP = 'SELECT IDprestamo FROM prestamo_inmuebles ORDER BY IDprestamo DESC LIMIT 1';
								$ejecutarP = mysql_query($consultaP) or die (mysql_error());
								$filasP = mysql_num_rows($ejecutarP);
									if($filasP==0)
									{
										$idPre = 1;
									}
									else
									{
										$idPre = mysql_result($ejecutarP,0,'IDprestamo');
										$idPre = $idPre+1;
									}
							
							echo"<li>
									<input type='hidden' name='idP' value='$idPre' />
								 </li>
							
								<li>
									<input type='hidden' name='idInm' value='$idInm'>
								</li>
								
								<li>
									<label>¿Quien lo presta?: <font color='#FF0000'>*</font></label>
								</li>
								<li>
									<table border='0' align='left'>
										<tr>
											<td>
												<input type='text' name='nom' class='rounded' onKeyUp='letras(this.value,nomPre);'>
											</td>
											<td id='nomPre' width='22'> </td>
										</tr>
									</table>
								</li>
								
								<li>
									<input type='submit' name='guardar' value='Guardar' class='boton rounded1' />
									<input type='reset' value='Limpiar' class='boton rounded1' />
								</li>
								
								<div id='campos'>
									* Campo Obligatorio
								</div>
							</ul>
						</form>
					</fieldset>
				</center></br>";
				
				echo"<div id='ajax'></div>
				<script type='text/javascript'>
					$(function (e) {
						$('#altaPre').submit(function (e) {
							e.preventDefault()
							$('#ajax').load('guardar_prestamo-Inm.php?' + $('#altaPre').serialize())
						})
					})
				</script>";
		}
	}
?>