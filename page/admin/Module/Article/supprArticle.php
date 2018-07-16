<?php 
	if (isset($_COOKIE['connexion']) && $_COOKIE['connexion']=="vrai") {
		$_SESSION["admin"] = true;
	}
	if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
		header("location:/page/admin/login.php");
	}
?>
<?php
	include ('../../../../configuration/requete.php');
	$id = $_POST["id"];
	$connection=connect();
	$requete='DELETE FROM articles WHERE Id="'.$id.'"';
	$connection->query($requete);
?>