(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();


$(document).ready(function(){
	//ADD CLASS ACTIVE NAVBAR
	var url=$(location).attr('pathname');
	$(".active").removeClass("active");
	$(".is-expanded").removeClass(".is-expanded");
	$("a[href='"+url+"']").addClass('active');
	//$("a[href='"+url+"']").parent().addClass(".is-expanded");


	$(".visible-btn").click(function(){
		id=$(this).attr('id');
		btn="visible";
		$.post('/page/admin/Module/Article/updateArticle.php', {id : id, btn : btn}, function(data) {
			document.location.reload();
		});
	});
	$(".up-btn").click(function(){
		id=$(this).attr('id');
		btn="up";
		$.post('/page/admin/Module/Article/updateArticle.php', {id : id, btn : btn}, function(data) {
			document.location.reload();
		});
	});
});