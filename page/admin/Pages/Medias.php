<!DOCTYPE html>
<html lang="fr">
	<?php
		include '../../../configuration/requete.php';
		include '../Module/template.php';

		$i=0;
		if($dossier = opendir('../Uploads')){
			while(false !== ($fichier = readdir($dossier))) {
				if($fichier != '.' && $fichier != '..'){
					$fichiers[$i]=$fichier;
					$i++;
				}
			}
		}
	?>
	<main class="app-content">
		<div class="app-title">
			<div>
				 <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
				 <p>Start a beautiful journey here</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				 <div class="tile divimgUploads">
					<?php
						foreach ($fichiers as $value) :?>
							<div class="tile imgUploads">
								<img src="/page/admin/Uploads/<?=$value;?>">
								<div class="overlay">
									<button class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
									<button class="btn btn-primary copy" data-clipboard-text="http://test.loc/page/admin/Uploads/<?=$value;?>"><i class="fa fa-link" aria-hidden="true"></i></button>
									<button class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</div>
							</div>
					<?php endforeach; ?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

	<script type="text/javascript">
		new ClipboardJS('.copy');
	</script>
  </body>
</html>