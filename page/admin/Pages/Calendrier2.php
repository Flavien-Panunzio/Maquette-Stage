<!DOCTYPE html>
<html lang="fr">
	<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
	<?php
		include '../../../configuration/requete.php';
		include '../Module/template.php';
	?>
	<main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-calendar"></i> Calendrier</h1>
				<p>Full Calander page for managing events</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile row">
					
				</div>
			</div>
		</div>	
	</main>	 <!-- Essential javascripts for application to work-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="/js/main.js"></script>
	 <!-- The javascript plugin to display page loading on top-->
	<script src="/js/plugins/pace.min.js"></script>
	<script type="text/javascript" src="/js/plugins/moment.js"></script>






<script src="https://apis.google.com/js/api.js"></script>
<script>
function start() {
  // 2. Initialize the JavaScript client library.
  gapi.client.init({
    'apiKey': 'AIzaSyDTU5p_sVb7oauNJ_RfgSKJdFula5UfzcQ',
    // Your API key will be automatically added to the Discovery Document URLs.
    'discoveryDocs': ['https://people.googleapis.com/$discovery/rest'],
    // clientId and scope are optional if auth is not required.
    'clientId': '7nkhgtundm1l362hom6j4t3pc4@group.calendar.google.com',
    'scope': 'https://www.googleapis.com/auth/calendar',
  }).then(function() {
    // 3. Initialize and make the API request.
    return gapi.client.people.people.get({
      'resourceName': 'people/me',
      'requestMask.includeField': 'person.names'
    });
  }).then(function(response) {
    console.log(response.result);
  }, function(reason) {
    console.log('Error: ' + reason.result.error.message);
  });
};
// 1. Load the JavaScript client library.
gapi.load('client', start);
</script>



















	</body>
</html>