
function logged(){
	$("#notlogged").css("display","none");
	$("#logged").css("display","block");
}
function suscripto(){
	$("#suscripto").css("display","none");
}

/** Function para ocultar mediante el id cuando el usuario no inicio sesion */
function mostrarSesion(){
	//document.getElementById('oculto').style.display = 'block';
	//document.getElementById("logged").classList.remove("logged");
	var x = document.getElementById("logged");
	x.classList.remove("ocultar");
	x.classList.add("mostrar");
	/*for (var i = 0; i<x.length; i++) {
	   x[i].classList.remove("ocultar");
	   x[i].classList.add("mostrar");
	}*/
	var y = document.getElementById("notLogged");
	for (var y = 0; i<y.length; i++) {
		y[i].classList.add("ocultar")
	}

}
/**  */

//CAROUSEL PORTADA//

$(document).ready(function(){
    
	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   4000	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});


//FIN CAROUSEL//

