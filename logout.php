<?php
	setCookie("acceso","");
	setCookie("IDusuario","");
	setCookie("tipo","");
	@session_start();
	session_unset();
	session_destroy();
	print  "<meta http-equiv = Refresh content = \"0; url = index.php\">";
?>