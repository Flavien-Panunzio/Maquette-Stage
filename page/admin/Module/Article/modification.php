	<?php
		include '../template.php';

		include '../../../../configuration/requete.php';

		$id = $_GET["id"];

		if (isset($_POST["Titre"])) {
			$connection=connect();
			$_POST["slug"]=trim($_POST["slug"]);
			$_POST["slug"] = str_replace(' ', '_', $_POST["slug"]);

			$requete='UPDATE articles SET 
			Titre=?,
			Sous_Titre=?,
			Description=?,
			Contenu=?,
			Slug=?
			WHERE Id=?';
			$array=[$_POST["Titre"],$_POST["STitre"],$_POST["Description"],$_POST["Contenu"],$_POST["slug"],$id];
			$infos=requeteWHERE($requete, $array, false, true);
		}

		

		$requete=('SELECT * FROM articles WHERE Id=?');
		$requete=requeteWHERE($requete,[$id]);

		$Id=$requete[0]->Id;
		$Titre=$requete[0]->Titre;
		$STitre=$requete[0]->Sous_Titre;
		$Description=$requete[0]->Description;
		$Contenu=$requete[0]->Contenu;
		$Slug=$requete[0]->Slug;
	?>
<!DOCTYPE html>
<html lang="fr">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
	




	 <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-dashboard"></i> Blank Page</h1>
				<p>Start a beautiful journey here</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="#">Blank Page</a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
			 <div class="tile">
				<div class="tile-body">Modification de l'article</div>
				<form method="POST" class="modifArticle">
					<input type="submit" value="Enregistrer les modifications" class="saveArticle btn btn-primary">
					<h4>Titre</h4><input type="text" name="Titre" value="<?=$Titre?>">
					<h4>Sous-Titre</h4><input type="text" name="STitre" value="<?=$STitre?>"><br>
					test.loc/page/articles?article=<input type="text" name="slug" value="<?=$Slug?>">
					<h4>Description</h4><input type="text" name="Description" value="<?=$Description?>">
					<h4>Contenu</h4>
					<textarea id="summernote" name="Contenu"><?=$Contenu?></textarea>
				</form>
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
	</script>
	</body>
</html>