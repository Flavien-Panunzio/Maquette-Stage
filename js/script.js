$(document).ready(function(){
	var description=["Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet congue nisl, nec sollicitudin justo. Mauris bibendum lacinia quam, nec mattis justo sollicitudin sit amet. Phasellus aliquet, quam et porta scelerisque, mauris nunc sollicitudin massa, in ultrices est lectus sed eros. Donec id enim tortor.",
	"Nulla nec molestie odio, quis interdum purus. Integer pulvinar ut tellus quis vestibulum. In a enim in sem scelerisque posuere. Integer non maximus ex. Fusce eleifend eros tellus, vitae lobortis turpis rhoncus quis."];
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
			setTimeout(function(){
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
			},1500);
		});

		$(".fa-angle-left" ).click(function() {
			setTimeout(function(){
				//no_spam();
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
			},1500);
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
});