<?php
	//démarre un session et l'initialise à faux
	session_start();
	//setcookie('connexion', '', time() + 365*24*3600);
	if (isset($_COOKIE['connexion'])&&$_COOKIE['connexion']=="vrai") {
		$_SESSION["admin"] = true;
	}
	else
	$_SESSION["admin"] = false;

	//verifie que le formulaire est bien remplis
	if (isset($_POST)&&count($_POST)>0) {

		//lien fichiers config BDD
		include("../../../configuration/config.php");
		include("../../../includes/connection.php");

		//récupère données forumulaire + encodage mpd
		$login=htmlspecialchars($_POST["user-name"]);
		$mdp=sha1(htmlspecialchars($_POST["mdp"]));		

		//requete SQL login + mdp
		$requete='SELECT * FROM login WHERE Login="'.$login.'"';
		$resultats=$connection->query($requete);
		$user=$resultats->fetchAll(PDO::FETCH_OBJ); $resultats->closeCursor();
		$mdpbdd=$user[0]->MotDePasse;

		//comparaison identifiants avec BDD + redirection
		if ($mdp == $mdpbdd) {
			if ($_POST["cookies"]=='on') {
				setcookie('connexion', 'vrai', time() + 365*24*3600);
				sleep(5);
				//var_dump($_COOKIE['connexion']);die();
			}
			$_SESSION["admin"] = true;
			header("location:/page/admin/index.php");
			die();
		}
		else{
			$_SESSION["message"]="Identifiants incorect";
			header("location:/page/admin/login.php");
			die();
		}
	}
	//rénitialise $_session[message]+redirection
	else{
		unset($_SESSION["message"]);
		header("location:/page/admin/login.php");
		die();
	}
?>