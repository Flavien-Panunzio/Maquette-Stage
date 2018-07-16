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
		include '../../configuration/requete.php';
		include 'Module/template.php';
	?>

	<main class="app-content">
	  <div class="app-title">
		<div>
		  <h1><i class="fa fa-dashboard"></i> Tableau de bord</h1>
		  <p>Espace Administrateur de votre site web</p>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-6 col-lg-3">
		  <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
			<div class="info">
			  <h4>Users</h4>
			  <p><b>5</b></p>
			</div>
		  </div>
		</div>
		<div class="col-md-6 col-lg-3">
		  <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
			<div class="info">
			  <h4>Likes</h4>
			  <p><b>25</b></p>
			</div>
		  </div>
		</div>
		<div class="col-md-6 col-lg-3">
		  <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
			<div class="info">
			  <h4>Uploades</h4>
			  <p><b>10</b></p>
			</div>
		  </div>
		</div>
		<div class="col-md-6 col-lg-3">
		  <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
			<div class="info">
			  <h4>Stars</h4>
			  <p><b>500</b></p>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-6">
		  <div class="tile">
			<h3 class="tile-title">Monthly Sales</h3>
			<div class="embed-responsive embed-responsive-16by9">
			  <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
			</div>
		  </div>
		</div>
		<div class="col-md-6">
		  <div class="tile">
			<h3 class="tile-title">Support Requests</h3>
			<div class="embed-responsive embed-responsive-16by9">
			  <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-6">
		  <div class="tile">
			<h3 class="tile-title">Features</h3>
			<ul>
			  <li>Built with Bootstrap 4, SASS and PUG.js</li>
			  <li>Fully responsive and modular code</li>
			  <li>Seven pages including login, user profile and print friendly invoice page</li>
			  <li>Smart integration of forgot password on login page</li>
			  <li>Chart.js integration to display responsive charts</li>
			  <li>Widgets to effectively display statistics</li>
			  <li>Data tables with sort, search and paginate functionality</li>
			  <li>Custom form elements like toggle buttons, auto-complete, tags and date-picker</li>
			  <li>A inbuilt toast library for providing meaningful response messages to user's actions</li>
			</ul>
			<p>Vali is a free and responsive admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.</p>
			<p>Vali is is light-weight, expendable and good looking theme. The theme has all the features required in a dashboard theme but this features are built like plug and play module. Take a look at the <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> about customizing the theme colors and functionality.</p>
			<p class="mt-4 mb-4"><a class="btn btn-primary mr-2 mb-2" href="http://pratikborsadiya.in/blog/vali-admin" target="_blank"><i class="fa fa-file"></i>Docs</a><a class="btn btn-info mr-2 mb-2" href="https://github.com/pratikborsadiya/vali-admin" target="_blank"><i class="fa fa-github"></i>GitHub</a><a class="btn btn-success mr-2 mb-2" href="https://github.com/pratikborsadiya/vali-admin/archive/master.zip" target="_blank"><i class="fa fa-download"></i>Download</a></p>
		  </div>
		</div>
		<div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Vector Map</h3>
            <div class="tile-body">
              <div id="demo-map" style="height: 400px"></div>
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
	<script type="text/javascript" src="/js/plugins/sweetalert.min.js"></script>
	
	<!-- Page specific javascripts-->
	<script type="text/javascript" src="/js/plugins/chart.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.vmap.min.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.vmap.world.js"></script>
	<script type="text/javascript" src="/js/plugins/jquery.vmap.sampledata.js"></script>
	<script src="/js/plugins/pace.min.js"></script>
	<script type="text/javascript">
      $(document).ready(function(){
      
      	var map = $('#demo-map');
      	map.vectorMap({
      		map: 'world_en',
      		backgroundColor: '#fff',
      		color: '#333',
      		hoverOpacity: 0.7,
      		selectedColor: '#666666',
      		enableZoom: true,
      		showTooltip: true,
      		scaleColors: ['#C8EEFF', '#006491'],
      		values: sample_data,
      		normalizeFunction: 'polynomial'
      	});
      });
    </script>
	<script type="text/javascript">
	  var data = {
	  	labels: ["January", "February", "March", "April", "May"],
	  	datasets: [
	  		{
	  			label: "My First dataset",
	  			fillColor: "rgba(220,220,220,0.2)",
	  			strokeColor: "rgba(220,220,220,1)",
	  			pointColor: "rgba(220,220,220,1)",
	  			pointStrokeColor: "#fff",
	  			pointHighlightFill: "#fff",
	  			pointHighlightStroke: "rgba(220,220,220,1)",
	  			data: [65, 59, 80, 81, 56]
	  		},
	  		{
	  			label: "My Second dataset",
	  			fillColor: "rgba(151,187,205,0.2)",
	  			strokeColor: "rgba(151,187,205,1)",
	  			pointColor: "rgba(151,187,205,1)",
	  			pointStrokeColor: "#fff",
	  			pointHighlightFill: "#fff",
	  			pointHighlightStroke: "rgba(151,187,205,1)",
	  			data: [28, 48, 40, 19, 86]
	  		}
	  	]
	  };
	  var pdata = [
	  	{
	  		value: 300,
	  		color: "#46BFBD",
	  		highlight: "#5AD3D1",
	  		label: "Complete"
	  	},
	  	{
	  		value: 50,
	  		color:"#F7464A",
	  		highlight: "#FF5A5E",
	  		label: "In-Progress"
	  	}
	  ]
	  
	  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
	  var lineChart = new Chart(ctxl).Line(data);
	  
	  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
	  var pieChart = new Chart(ctxp).Pie(pdata);
	</script>
  </body>
</html>