<?php
	function decode_get($string)
	{
		$cadena = explode ("?",$string);
		$string = $cadena[1];
		$string = base64_decode($string);
		$control = "iapem";
		$string = str_replace($control, "","$string");
		$cad_get = explode("&",$string);
		foreach($cad_get as $value)
		{
			$val_get = explode("=",$value);
			$_GET[$val_get[0]] = utf8_decode($val_get[1]);
		}
	}
?>