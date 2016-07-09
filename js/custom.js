// preloader
$(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});

$(function() {
    new WOW().init();
    $('.templatemo-nav').singlePageNav({
    	offset: 70
    });

    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
	
	
	/**************************************************/
	// Contact Form
	  $("#form-contact").submit(function(e){
		e.preventDefault();
		var name = $("#inputNombre").val();
		var email = $("#inputEmail").val();
		var text = $("#inputMensaje").val();
		var mensaje = "";

		var dataString = 'name=' + name + '&email=' + email + '&text=' + text;

		if( name == "" ){
		  mensaje += "Ingrese un nombre en el formulario.<br />";
		}
		if( isValidEmail(email) ){
		  mensaje += "E-mail debe ser válido.<br />";
		}
		if( text.length < 50 ){
		  mensaje += "El mensaje debe ser más largo de 100 caracteres.";
		}

		if ( mensaje == "" ){
		  $.ajax({
			type: "POST",
			url: "mail.php",
			data: dataString,
			success: function(){
			  msj("Tu mensaje ha sido enviado con éxito.","alert-danger","alert-success");
			  limpiarForm();
			}
		  });
		}
		else{
		  msj(mensaje,"alert-success","alert-danger");
		}

		return false;
	  });
});

function msj(data,ocultar,mostrar){
  $('#msj span').html(data);
  $('#msj')
    .removeClass(ocultar)
    .addClass(mostrar)
    .removeClass('hide');
}
function isValidEmail(emailAddress) {
  var pattern = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/);
  return pattern.test(emailAddress);
};
function limpiarForm(){
  $("#inputNombre").val("");
  $("#inputEmail").val("");
  $("#inputMensaje").val("");
}