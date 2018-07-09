<?php
	include ('../../../../configuration/requete.php');
	$id = $_POST["id"];
	$connection=connect();
	$requete='DELETE FROM articles WHERE Id="'.$id.'"';
	$connection->query($requete);
?>