<?php
	include 'configuration/requete.php';
?>
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
				<?php include 'module/carousel.php'; ?>
				<div class="col-md-3 demarches">
					<div class="une"><h2>MES DÉMARCHES</h2></div>
					<div class="ptit-truc"></div>
					<ul>
						<li><a href="#">État-civil / Éléctions</a></li>
						<li><a href="#">Jeunesse / Vie Scolaire</a></li>
						<li><a href="#">Nouveaux arrivants</a></li>
						<li><a href="#">Autorisations</a></li>
						<li><a href="#">Déclarations</a></li>
						<li><a href="#">Associations</a></li>
					</ul>
				</div>
				<div class="col-md-5 div-actus">
					<div class="actus" style="background-image: url('img/image 1.jpg');">
						<div class="une"><h2>ACTUALITÉS</h2></div>
						<div class="ptit-truc"></div>
						<div class="date-une"><p class="jours">31</p><p class="mois">SEPTEMBRE</p></div>
						<div class="img-actus"></div>
						<div class="description-actus">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet congue nisl, nec sollicitudin justo. Mauris bibendum lacinia quam, nec mattis justo sollicitudin sit amet. Phasellus aliquet, quam et porta scelerisque, mauris nunc sollicitudin massa, in ultrices est lectus sed eros. 
						</div>
					</div>
				</div>
				<div class="col-md-4 div-mini">
					<div class="div-mini-actus">
						<div class="mini-actus" style="background-image: url('img/image 2.jpg');">
							<div class="date-actus"><h2>21 OCTOBRE</h2></div>
						</div>
						<div class="mini-actus" style="background-image: url('img/image 3.jpg');">
							<div class="date-actus"><h2>19 AOÛT</h2></div>
						</div>
						<div class="mini-actus" style="background-image: url('img/image 3.jpg');">
							<div class="date-actus"><h2>9 SEPTEMBRE</h2></div>
						</div>
						<div class="mini-actus" style="background-image: url('img/image 2.jpg');">
							<div class="date-actus"><h2>20 AVRIL</h2></div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid publi-recente no-padding">
				<div class="une"><h2>PUBLICATIONS RÉCENTES</h2></div>
				<div class="ptit-truc"></div>
				<div id="recipeCarousel" class="carousel slide" data-ride="carousel">
					<ul class="carousel-indicators">
						<li data-target="#recipeCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#recipeCarousel" data-slide-to="1"></li>
						<li data-target="#recipeCarousel" data-slide-to="2"></li>
					 </ul>
					 <div class="fleche carousel-control-prev">
						<i href="#recipeCarousel" role="button" data-slide="prev" class="fas fa-angle-left"></i>
					</div>
					
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=1">
						</div>
						<div class="carousel-item">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=2">
						</div>
						<div class="carousel-item">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=3">
						</div>
						<div class="carousel-item">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=4">
						</div>
						<div class="carousel-item">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=5">
						</div>
						<div class="carousel-item">
							<img class="d-block col-3 img-fluid" src="http://placehold.it/120x150?text=6">
						</div>
					</div>
					<div class="fleche carousel-control-next">
						<i href="#recipeCarousel" role="button" data-slide="next" class="fas fa-angle-right"></i>
					</div>
				</div>
			</div>

			<div class="container-fluid div-calendrier">
				<div class="une"><h2>NOTRE AGENDA</h2></div>
				<div class="ptit-truc"></div>
				<?php
					for ($j=1; $j < 4; $j++) { 	?>
						<div class="calendrier" id="c<?= $j;?>">
							<?php
							if ($j==1):
								?><div class="date<?= $j;?>"><div class="j">14</div> <div>Janvier</div></div>
							<?php
							elseif ($j==2):
								?><div class="date<?= $j;?>"><div class="j">22</div> Août</div>
							<?php
							else:
								?><div class="date<?= $j;?>"><div class="j">01</div> Décembre</div>
							<?php endif?>

							<div class="jours">
								<?php
								echo "<p class='j-sem'>Lun</p><p class='j-sem'>Mar</p><p class='j-sem'>Mer</p><p class='j-sem'>Jeu</p><p class='j-sem'>Ven</p><p class='j-sem'>Sam</p><p class='j-sem'>Dim</p>";
								echo "<p class='gris-cal'>31</p>";
								for ($i=1; $i <= 31; $i++) { 
									if ($j==1&&$i==14) {
										echo "<p class='rouge-cal'>$i</p>";
									}
									elseif ($j==2&&$i==22) {
										echo "<p class='vert-cal'>$i</p>";
									}
									elseif ($j==3&&$i==1) {
										echo "<p class='bleu-cal'>$i</p>";
									}
									else {
										echo "<p class='noir-cal'>$i</p>";
									}
								}
								echo "<p class='gris-cal'>1</p>"."<p class='gris-cal'>2</p>"."<p class='gris-cal'>3</p>";
								?>
							</div>
						</div>
						<?php
					}
				?>
				
			</div>
		</div>

		

		<footer class="container-fluid">
			<div class="row">
				<div class="col-5 txt">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu leo sodales libero eleifend semper. Proin ac leo nisi. Quisque sem nisl, accumsan porta pharetra vitae, sollicitudin eget nunc. Nulla molestie tempus rhoncus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
				</div>
				<div class="col-5 txt">
					Integer laoreet diam nunc, sed suscipit neque pulvinar nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin at neque a commodo. Nullam diam urna, tincidunt eu congue id, scelerisque sit amet felis. Vestibulum a ligula ut sem sollicitudin congue.
				</div>
				<div class="col-2 logo">
					<i class="fab fa-facebook-square" style="font-size:40px;"></i>
					<i class="fab fa-twitter-square" style="font-size:40px;"></i>
					<i class="fab fa-linkedin" style="font-size:40px;"></i>
				</div>
				<div class="col-12 copy">
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