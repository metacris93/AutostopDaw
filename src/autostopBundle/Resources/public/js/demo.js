$(document).ready(function() {

	$('.registrate').click(function() {
		
		type = $(this).attr('data-type');

         
		$('.overlay-container').fadeIn(function() {
			
			window.setTimeout(function(){
				$('.window-container.'+type).addClass('window-container-visible');
				myFunction();  		   
			}, 100);


			
		});
	});
	
	$('.close').click(function() {
		$('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
	});
	
	$('.inicioSesion').click(function(){
		localStorage.setItem('usuario',$("[name=Usuario]").val());
	});
});

function myFunction() {
		   formulario =$('#formulario')[0];
				if (formulario.checkValidity()){
						$('#MensajeAlerta').css("display","block");
				 }
			   }