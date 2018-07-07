<?php
	session_start();
	$token=$_GET["token"];

	include ('../../../configuration/requete.php');

	$requete='SELECT * FROM login WHERE Token=?';
	$infos=requeteWHERE($requete,$token)[0]->Token;

	if (!$token=$infos) {
		header("location:/page/admin");
		die();
	}

	if (isset($_POST["mdp1"])) {
		if ($_POST["mdp1"]==$_POST["mdp2"]) {
			$newmdp=sha1($_POST["mdp1"]);

			$requete=$connection->prepare('UPDATE login SET MotDePasse=?');
			$requete->execute(array($newmdp));
			$requete->closeCursor();

			$_SESSION["message"]="Mot de Passe modifié avec succès";
			header("location:/page/admin");
			die();
		}
		else
			$_SESSION["message"]="pas bien";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/style/defaultadmin/css/main.css">
	<!-- Font-icon css-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<body>
		<section class="material-half-bg">
			<div class="cover"></div>
		</section>
		<section class="login-content">
			<div class="logo">
				<!--<img src="/img/logo_perso.png">-->
			</div>
			<div class="login-box">
				<form class="login-form" method="POST">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Mot de Passe oublié</h3>
					<div class="form-group">
						<label class="control-label">Nouveau Mot de Passe</label>
						<input class="form-control" type="text" placeholder="Nouveau Mot de Passe" name="mdp1">
					</div>
					<div class="form-group">
						<label class="control-label">Répéter le Mot de Passe</label>
						<input class="form-control" type="text" placeholder="Répéter le Mot de Passe" name="mdp2">
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RÉNITIALISER</button>
					</div>
				</form>
			</div>
		</section>
		<!-- Essential javascripts for application to work-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="/js/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<script src="/js/main.js"></script>
		<!-- The javascript plugin to display page loading on top-->
		<script src="/js/plugins/pace.min.js"></script>
		<script type="text/javascript" src="/js/plugins/bootstrap-notify.min.js"></script>
		<script type="text/javascript">
			// Login Page Flipbox control
			var mess="<?= $_SESSION["message"];?>";
			if (mess=="pas bien") {
				$(document).ready(function(){
					$.notify({
						icon: "fa fa-exclamation-triangle",
						title: " Les mots de passe ne correspondent pas",
						message: ""
					},{
						type: "danger"
					});
				});
			}
		</script>
	</body>
</html>

