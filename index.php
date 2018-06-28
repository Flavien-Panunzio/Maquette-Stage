<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" href="/style/default/css/style.css">
</head>
<body>
	<div class="raw">
		<header class="col-12 no-padding">
			<h1>Lorem sur Allier</h1>
			<nav class="col-12 no-padding menu">
				<ul class="no-padding">
					<li><a href="#">Découvrir La Ville</a></li>
					<li><a href="#">Vos Élus</a></li>
					<li><a href="#">Infos Pratiques</a></li>
					<li><a href="#">Cadre De Vie</a></li>
					<li><a href="#">Vie Associative</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</header>

		
		<div class="container-fluid">
			<div class="row">

				<?php include 'carousel.php'; ?>

				<div class="col-3 demarches">
					<div class="une"><h2>MES DÉMARCHES</h2></div>
					<div class="ptit-truc"></div>
					<ul>
						<li>État-civil / Éléctions</li>
						<li>Jeunesse / Vie Scolaire</li>
						<li>Nouveaux arrivants</li>
						<li>Autorisations</li>
						<li>Déclarations</li>
						<li>Associations</li>
					</ul>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-6">
							<div><h2>ACTUALITÉS</h2></div>
							<div>31 SEPTEMBRE</div>
							<div>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet congue nisl, nec sollicitudin justo. Mauris bibendum lacinia quam, nec mattis justo sollicitudin sit amet. Phasellus aliquet, quam et porta scelerisque, mauris nunc sollicitudin massa, in ultrices est lectus sed eros. Donec id enim tortor. Praesent finibus lorem id porta aliquam. Donec non urna ante. In aliquet ultrices pellentesque.
							</div>
						</div>
						<div class="col-6">
							<div class="row">
								<div class="col-6">
									<div>21 OCTOBRE</div>
								</div>
								<div class="col-6">
									<div>19 AOÛT</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div>9 SEPTEMBRE</div>
								</div>
								<div class="col-6">
									<div>20 AVRIL</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div><h2>ACTUALITÉS</h2></div>
					<i class="fas fa-arrow-left"></i>
					<i class="fas fa-arrow-right"></i>
					<div class="carousel">1</div>
					<div class="carousel">2</div>
					<div class="carousel">3</div>
					<div class="carousel">4</div>
					<div class="carousel">5</div>
				</div>
			</div>
		</div>

		<div id="retourenhaut" style="z-index: 99999;">
			<a id="back-to-top" href=""><i class="fa fa-arrow-up" aria-hidden="true" style="color: white;"></i></a>
		</div>

		<footer class="container-fluid">
			<div class="row">
				<div class="col-5">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu leo sodales libero eleifend semper. Proin ac leo nisi. Quisque sem nisl, accumsan porta pharetra vitae, sollicitudin eget nunc. Nulla molestie tempus rhoncus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
				</div>
				<div class="col-5">
					Integer laoreet diam nunc, sed suscipit neque pulvinar nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin at neque a commodo. Nullam diam urna, tincidunt eu congue id, scelerisque sit amet felis. Vestibulum a ligula ut sem sollicitudin congue. Aenean sit amet felis vel lacus malesuada viverra ut vitae dolor. Donec et purus hendrerit, suscipit lacus a, porttitor arcu. 
				</div>
				<div class="col-2">
					<i class="fab fa-facebook-square" style="font-size:40px;"></i>
					<i class="fab fa-twitter-square" style="font-size:40px;"></i>
					<i class="fab fa-linkedin" style="font-size:40px;"></i>
				</div>
				<div class="col-12">
					<h5 class="text-center">Site créé par <a target="_blanck" href="http://panun.tk">Flavien Panunzio</a> | Copyright &copy 2018 TESTS DE FRANCE Tout droits réservés</h5>
				</div>
			</div>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>