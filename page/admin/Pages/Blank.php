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
	?>


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
				<div class="tile-body">Create a beautiful dashboard</div>
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