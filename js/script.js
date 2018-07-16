$(document).ready(function(){
	
	var nb = $(".divcarousel").attr('id');
	nb = nb.replace('id','');
	nb = parseInt(nb);

	carousel();
	function carousel(){
		var position=0;
		var suivant;
		$(".cache").hide();
		var active;
		var cache;
		$(".fa-angle-right").click(function() {
			$(".cache").hide();
			suivant=position+1;
			if (suivant>nb)
				suivant=0;
			console.log(position,suivant);
			if (suivant>nb)
				suivant=0;
			active=$("#"+position).attr('id');
			cache=$("#"+suivant).attr('id');
			$("#"+position).css({"right": '0vw'});
			$("#"+suivant).css({"right": '-80vw'});
			$("#"+suivant).show();
			$("#"+position).animate({'right': '80vw'}, 1000,  function() {change();});
			$("#"+suivant).animate({'right': '0vw'}, 1000,  function() {cacher1();});
		});
		$(".fa-angle-left").click(function() {
			$(".cache").hide();
			suivant=position-1;
			if (suivant<0)
				suivant=nb;
			console.log(position,suivant);
			active=$("#"+position).attr('id');
			cache=$("#"+suivant).attr('id');
			$("#"+position).css({"right": '0vw'});
			$("#"+suivant).css({"right": '80vw'});
			$("#"+suivant).show();
			$("#"+position).animate({'right': '-80vw'}, 1000,  function() {change();});
			$("#"+suivant).animate({'right': '0vw'}, 1000,  function() {cacher2();});
		});
		function change(){
			$("#"+position).toggleClass('active cache');
			$("#"+suivant).toggleClass('cache active');
		}
		function cacher1(){
			$(".cache").hide();
			position++;
			if (position>nb)
				position=0;
		}
		function cacher2(){
			$(".cache").hide();
			position--;
			if (position<0)
				position=nb;
		}
	}

	$('#recipeCarousel').carousel({
		interval: 10000
	})

	$('.carousel .carousel-item').each(function(){
		var next = $(this).next();
		if (!next.length) {
		next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		
		for (var i=0;i<2;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
		}
	});
});

$(".fleche").click(function(){
	id=$(".active").attr('id');
	$.post('/module/description.php', {id : id}, function(data) {
		$(".descriptions-carousel").html(data);
	});
});