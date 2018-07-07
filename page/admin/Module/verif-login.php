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

		//récupère données forumulaire + encodage mpd
		$login=htmlspecialchars($_POST["user-name"]);
		$mdp=sha1(htmlspecialchars($_POST["mdp"]));		

		//requete SQL login + mdp
		include '../../../configuration/requete.php';
		$requete='SELECT * FROM login WHERE Login=?';
		$mdpbdd=requeteWHERE($requete,$login)[0]->MotDePasse;

		//comparaison identifiants avec BDD + redirection
		if ($mdp == $mdpbdd) {
			if ($_POST["cookies"]=='on') {
				setcookie('connexion', 'vrai', time() + 365*24*3600, '/');
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
		$_SESSION["message"]="";
		header("location:/page/admin/login.php");
		die();
	}
?>