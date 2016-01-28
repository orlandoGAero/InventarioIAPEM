<?php
	function encode($string)
	{
		$string = utf8_encode($string);
		$control = "iapem";
		$string = $control.$string.$control;
		$string = base64_encode($string);
		return($string);
	}
?>