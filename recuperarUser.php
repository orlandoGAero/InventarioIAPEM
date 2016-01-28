<!DOCTYPE HTML PUBLIC "- / / W3C / / DTD HTML 4.01 Transitional / / EN""Http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Recuperar Usuario</title>
		<link rel="shortcut icon" type="image/x-icon" href="imagenes/inventarioiapem2.png" />
		<link type="text/css" href="css/style_divs.css" rel="stylesheet" />
		<link type="text/css" href="css/stylemenu.css" rel="stylesheet">
		<link type="text/css" href="css/estiloform.css" rel="stylesheet">
		<script type="text/javascript" src="librerias/jquery-1.4.2.min.js"></script>
		
		<script type='text/javascript'>
			$(function (e) {
				$('#reus').submit(function (e) {
					e.preventDefault()
					$('#ajax').load('enviarUser2.php?' + $('#reus').serialize())
				})
			})
		</script>
	</head>

	<body>		
		
		<div id = "contenedor">
			<div id = "banner">
				<img src="imagenes/encab-iapem1.png" width='100%' class = 'bordeimagen'/>
			</div>

			<div id="cssmenu">

			</div>			
			
			<div id="contenido">

				<div id="derecha">				
					<div id="botones_sec">
						<a href='index.php'><img src='imagenes/arrow_left.png' ALT="Regresar" TITLE="Regresar" vspace=4 hspace=4/></a>
					</div>
						
					<?php
						  require_once('librerias/recaptchalib.php');
  							$publickey = "6LdZA-YSAAAAAL7daI_pM7sLvylBozwiKbNqHxZE"; 
					?>
					<center>
						<fieldset><legend>Recuperar Usuario</legend>
							<form name='reus' action='' method='POST' id='reus' target='_self'>
								<ul>
									<li>
										<label>Ingresa tu correo: <font color='#FF0000'>*</font></label>
									</li>
									<li>
										<input type='text' name='correo' size='30' class='rounded'/><br/>
									</li>
									
									<br/>
									<div align = 'center'>
										<?php echo recaptcha_get_html($publickey); ?>
									</div>
											
									<li>
										<input type='submit' name='enviar' value='Enviar' class='boton rounded1'>
										<input type='reset' value='Limpiar' class = 'boton rounded1'>
									</li>
									
									<div id="campos">
										* Campos Obligatorios
									</div>
								</ul>
							</form>
						</fieldset>
					</center>
					
					<div id="ajax">&nbsp;</div>
				</div>
			</div>

			<div id="pie">
				Sistema de Inventario IAPEM
			</div>
		</div>
	</body>
</html>