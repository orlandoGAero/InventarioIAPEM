<?php
	include '../librerias/conexion.php';
	include '../librerias/quitar.php';
	
	$nuevaContr = mysql_real_escape_string(quitar($_REQUEST['nuevaCont']));
	$confirmarContr = mysql_real_escape_string(quitar($_REQUEST['confirmarCont']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
	
	if($nuevaContr == "" && $confirmarContr == "")
	{
		echo"<script>alert('Llenar toda la información antes de continuar')</script>";
	}
	else
	{
		if($nuevaContr != $confirmarContr)
		{
			echo"<script>alert('Las contraseñas ingresadas no coinciden')</script>";
		}
		else
		{
			$nuevaContr = md5($nuevaContr); // encriptamos la nueva contraseña con md5
			$consulta = "UPDATE usuarios SET psw='$nuevaContr' WHERE IDusuario=$idu";
			$ejecutar = mysql_query($consulta) or die(mysql_error());
			
			if($ejecutar)
			{
				echo"<script>alert('Contraseña cambiada correctamente')</script>";
			}
			else
			{
				echo"<script>alert('Error al intentar cambiar la contraseña')</script>";
			}
		}
	}
?>