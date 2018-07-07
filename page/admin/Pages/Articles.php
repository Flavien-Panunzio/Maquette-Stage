<!DOCTYPE html>
<html lang="fr">

	<?php
		include '../Module/template.php';

		include '../../../configuration/requete.php';
		$requete=('SELECT * FROM articles');
		$requete=requeteWHERE($requete);
	?>
	 <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-laptop"></i> Cards</h1>
				<p>Material design inspired cards</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item">UI</li>
				<li class="breadcrumb-item"><a href="#">Cards</a></li>
			</ul>
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
						<p><a class="btn btn-primary icon-btn" href=""><i class="fa fa-plus"></i>Ajouter un article</a></p>
					</div>
					<div class="tile-body">
						<b>Card with action button </b><br>
						Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
					</div>
				</div>
			</div>
			<?php
			foreach ($requete as  $value) :
				$visible = $value->Visible == 1 ? "fa-eye" : "fa-eye-slash";
				?>
				<div class="col-md-6">
					<div class="tile article">
						<div class="tile-title-w-btn">
							<div class="titreArticle">
								<h3 class="title"><?= $value->Titre;?></h3>
								<h4><?= $value->Sous_Titre;?></h4>	
							</div>
							
							<div class="btn-group"><a class="btn btn-primary visible-btn" id="<?= $value->Id ?>" href="#"><i class="fa fa-lg <?= $visible ?>"></i></a><a class="btn btn-primary" href="../Module/Article/modification.php?id=<?= $value->Id ?>"><i class="fa fa-lg fa-edit"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a></div>
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
	<script type="text/javascript" src="/js/plugins/sweetalert.min.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	 <script src="/js/main.js"></script>
	<script src="/js/plugins/pace.min.js"></script>
	<script type="text/javascript">
		$('.fa-trash').click(function(){
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					swal("Deleted!", "Your imaginary file has been deleted.", "success");
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			});
		});
	</script>
	</body>
</html>