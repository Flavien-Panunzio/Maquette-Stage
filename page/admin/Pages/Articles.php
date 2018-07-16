<?php 
	if (isset($_COOKIE['connexion']) && $_COOKIE['connexion']=="vrai") {
		$_SESSION["admin"] = true;
	}
	if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
		header("location:/page/admin/login.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">

	<?php
		include '../../../configuration/requete.php';
		include '../Module/template.php';

		$requete=('SELECT * FROM articles ORDER BY Id DESC');
		$requete=requeteWHERE($requete);
	?>
	 <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-file-text"></i> Mes articles</h1>
				<p>Espace Administrateur de votre site web</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<!-- OVERLAY LOADING
					<div class="overlay">
						<div class="m-loader mr-4">
							<svg class="m-circular" viewBox="25 25 50 50">
								<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
							</svg>
						</div>
						<h3 class="l-text">Loading</h3>
					</div>-->

					<div class="tile-title-w-btn">
						<h3 class="title">Mes Article</h3>
						<p><a class="btn btn-primary icon-btn" href="../Module/Article/newArticle.php"><i class="fa fa-plus"></i>Ajouter un article</a></p>
					</div>
					<div class="tile-body">
						<b>Card with action button </b><br>
						Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
					</div>
				</div>
			</div>
			<?php
			foreach ($requete as	$value) :
				$visible = $value->Visible == 1 ? "fa-eye" : "fa-eye-slash";
				$Avant = $value->MisEnAvant == 1 ? "fa-star" : "fa-star-o";
				?>
				<div class="col-md-6">
					<div class="tile article">
						<div class="tile-title-w-btn">
							<div class="titreArticle">
								<h3 class="title"><?= $value->Titre;?></h3>
								<h4><?= $value->Sous_Titre;?></h4>
							</div>
							
							<div class="btn-group">
								<a class="btn btn-primary up-btn" id="<?= $value->Id ?>" href="#"><i class="fa <?= $Avant ?>"></i></a>
								<a class="btn btn-primary visible-btn" id="<?= $value->Id ?>" href="#"><i class="fa fa-lg <?= $visible ?>"></i></a>
								<a class="btn btn-primary" href="../Module/Article/modification.php?id=<?= $value->Id ?>"><i class="fa fa-lg fa-edit"></i></a>
								<button class="btn btn-primary suppr-article" id="<?= $value->Id ?>"><i class="fa fa-lg fa-trash"></i></button>
							</div>
						</div>

						<div class="tile-body">
							<img src="<?=$value->Image?>">
							<div class="txtarticle">
								<?= $value->Contenu;?>
							</div>
							
						</div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	 </main>
	 <!-- Essential javascripts for application to work-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="/js/plugins/sweetalert.min.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	 <script src="/js/main.js"></script>
	<script src="/js/plugins/pace.min.js"></script>
	<script type="text/javascript">
		$('.suppr-article').click(function(e){
			id=e.target.id;
			swal({
				title: "Êtes-vous sûr ?",
				text: "Vous allez supprimer cet article et il ne sera plus récupérable",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Oui, je suis sûr",
				cancelButtonText: "Non, je me suis trompé",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.post('/page/admin/Module/Article/supprArticle.php', {id: id}, function(data) {
						swal("Supprimé!", "Votre article a bien été supprimé", "success");
					});
				} else {
					swal("Annulé", "Votre article est encore disponible", "error");
				}
			});
		});
	</script>
	</body>
</html>