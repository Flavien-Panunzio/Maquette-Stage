	<?php
		include '../../../../configuration/requete.php';

		if (isset($_POST["Titre"])) {
			$_POST["slug"]=trim($_POST["slug"]);
			$_POST["slug"] = str_replace(' ', '_', $_POST["slug"]);

			$connection=connect();
			$requete='INSERT INTO articles SET Titre = ? , Sous_Titre = ? , Description = ? ,Contenu = ? ,Slug = ?, Visible=0';
			$array=[$_POST["Titre"],$_POST["STitre"],$_POST["Description"],$_POST["Contenu"],$_POST["slug"]];
			requeteWHERE($requete, $array, false, true);
			header("location:/page/admin/Pages/Articles.php");die();
		}

	?>
<!DOCTYPE html>
<html lang="fr">
	
	
	<?php
		include '../template.php';
	?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

	 <main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-dashboard"></i> Ajouter un article</h1>
				<p>Espace Administrateur de votre site web</p>
			</div>
			<ul class="app-breadcrumb breadcrumb">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="#">Blank Page</a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					
					<form method="POST" class="modifArticle">
						<div class="line-head modif-article">
							<h4>Créer un nouvel article</h4>
							<input type="submit" value="Ajouter l'article" class="saveArticle btn btn-primary">
						</div>
						<div class="col-md-12">
							<label>Titre</label>
							<input class="form-control" type="text" name="Titre" placeholder="Titre">
						</div>
						<div class="col-md-12">
							<label>Sous-Titre</label>
							<input class="form-control" type="text" name="STitre" placeholder="Sous-Titre">
						</div>

						<div class="col-md-12 togle">
								<span class="col-md-2">test.loc/page/articles?article=</span>
								<input class="form-control  col-md-10" type="text" name="slug" placeholder="Url">
							</div>
						<div class="col-md-12">
							<label>Description</label>
							<input class="form-control" type="text" name="Description" placeholder="Description">
						</div>
						<div class="col-md-12">
							<label>Contenu</label>
							<textarea id="summernote" name="Contenu" placeholder="Contenu de l'article"></textarea>
						</div>
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