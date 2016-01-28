<?php
	$idu = $_GET ['IDusuario'];
	
	if ( $idu == '')
	{
		print  "<meta http-equiv = Refresh content = \"0; url = index.php\">";
		exit;
	}
	
	setCookie ('IDusuario',$idu);
	setCookie ('acceso',1);
	setCookie ('tipo','USUARIO');
	session_start();
	$_SESSION ['IDusuario'] = $idu;
	$_SESSION ['acceso'] = 1;
	
	print  "<meta http-equiv = Refresh content = \"0; url = usuario/index_usuario.php\">";
	exit;
?>