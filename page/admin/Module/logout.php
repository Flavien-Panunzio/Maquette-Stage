<?php
	session_start();
	setcookie('connexion', '', time() + 365*24*3600, '/');
	$_SESSION["admin"] = false;
	$_SESSION["message"]="";
	header("location:/page/admin/login.php");
	die();
?>