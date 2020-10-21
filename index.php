<?php
	session_start();
	if(!isset($_SESSION["id_usuario"]))
		include("../kabum/login/login.php");
	else
		include("../kabum/cliente/cliente.php");
?>