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
		include '../../../../configuration/requete.php';
		include '../template.php';

		$id = $_GET["id"];
		
		if (isset($_POST["Titre"])) {
			$connection=connect();
			$_POST["slug"]=trim($_POST["slug"]);
			$_POST["slug"] = str_replace(' ', '_', $_POST["slug"]);

			$requete='UPDATE articles SET 
			Titre=?,
			Sous_Titre=?,
			Description=?,
			Image=?,
			Contenu=?,
			Slug=?
			WHERE Id=?';
			$array=[$_POST["Titre"],$_POST["STitre"],$_POST["Description"],$_POST["Image"],$_POST["Contenu"],$_POST["slug"],$id];
			$infos=requeteWHERE($requete, $array, false, true);
		}

		$i=0;
		if($dossier = opendir('../../Uploads')){
			while(false !== ($fichier = readdir($dossier))) {
				if($fichier != '.' && $fichier != '..'){
					$fichiers[$i]=$fichier;
					$i++;
				}
			}
		}

		$requete=('SELECT * FROM articles WHERE Id=?');
		$requete=requeteWHERE($requete,[$id]);

		$Id=$requete[0]->Id;
		$Titre=$requete[0]->Titre;
		$STitre=$requete[0]->Sous_Titre;
		$Description=$requete[0]->Description;
		$Contenu=$requete[0]->Contenu;
		$Slug=$requete[0]->Slug;
		if (isset($requete[0]->Image))
			$Image=$requete[0]->Image;
		else
			$Image="https://fakeimg.pl/400x300/282828/eae0d0/?retina=1&text=Image?";
	?>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

	 <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-file-text"></i> Modifier un article</h1>
				<p>Espace Administrateur de votre site web</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<form method="POST" class="modifArticle">
						<div class="line-head modif-article col-md-12">
							<h4>Modification de l'article</h4>
							<input type="submit" value="Enregistrer les modifications" class="saveArticle btn btn-primary">
						</div>
						<div class="d-flex">
							<div class="col-md-9">
								<div class="col-md-12 div-input">
									<label>Titre</label>
									<input class="form-control" type="text" name="Titre" value="<?=$Titre?>">
								</div>
								<div class="col-md-12 div-input">
									<label>Sous-Titre</label>
									<input class="form-control" type="text" name="STitre" value="<?=$STitre?>">
								</div>
								<div class="col-md-12 togle div-input">
									<label>test.loc/page/articles?article=</label>
									<input class="form-control" type="text" name="slug" value="<?=$Slug?>">
								</div>
								<div class="col-md-12 div-input">
									<label>Description</label>
									<textarea class="form-control" rows="3" name="Description"><?=$Description?></textarea>
								</div>
							</div>
							<div class="col-md-3 div-img">
								<img class="img" src="<?=$Image?>">
								<div class="overlay">
									<button class="btn btn-primary zoom" type="button" data-toggle="modal" data-target="#exampleModalCenter" id="<?=$Image;?>"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
									<button class="btn btn-primary change" type="button" data-toggle="modal" data-target="#exampleModalCenter">Changer d'image</button>
									<button class="btn btn-primary suppr"><i class="fa fa-trash"></i></button>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<label>Contenu</label>
							<textarea id="summernote" name="Contenu"><?=$Contenu?></textarea>
						</div>
						<input class="input-img" type="hidden" name="Image" value="<?=$Image;?>">
					</form>	
				</div>
			</div>
		</div>
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<img src="" class="imagepreview" style="width: 100%;" >
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal-choix" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="divimgUploads">
							<?php
								foreach ($fichiers as $value) :?>
									<div class="tile imgUploads" id="<?=$value;?>">
										<img src="/page/admin/Uploads/<?=$value;?>">
									</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					</div>
				</div>
			</div>
		</div>
	 </main>
	 <!-- Essential javascripts for application to work-->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
	<script src="/js/plugins/summernote-fr-FR.js"></script>
	<script src="/js/main.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	<script src="/js/plugins/pace.min.js"></script>
	<script type="text/javascript">
		$('#summernote').summernote({
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			],
			lang : 'fr-FR',
			height: 300
		});

		$(function() {
			$('.zoom').on('click', function() {
				$('.imagepreview').attr('src', $(this).attr('id'));
				$('#Modal').modal('show');	 
			});
			$(document).on('click', function() {
				$('#Modal').modal('hide');	 
			});
		});
		$(function() {
			$('.change').on('click', function() {
				$('#Modal2').modal('show');	 
			});
		});

		$(".imgUploads").click(function(event) {
			image=$(this).attr('id');
			console.log(image);
			$(".input-img").attr('value', "/page/admin/Uploads/"+image);
			$(".div-img img").attr('src', "/page/admin/Uploads/"+image);
			$('#Modal2').modal('hide');
		});

		$(".suppr").click(function(event) {
			$(".img").attr('src', 'https://fakeimg.pl/400x300/282828/eae0d0/?retina=1&text=Image?');
			$(".input-img").attr('value', 'https://fakeimg.pl/400x300/282828/eae0d0/?retina=1&text=Image?');
		});
	</script>
	</body>
</html>