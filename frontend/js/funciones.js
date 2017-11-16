

function aviso(msj,timeout){

	$("#alert_template button").after("<span>"+msj+"</span>");
	$('#alert_template').fadeIn('slow');

	if (timeout || timeout === 0) {
		setTimeout(function() { 
			$('#alert_template').alert('close');
			$("#alert_template span").remove();
		
		}, timeout);    
	}
	
	$('#alert_template .close').click(function(e) {
		$("#alert_template span").remove();
	});
}
function error(msj,timeout){
	
	$("#error_div button").after("<span>"+msj+"</span>");
	$('#error_div').fadeIn('slow');
	
	if (timeout || timeout === 0) {
		setTimeout(function() { 
			$('#error_div').alert('close');
			$("#error_div span").remove();			
		}, timeout);    
	}
		
	$('#error_div .close').click(function(e) {
		$("#error_div span").remove();
	});
}

function submit(){
	$('#frmReportar').submit();
}
function logged(){
	$("#notlogged").css("display","none");
	$("#logged").css("display","block");
}
function suscripto(){
	$("#suscripto").css("display","none");
}
function loggedFb(){
	$("#notlogged").css("display","none");
	$("#logged").css("display","block");
	$("#perfil").css("display","none");
	
}
function loggedNoticia(){
	$('#btnLike').removeAttr('disabled');
	$('#btnShare').attr('disabled',false);
}
function dump(response) {
    var out = '';
    for (var i in response) {
        out += i + ": " + response[i] + "\n";
    }

    alert(out);
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




