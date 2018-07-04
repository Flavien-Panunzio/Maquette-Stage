<?php
	session_start();
	setcookie('connexion', '', time() - 365*24*3600, null, null, false, true);
	$_SESSION["admin"] = false;
	header("location:/page/admin/login.php");
	die();
?>