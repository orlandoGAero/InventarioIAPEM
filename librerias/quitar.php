<?php
	function quitar ($cadena)
	{
		$nopermitidos = array("'",'\\','<','>',"\"",";");
		$cadena = str_replace($nopermitidos,"",$cadena);
		return $cadena;
	}
?>