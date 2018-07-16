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

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
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
					<div class="col-md-3">
							<div id="external-events">
								<h4 class="mb-4">Draggable Events</h4>
								<div class="fc-event">My Event 1</div>
								<div class="fc-event">My Event 2</div>
								<div class="fc-event">My Event 3</div>
								<p class="animated-checkbox mt-20">
									<label>
										<input id="drop-remove" type="checkbox"><span class="label-text">Remove after drop</span>
									</label>
								</p>
							</div>
						</div>
					<div class="col-md-9">
						<div id="calendar"></div>
					</div>
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
	<script type="text/javascript" src="/js/plugins/jquery-ui.custom.min.js"></script>
	<script type="text/javascript" src="/js/plugins/fullcalendar.min.js"></script>
	<script type="text/javascript" src="/js/plugins/locale-all.js"></script>
	<script type="text/javascript" src="/js/plugins/gcal.min.js"></script>
	<script type="text/javascript">


		$(document).ready(function() {
			$('#external-events .fc-event').each(function() {
				// store data so the calendar knows to render an event upon drop
				$(this).data('event', {
					title: $.trim($(this).text()), // use the element's text as the event title
					stick: true // maintain when user navigates (see docs on the renderEvent method)
				});
				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true,// will cause the event to go back to its
					revertDuration: 0	//	original position after the drag
				});
			});
			$('#calendar').fullCalendar({
				googleCalendarApiKey: 'AIzaSyDTU5p_sVb7oauNJ_RfgSKJdFula5UfzcQ',
				events: {
					googleCalendarId: '7nkhgtundm1l362hom6j4t3pc4@group.calendar.google.com'
				},
				locale : 'fr',
				themeSystem: 'bootstrap4',
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				editable: true,
				droppable: true,
				drop: function() {
					if ($('#drop-remove').is(':checked')) {
						$(this).remove();
					}
				},
				eventClick: function(event, element) {
					event.title = "CLICKED!";
					$('#calendar').fullCalendar('updateEvent', event);
				}
			});
		});
	</script>
	</body>
</html>