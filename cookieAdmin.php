<?php
	$idu = $_GET ['IDusuario'];
	
	if ( $idu == '')
	{
		print  "<meta http-equiv = Refresh content = \"0; url = index.php\">";
	}
	
	setCookie ('IDusuario',$idu);
	setCookie ('acceso',1);
	setCookie ('tipo','ADMINISTRADOR');
	session_start();
	$_SESSION ['IDusuario'] = $idu;
	$_SESSION ['acceso'] = 1;
	
	print  "<meta http-equiv = Refresh content = \"0; url = administrador/indexadmin.php\">";
?>