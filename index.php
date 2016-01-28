<!DOCTYPE HTML PUBLIC "- / / W3C / / DTD HTML 4.01 Transitional / / EN""Http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Iniciar Sesión</title>
		<link rel="shortcut icon" type="image/x-icon" href="imagenes/inventarioiapem2.png" />
		<link type="text/css" href="css/style_divs.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
		<link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
	</head>

	<body>		
		
		<div id = "contenedor">
			<div id = "banner">
				<img src="imagenes/encab-iapem1.png" width='100%' class = 'bordeimagen'/>
			</div>

			<div id="cssmenu">

			</div>			
			
			<div id="contenido">

					<div id="derecha_login" class='indexfont'>
						SISTEMA DE INVENTARIO IAPEM
						<br/>
						<img align = 'left' src='imagenes/inventarioiapem.png' style = 'padding-left:250px; padding-top: 11px'/>
					

						<!-- INICIO DE FORMULARIO-->

						<div id = 'container'>

							<form name = 'frmlogin' id = 'frmlogin' action = 'validar_login.php' method = 'POST'>

								<div class = 'login'> Iniciar Sesión </div>

								
									<div class = 'username-text'> Usuario: </div>
									<div class = 'password-text'> Contraseña: </div>

										<div class = 'username-field'>
											<input type = 'text' name = 'usuario' />
										</div>

										<div class = 'password-field'> 
											<input type = 'password' name = 'password' />
										</div>

										 
											<input type = 'submit' name = 'start'  value = 'INICIAR'/>
											
								
							</form>
						</div>
						
						<div id='links' class = 'izq'>
							Recuperar <a href='recuperarUser.php' >Usuario</a> ó <a href='recuperarPassword.php'> Password</a>
						</div>
						
						<div class = 'error'>
							<?php
								$msg = $_GET['msg'];
								echo "$msg";
							?>	
						</div>
						
						
					</div>
					
			</div>

			<div id="pie">
				Sistema de Inventario IAPEM
			</div>
		</div>
	</body>
</html>