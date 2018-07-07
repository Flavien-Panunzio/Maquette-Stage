<?php
	session_start();
	//unset($_SESSION["message"]);
	//initialise $_session[message]
	if (!isset($_SESSION["message"])) {
		$_SESSION["message"]="";
	}

	//var_dump($_COOKIE);die();
	if (isset($_COOKIE['connexion']) && $_COOKIE['connexion']=="vrai") {
		$_SESSION["admin"] = true;
	}

	//redirection si l'utilisateur est connecté
	if (isset($_SESSION["admin"])&&$_SESSION["admin"]==true) {
		header("location:/page/admin/index.php");
		die();
	}
	$_SESSION["admin"] = false;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Twitter meta-->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:site" content="@pratikborsadiya">
	<meta property="twitter:creator" content="@pratikborsadiya">

	<!-- Facebook Meta-->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Vali Admin">
	<meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
	<meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
	<meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
	<meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
	
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
				<form class="login-form" method="POST" action="Module/verif-login.php">
					<h6 class="return-home"><a href="/">retour au site</a></h6>
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Connexion</h3>
					<div class="form-group">
						<label class="control-label">Nom d'utilisateur</label>
						<input class="form-control" type="text" placeholder="Email" autofocus name="user-name">
					</div>
					<div class="form-group">
						<label class="control-label">Mot de Passe</label>
						<input class="form-control" type="password" placeholder="Password" name="mdp">
					</div>
					<div class="form-group">
						<div class="utility">
							<div class="animated-checkbox">
								<label>
									<input type="checkbox" name="cookies"><span class="label-text">Rester Connecter</span>
								</label>
							</div>
							<p class="semibold-text mb-2"><a href="#" data-toggle="flip">Mot de Passe oublié</a></p>
						</div>
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Se Connecter</button>
					</div>
				</form>
				<form class="forget-form" action="Module/mail.php" method="POST">
					<h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Mot de Passe oublié</h3>
					<div class="form-group">
						<label class="control-label">Nom d'utilisateur</label>
						<input class="form-control" type="text" placeholder="Nom d'utilisateur" name="pseudo">
					</div>
					<div class="form-group btn-container">
						<button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RÉNITIALISER</button>
					</div>
					<div class="form-group mt-3">
						<p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Retour à la connexion</a></p>
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
		<script type="text/javascript" src="/js/plugins/sweetalert.min.js"></script>
		<script type="text/javascript">
			// Login Page Flipbox control
			$('.login-content [data-toggle="flip"]').click(function() {
				$('.login-box').toggleClass('flipped');
				return false;
			});
			var mess="<?= $_SESSION["message"];?>";
			if (mess=="Mot de Passe modifié avec succès") {
				$(document).ready(function(){
					$.notify({
						icon: "fa fa-check",
						title: "Mot de Passe modifié avec succès",
						message: ""
					},{
						type: "succes"
					});
				});
			}
			if (mess=="Identifiants incorect") {
				$(document).ready(function(){
					$.notify({
						icon: "fa fa-exclamation-triangle",
						title: " Identifiants incorect",
						message: ""
					},{
						type: "danger"
					});
				});
			}
		</script>
	</body>
</html>