<!DOCTYPE html>
<html lang="fr">



	<?php
		include '../../../configuration/requete.php';
		include '../Module/template.php';

		//Vérifie que une photo a bien été uploadé
		if (isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
			
			//vérifie le format de l'image
			switch ($_FILES["photo"]["type"])
			{
				case 'image/jpeg':
					$im = imagecreatefromjpeg($_FILES["photo"]["tmp_name"]);
				break;
				case 'image/gif':
					$im = imagecreatefromgif($_FILES["photo"]["tmp_name"]);
				break;
				case 'image/png':
					$im = imagecreatefrompng($_FILES["photo"]["tmp_name"]);
				break;
				default:
					die('Invalid image type');
			}
			$largeur = getimagesize($_FILES["photo"]["tmp_name"])[0];
			$hauteur = getimagesize($_FILES["photo"]["tmp_name"])[1];

			//récupère la plus petite dimention pour en faire un carré
			if ($largeur>$hauteur) {
				$largeur=$hauteur;
			}
			elseif ($hauteur>$largeur) {
				$hauteur=$largeur;
			}
			//Rogne l'image
			$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $largeur, 'height' => $hauteur]);
			if ($im2 !== FALSE) {
				imagepng($im2, $_FILES["photo"]["tmp_name"]);
			}

			//chemin Upload
			$target_dir = "../Uploads/";
			$target_file = $target_dir . basename($_FILES["photo"]["name"]);
			//upload image rogné
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

			//Update BDD
			$connection=connect();
			$photo="/page/admin/Uploads/".$_FILES["photo"]["name"];
			$requete='UPDATE login SET 
			Photo=?';
			$array=[$photo];
			$infos=requeteWHERE($requete, $array, false, true);
		}

		//Update BDD avec les données du form
		if (isset($_POST["nom"])) {
			$connection=connect();
			$nom=trim($_POST["nom"]);
			$prenom=trim($_POST["prenom"]);
			$email=trim($_POST["email"]);
			
			$requete='UPDATE login SET 
			Email=?,
			Nom=?,
			Prenom=?';
			$array=[$email,$nom,$prenom];
			$infos=requeteWHERE($requete, $array, false, true);
		}

		//affiche les données de la bdd dans les champs de form
		$requete=('SELECT * FROM login');
		$requete=requeteWHERE($requete);
		$Nom=$requete[0]->Nom;
		$Prenom=$requete[0]->Prenom;
		$Email=$requete[0]->Email;
		$Photo=$requete[0]->Photo;
	?>

	<main class="app-content">
		<div class="row user">
		<div class="col-md-12">
			<div class="profile">
			<div class="info"><img class="user-img" src="<?=$Photo?>">
				<h4><?=$Prenom?> <?=$Nom?></h4>
				<p>Administrateur</p>
			</div>
			<div class="cover-image"></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="tab-content">
			<div class="tab-panel">
				<div class="tile user-settings">
				<h4 class="line-head">Paramètres</h4>
				<form method="POST" enctype="multipart/form-data">
					<div class="row mb-6">
					<div class="col-md-6">
						<label>Nom</label>
						<input class="form-control" type="text" value="<?=$Nom?>" name="nom">
					</div>
					<div class="col-md-6">
						<label>Prénom</label>
						<input class="form-control" type="text" value="<?=$Prenom?>" name="prenom">
					</div>
					</div>
					<div class="row">
					<div class="col-md-12 mb-6">
						<label>Email</label>
						<input class="form-control" type="text" value="<?=$Email?>" name="email">
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12 mb-6">
						<label>Photo de Profil</label>
						<input class="form-control" type="file" name="photo">
					</div>
					<div class="clearfix"></div>
					</div>
					<div class="row mb-10">
					<div class="col-md-12">
						<button class="btn btn-primary update-profile" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Sauvegarder</button>
						<button class="btn btn-primary" type="button">Rénitialiser mon mot de passe</button>
					</div>
					</div>
				</form>
				</div>
			</div>
			</div>
		</div>
		</div>
	</main>
	 <!-- Essential javascripts for application to work-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="/js/main.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	<script src="/js/plugins/pace.min.js"></script>
	</body>
</html>