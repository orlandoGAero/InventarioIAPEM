<!DOCTYPE HTML PUBLIC "- / / W3C / / DTD HTML 4.01 Transitional / / EN""Http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
	<head>
		<title>Modificar Inventario Bienes Muebles</title>
		<link rel="shortcut icon" type="image/x-icon" href="../../imagenes/inventarioiapem2.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link type="text/css" href="../../css/style_divs.css" rel="stylesheet" />
		<link type="text/css" href="../../css/stylemenu.css" rel="stylesheet" />
		<link type="text/css" href="../../css/style_menu_vert.css" rel="stylesheet"/><style type="text/css">._css3m{display:none}</style>
		<link type="text/css" href="../../css/estiloform.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../../css/ayuda.css"/>
		<link type="text/css" href="../../css/style_table.css" rel="stylesheet"/><!--Estilo tabla-->
		<script type="text/javascript" src="../../librerias/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="../../librerias/validacion2.js"></script>
		<?php @session_start();
			if ($_SESSION['acceso'] == "" or $_SESSION['IDusuario'] == "")
			{
				print  "<meta http-equiv = Refresh content = \"0; url = ../../index.php\">";
			}
			$acceso = $_COOKIE ['acceso'];
			$idu = $_COOKIE ['IDusuario'];
			$tipo = $_COOKIE ['tipo'];
			if($acceso != '1')
			{
				print  "<meta http-equiv = Refresh content = \"0; url = ../../index.php\">";
			}
			include '../../librerias/conexion.php';
			$consulta = " 	SELECT *
							FROM usuarios
							WHERE IDusuario = '$idu' ";
			$ejecutar = mysql_query ($consulta) or die (mysql_error());
				$usuario = mysql_result ($ejecutar, 0, 'usuario');
				$nombre = mysql_result ($ejecutar, 0, 'nombre');
				$nombre = utf8_encode($nombre);
				$ap = mysql_result ($ejecutar, 0, 'appat');
				$ap = utf8_encode($ap);
				$am = mysql_result ($ejecutar, 0, 'ammat');
				$am = utf8_encode($am);
				$nombreUs = "$nombre $ap $am";
		?>
			<script>
			!window.jQuery && document.write('<script src="../../librerias/jquery-1.4.3.min.js"><\/script>');
		</script>
		<script type = "text/javascript" src = "../../librerias/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox-1.3.4.css" media = "screen" />	
			<script type = "text/javascript">
			$(document).ready(function() 
			{
				$("#iapem").fancybox();
			});
			</script>
		<script language = "JavaScript">
			<!-- Begin
			function popUp(URL) 
			{
				day = new Date();
				id = day.getTime();
				eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1 ,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=0,width=100,height=300,left = 0,top = 0');");
			}
			// End -->
		</script>
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
	</head>
	<body>
		<div id="contenedor">
			<div id="banner">
				<img src="../../imagenes/encab-iapem1.png" width='100%' class='bordeimagen'/>
			</div>
		
			<div id="cssmenu">
				<ul class="menu">
					<li  class='active'><a href="../indexadmin.php">Inicio</a></li>
					
					<li class='has-sub'><a href="#">Coordinación</a>
						<ul>
							<li><a href="../registro_coordinacion.php">Registrar</a></li>
							<li><a href="../buscar_coordinacion.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Responsable</a>
						<ul>
							<li><a href="../registro_responsable.php">Registrar</a></li>
							<li><a href="../buscar_responsable.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Usuarios</a>
						<ul>
							<li><a href="../registrar_usuario.php">Registrar</a></li>
							<li><a href="../buscar_usuario.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Reportes</a>
						<ul>
							<li><a href="../reportespdf/reporte_responsables.php">Responsable</a></li>
							<li><a href="../reportespdf/reporte_coordinaciones.php">Coordinación</a></li>
						</ul>
					</li>

					<li>
						<div style="display: none;">
							<div id = "about" style = "width:500px;height:300;overflow:auto;background:transparent;">
								<img src = '../../imagenes/Acerca.png' height = '300' width = '500'>
							</div>
						</div>
						<a id = 'iapem' href = '#about'>Acerca de</a>
					</li>
					
					<li class = 'has-sub'><a href="#"> <?php echo "$usuario" ?> </a>
						<ul>
							<li><a href="../cambiar_contrasena.php">Cambiar Contraseña</a></li>
							<li><a href="../../logout.php?IDusuario=$idu">Salir</a></li>
						<ul>
					</li>
				</ul>
			</div>
			
			<div id="contenido">

				<div id="izquierda3">
					<ul id="css3menu1" class="topmenu">
						<li class="topfirst"><a href="#" style="width:139px;"><span>Bienes Muebles</span></a>
							<ul>
								<li class="subfirst"><a href="registrar_muebles.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="buscar_muebles.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Bienes Inmuebles</span></a>
							<ul>
								<li class="subfirst"><a href="../inmuebles/registrar_Inmuebles.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../inmuebles/buscar_Inmuebles.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Bienes Informáticos</span></a>
							<ul>
								<li class="subfirst"><a href="../tecnologias/registrar_tecnologias.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../tecnologias/buscar_artInformaticos.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Planta Vehicular</span></a>
							<ul>
								<li class="subfirst"><a href="../vehiculos/registrar_plantaVehicular.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../vehiculos/buscar_vehiculo.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
					</ul>
				</div>
				
				<div id="derecha3">
					<div id="botones_sec">
						<a href="buscar_inventario-muebles.php"><img src='../../imagenes/back.png' ALT="Regresar" TITLE="Regresar" vspace=4 hspace=4/></a>
					</div>
					
					<?php
						include '../../librerias/conexion.php';
						include '../../librerias/decode.php';
						
						decode_get($_SERVER["REQUEST_URI"]);
						
						include '../../librerias/quitar.php';
						
						$codigoNuevoM = mysql_real_escape_string(quitar($_GET['codigoNuevoM']));
						
						/*consulta para obtener el nombre de usuario que realizo la última modificación*/
						$consultaUs = "SELECT u.nombre,u.appat,u.ammat,bm.fecha_mod
									   FROM bienes_muebles AS bm,usuarios AS u
									   WHERE bm.codigoNuevoM='$codigoNuevoM' AND bm.IDusuario=u.IDusuario";
						$ejecutarUs = mysql_query($consultaUs) or die (mysql_error());
						$nomUs = mysql_result($ejecutarUs,0,'nombre');
						$nomUs = utf8_encode($nomUs);
						$apUs = mysql_result($ejecutarUs,0,'appat');
						$apUs = utf8_encode($apUs);
						$amUs = mysql_result($ejecutarUs,0,'ammat');
						$amUs = utf8_encode($amUs);
						$nombreUs = "$nomUs $apUs $amUs";
						$fechaMod = mysql_result($ejecutarUs,0,'fecha_mod');
						
						echo"<table id='miTabla'>
								<tr>
									<th colspan='2'>Registro de modificación</th>
								</tr>
								<tr>
									<th>Fecha de última modificación:</th><td>$fechaMod</td>
								</tr>
								<tr>
									<th>Realizada por:</th><td>$nombreUs</td>
								</tr>
							</table><br/>";
							
						/*--*/
						$consulta2 = "SELECT bm.codigoNuevoM,bm.codigoAnterior,bm.caracteristicas,bm.area_ubicacion,bm.fecha_ingreso,bm.activo,bm.IDinmueble,bm.IDcoordinacion,bm.IDresguardatario,bm.IDmueble,
											 bi.nombre_sede,
											 c.coordinacion,
											 r.nombre as nomRe,r.ap_paterno,r.ap_materno,
											 m.nombre
									  FROM bienes_muebles AS bm,bienes_inmuebles AS bi,coordinaciones AS c,resguardatarios AS r,muebles AS m
									  WHERE codigoNuevoM = '$codigoNuevoM'
										AND bi.IDinmueble=bm.IDinmueble 
										AND c.IDcoordinacion=bm.IDcoordinacion
										AND r.IDresguardatario=bm.IDresguardatario
										AND m.IDmueble=bm.IDmueble";
						$ejecutar2 = mysql_query($consulta2) or die (mysql_error());
												
						$idI = mysql_result($ejecutar2,0,'IDinmueble');
						$nomInm = mysql_result($ejecutar2,0,'nombre_sede');
						$nomInm = utf8_encode($nomInm);
						$idC = mysql_result($ejecutar2,0,'IDcoordinacion');
						$nomC = mysql_result($ejecutar2,0,'coordinacion');
						$nomC = utf8_encode($nomC);
						$idRe = mysql_result($ejecutar2,0,'IDresguardatario');
						$nomR = mysql_result($ejecutar2,0,'nomRe');
						$nomR = utf8_encode($nomR);
						$apR = mysql_result($ejecutar2,0,'ap_paterno');
						$apR = utf8_encode($apR);
						$amR = mysql_result($ejecutar2,0,'ap_materno');
						$amR = utf8_encode($amR);
						$nombreR = "$nomR $apR $amR";
						$fechaIn = mysql_result($ejecutar2,0,'fecha_ingreso');
						$codigoNuevoM = mysql_result($ejecutar2,0,'codigoNuevoM');
						$codigoAnteriorM = mysql_result($ejecutar2,0,'codigoAnterior');
						$idMue = mysql_result($ejecutar2,0,'IDmueble');
						$nomMue = mysql_result($ejecutar2,0,'nombre');
						$nomMue = utf8_encode($nomMue);
						$caract = mysql_result($ejecutar2,0,'caracteristicas');
						$caract = utf8_encode($caract);
						$areaUb = mysql_result($ejecutar2,0,'area_ubicacion');
						$areaUb = utf8_encode($areaUb);
						$activo = mysql_result($ejecutar2,0,'activo');
					?>
					
					<center>
						<fieldset><legend>Modificación de Inventario Bienes Muebles</legend>
							<form name='modInvMu' action='' method='POST' id='modInvMu' target='_self'>
								<ul>
									<li>
										<label>Inmueble:</label>
									</li>
									<li>
										<?php

											echo"<select name='idInm' class='select'><option value='$idI'>$nomInm</option>";
											
											$consultaI = "SELECT IDinmueble,nombre_sede FROM bienes_inmuebles WHERE activo='Si' AND IDinmueble != $idI ORDER BY nombre_sede";
											$ejecutarI = mysql_query($consultaI) or die (mysql_error());
											$filasI = mysql_num_rows($ejecutarI);
												for($y=0;$y<$filasI;$y++)
												{
													$idInm = mysql_result($ejecutarI,$y,'IDinmueble');
													$nomI = mysql_result($ejecutarI,$y,'nombre_sede');
													$nomI = utf8_encode($nomI);
													echo"<option value='$idInm'>$nomI</option>";
												}
										?>
												</select>
									</li>
									
									<li>
										<label>Coordinación o Área:</label>			
									</li>
									<li>	
										<?php
											
											echo"<select name='idCo' class = 'select'><option value='$idC'>$nomC</option>";
											
											$consultaC = "SELECT IDcoordinacion,coordinacion FROM coordinaciones WHERE activo='Si' AND IDcoordinacion != $idC ORDER BY coordinacion";
											$ejecutarC = mysql_query($consultaC) or die (mysql_error());
											$filasC = mysql_num_rows($ejecutarC);
												for($y=0;$y<$filasC;$y++)
												{
													$idCo = mysql_result($ejecutarC,$y,'IDcoordinacion');
													$nomCo = mysql_result($ejecutarC,$y,'coordinacion');
													$nomCo = utf8_encode($nomCo);
													echo"<option value='$idCo'>$nomCo</option>";
												}
										?>
												</select>	
									</li>
										
									<li>
										<label>Responsable:</label>		
									</li>
									<li>
										<?php
										
											echo"<select name='idR' class = 'select'><option value='$idRe'>$nombreR</option>";
											
											$consultaR = "SELECT IDresguardatario,nombre,ap_paterno,ap_materno FROM resguardatarios WHERE activo='Si' AND IDresguardatario != $idRe ORDER BY nombre";
											$ejecutarR = mysql_query($consultaR) or die (mysql_error());
											$filasR = mysql_num_rows($ejecutarR);
												for($y=0;$y<$filasR;$y++)
												{
													$idR = mysql_result($ejecutarR,$y,'IDresguardatario');
													$nombre = mysql_result($ejecutarR,$y,'nombre');
													$nombre = utf8_encode($nombre);
													$ap = mysql_result($ejecutarR,$y,'ap_paterno');
													$ap = utf8_encode($ap);
													$am = mysql_result($ejecutarR,$y,'ap_materno');
													$am = utf8_encode($am);
													$nombreRe = "$nombre $ap $am";
													echo"<option value='$idR'>$nombreRe</option>";
												}
										?>
												</select>
									</li>
										
									<li>
										<label>Fecha Ingreso: <font color='#FF0000'>*</font></label>
									</li>
									<li>
										<?php
											echo"<input type='text' name='fecha' value='$fechaIn' size='30' class='ancho date rounded calend'>";
										?>
									</li>
									
									<li>
										<label>Código Nuevo: <font color='#FF0000'>*</font></label>
									</li>
									<li>
										<table border='0' align='left'>
											<tr>
												<td>
													<?php
														echo"<input type='text' name='nuevoCodM' value='$codigoNuevoM' size='30' class = 'rounded' onKeyUp='codnuevo(this.value,co);'>";
													?>
												</td>
												<td id='co' width='22'> </td>
												<td> <a class = "tooltip" > <font size = '4' color = '#0000FF'>(?)</font> <span class="custom help"> <img src = "../../imagenes/Help.png" alt = "Help" height="35" width="35" />Ingresa el Código Nuevo del artículo, por ejemplo: </br> -TOLHP111001-00</span></a></td>
											</tr>
										</table>
									</li>
										
									<li>
										<label>Código Anterior: </label>
									</li>
									<li>
										<table border='0' align='left'>
											<tr>
												<td>
													<?php
														echo"<input type='text' name='anteriorCodM' value='$codigoAnteriorM' size='30' class = 'rounded' onKeyUp='codanterior(this.value,coda);'>";
													?>
												</td>
												<td id='coda' width='22'>  </td>
												<td> <a class = "tooltip" > <font size = '4' color = '#0000FF'>(?)</font> <span class="custom help"> <img src = "../../imagenes/Help.png" alt = "Help" height="35" width="35" />Ingresa el Código Anterior del artículo, por ejemplo: </br> -MORP11009-00</span></a></td>
											</tr>
										</table>
									</li>
									
									<li>
										<label>Artículo:</label>
									</li>
									<li>
										<?php
											
											echo"<select name='idM' class = 'select'><option value='$idMue'>$nomMue</option>";
											
											$consultaM = "SELECT IDmueble,nombre FROM muebles WHERE activo='Si' AND IDmueble != $idMue ORDER BY nombre";
											$ejecutarM = mysql_query($consultaM) or die (mysql_error());
											$filasM = mysql_num_rows($ejecutarM);
												for($y=0;$y<$filasM;$y++)
												{
													$idM = mysql_result($ejecutarM,$y,'IDmueble');
													$nomM = mysql_result($ejecutarM,$y,'nombre');
													$nomM = utf8_encode($nomM);
													echo"<option value='$idM'>$nomM</option>";
												}
											?>
												</select>
									</li>
										
									<li>
										<label>Características: <font color='#FF0000'>*</font></label>
									</li>
									<li>
										<?php
											echo"<textarea name='caract' rows='7' cols='75'>$caract</textarea>";
										?>
									</li>
									
									<li>
										<label>Área de Ubicación: <font color='#FF0000'>*</font></label>
									</li>
									<li>
										<table border='0' align='left'>
											<tr>
												<td>
													<?php
														echo"<input type='text' name='area' value='$areaUb' size='30' class = 'rounded' onKeyUp='letras(this.value,ar);'>";
													?>
												</td>
												<td id='ar' width='22'>  </td>
												<td> <a class = "tooltip" > <font size = '4' color = '#0000FF'>(?)</font> <span class="custom help"> <img src = "../../imagenes/Help.png" alt = "Help" height="35" width="35" />Ingresa la ubicación del artículo, por ejemplo: </br> -Presidencia</span></a></td>
											</tr>
										</table>
									</li>
									
									<li>
										<label>Activo:</label>
									</li>
									<li class='radio'>	
										Si<input type='radio' name='activo' value='Si' checked />
										No<input type='radio' name='activo' value='No' disabled='disabled'/>
									</li>
									
									<li>
										<input type='submit' name='modificar' value='Modificar' class='boton rounded1' />
									</li>
									
									<div id="campos">
										* Campos Obligatorios
									</div>
								</ul>
							</form>
						</fieldset>
					</center>
					
					<!--crear una division que se llame ajax, debe de ir antes o despues del formulario-->
					<div id="ajax"></div>
					
					<script type="text/javascript">
						$(function (e) {
							$('#modInvMu').submit(function (e) {
								e.preventDefault()
								$('#ajax').load('modificar_inventario-muebles2.php?' + $('#modInvMu').serialize())
							})
						})
					</script>
				</div>
			</div>

			<div id="pie">
				Sistema de Inventario IAPEM
			</div>
		</div>
	</body>
</html>
