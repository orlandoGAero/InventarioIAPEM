<?php

	include 'librerias/conexion.php';

	
	$usuario = mysql_real_escape_string ($_REQUEST ['usuario']);
	$password = mysql_real_escape_string($_REQUEST ['password']);
		$password = md5($password);

	$band = 0;

	if ( $usuario == "" or $password == "")
	{
		$band = 1;
		$msg = " Llenar toda la información antes de continuar ";
		print  "<meta http-equiv = Refresh content = \"0; url = index.php?msg=$msg\">";
		exit;
	}

	if ( $band == 0) 
	{
		$consulta = " SELECT *
					  FROM usuarios
					  WHERE usuario = '$usuario' and psw = '$password' ";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);

		if ( $filas == 0)
		{
			$band = 1;
			$msg = " El usuario y/o la contraseña son incorrectas ";
			print  "<meta http-equiv = Refresh content = \"0; url = index.php?msg=$msg\">";
			exit;
		}	
	}

	if ( $band == 0)
	{
		$activo = mysql_result($ejecutar, 0, 'activo');

		if ( $activo == 'No')
		{
			$band = 1;
			$msg = " El usuario no esta activo, consulta a tu administrador ";
			print  "<meta http-equiv = Refresh content = \"0; url = index.php?msg=$msg\">";
			exit;
		}
	}

	if ( $band == 0)
	{
		$idu = mysql_result($ejecutar, 0, 'IDusuario');
		$tipo = mysql_result($ejecutar, 0, 'tipo');

		if ($tipo == 'ADMINISTRADOR')
		{
			print  "<meta http-equiv = Refresh content = \"0; url = cookieAdmin.php?IDusuario=$idu\">";
					
		} else {

				print  "<meta http-equiv = Refresh content = \"0; url = cookieUser.php?IDusuario=$idu\">";
								
				}
	}
?>