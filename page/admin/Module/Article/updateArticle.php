<?php 
	if (isset($_COOKIE['connexion']) && $_COOKIE['connexion']=="vrai") {
		$_SESSION["admin"] = true;
	}
	if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
		header("location:/page/admin/login.php");
	}
	
	include ('../../../../configuration/requete.php');

	if (isset($_POST["id"])) {
		$id = $_POST["id"];
		if ($_POST["btn"]=="visible") {
			$requete1 = 'SELECT Visible FROM articles WHERE Id=?';
			$infos=requeteWHERE($requete1, [$id])[0]->Visible;

			if ($infos==1)
				$visible=0;
			else
				$visible=1;

			$connection=connect();
			$requete='UPDATE articles SET Visible="'.$visible.'" WHERE Id="'.$id.'"';
			$connection->query($requete);
			$requete->closeCursor();
		}
		elseif ($_POST["btn"]=="up") {
			var_dump('fefs');
			$requete2 = 'SELECT MisEnAvant FROM articles WHERE Id=?';
			$infos=requeteWHERE($requete2, [$id])[0]->MisEnAvant;

			if ($infos==1)
				$up=0;
			else
				$up=1;

			$connection=connect();
			$requete='UPDATE articles SET MisEnAvant="'.$up.'" WHERE Id="'.$id.'"';
			$connection->query($requete);
			$requete->closeCursor();
		}
	}
?>