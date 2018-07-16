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
						$id=0;
						foreach ($fichiers as $value) :?>
							<div class="tile imgUploads">
								<img src="/page/admin/Uploads/<?=$value;?>">
								<div class="overlay">
									<button class="btn btn-primary zoom" id="http://test.loc/page/admin/Uploads/<?=$value;?>"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
									<button class="btn btn-primary copy" data-clipboard-text="http://test.loc/page/admin/Uploads/<?=$value;?>" id="<?=$id;?>"><i class="fa fa-link" aria-hidden="true"></i></button>
									<button class="btn btn-primary suppr-image" id="../Uploads/<?=$value;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</div>
							</div>
					<?php $id++; endforeach; ?>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
	</main>
	 <!-- Essential javascripts for application to work-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="/js/main.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	<script src="/js/plugins/pace.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
	<script src="/js/plugins/sweetalert.min.js"></script>

	<script type="text/javascript">
		$('.copy').tooltip({
			trigger: 'click',
			placement: 'bottom'
		});
		function setTooltip(message,id) {
			$('#'+id).tooltip('hide')
				.attr('data-original-title', message)
				.tooltip('show');
		}
		function hideTooltip(id) {
			setTimeout(function() {
				$('#'+id).tooltip('hide');
			}, 1000);
		}
		var clipboard = new Clipboard('.copy');
		$('.copy').click(function(event) {
			id=$(this).attr('id');
		});
		clipboard.on('success', function(e) {
			id=e.trigger.id;
			setTooltip('Copié !',id);
			hideTooltip(id);
		});
		clipboard.on('error', function(e) {
			id=e.trigger.id;
			setTooltip('Erreur !',id);
			hideTooltip(id);
		});	

		$(function() {
			$('.zoom').on('click', function() {
				$('.imagepreview').attr('src', $(this).attr('id'));
				$('#exampleModalCenter').modal('show');	 
			});
			$(document).on('click', function() {
				$('#exampleModalCenter').modal('hide');	 
			});
		});

		$('.suppr-image').click(function(e){
			id=e.target.id;
			swal({
				title: "Êtes-vous sûr ?",
				text: "Vous allez supprimer cette image, ell ne sera plus récupérable",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Oui, je suis sûr",
				cancelButtonText: "Non, je me suis trompé",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					console.log(id);
					$.post('/page/admin/Module/supprImage.php', {id: id}, function(data) {
						document.location.reload();
						swal("Supprimé!", "Votre image a bien été supprimée", "success");
						
					});
				} else {
					swal("Annulé", "Votre image est encore disponible", "error");
				}
			});
		});
	</script>
	</body>
</html>