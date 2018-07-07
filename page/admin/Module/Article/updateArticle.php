<?php
	
	include ('../../../../configuration/requete.php');

	if (isset($_POST["id"])) {
		$id = $_POST["id"];
		$requete1 = 'SELECT Visible FROM articles WHERE Id=?';
		$infos=requeteWHERE($requete1, [$id])[0]->Visible;

		//var_dump($infos);die();

		if ($infos==1)
			$visible=0;
		else
			$visible=1;

		$connection=connect();
		$requete='UPDATE articles SET Visible="'.$visible.'" WHERE Id="'.$id.'"';
		$connection->query($requete);
	}
?>