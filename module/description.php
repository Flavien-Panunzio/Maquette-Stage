<?php
	include '../configuration/requete.php';
	$requete=('SELECT * FROM articles WHERE MisEnAvant="1"');
	$requete=requeteWHERE($requete);

	$description=$requete[$_POST["id"]]->Description;
	echo $description;
?>