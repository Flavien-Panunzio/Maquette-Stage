$(document).ready(function(){
	var position=0;
	var suivant=1;
	var nb=2;
	carousel();
	function carousel(){
		$(".cache").hide();
		$(".active").show();
		var active;
		var cache;
		$(".fa-angle-right" ).click(function() {
			no_spam();
			active=$("#"+position).attr('id');
			cache=$("#"+suivant).attr('id');
			$("#"+position).css({"right": '0vw'});
			$("#"+suivant).css({"right": '-80vw'});
			$("#"+position).animate({'right': '80vw'}, 1000,change());
			$("#"+suivant).animate({'right': '0vw'}, 1000);

			position++;
			suivant++;
			if (position>nb) {
				position=0;
				suivant=1;
			}
			if (suivant>nb)
				suivant=0;
		});
		$(".fa-angle-left" ).click(function() {
			no_spam();
			active=$("#"+position).attr('id');
			cache=$("#"+suivant).attr('id');
			$("#"+position).css({"left": '0vw'});
			$("#"+suivant).css({"left": '-80vw'});
			$("#"+position).animate({'left': '80vw'}, 1000,change());
			$("#"+suivant).animate({'left': '0vw'}, 1000);

			position--;
			suivant--;
			if (position<0) {
				position=nb;
				suivant=1;
			}
			if (suivant<0)
				suivant=nb;
		});
		function change(){
			$("#"+position).toggleClass('active cache');
			$("#"+suivant).toggleClass('cache active');
			$(".active").show();
		}
		function no_spam(){
			$(".fa-angle-left" ).unbind("click");
			$(".fa-angle-right" ).unbind("click");
			setTimeout(function(){
				$(".fa-angle-left" ).bind("click");
				$(".fa-angle-right" ).bind("click");
				carousel();
			},1500);
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