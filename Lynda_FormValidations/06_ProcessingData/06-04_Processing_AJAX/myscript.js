$(document).ready(function() {
	$('#myform').submit(function() {
		var abort = false;
		$("div.error").remove();
		$(':input[required]').each(function() {
			if ($(this).val()==='') {
				$(this).after('<div class="error">This is a required field</div>');
				abort = true;
			}
		}); // go through each required value
		if (abort) { return false; } else {
			//Añadimos las peticiones Ajax
			//1. Primero tenemos que serializar los datos con la función Serialize de jQuery
			postData = $('myform').serialize();
			//Usamos el post method para pasarle qué pagina queremos procesar e indicamos que el post viene de Ajax
			$.post('process.php', postData + '$action=submit&ajaxrequest=1', function (msg) {
					if (msg){
						$('myform').before(msg);
					}
			});
			return false;

		}
	})//on submit
}); // ready

$('input[placeholder]').blur(function() {
	$("div.error").remove();
	var myPattern = $(this).attr('pattern');
	var myPlaceholder = $(this).attr('placeholder');
	var isValid = $(this).val().search(myPattern) >= 0;

	if (!isValid) {
		$(this).focus();
		$(this).after('<div class="error">Entry does not match expected pattern: ' + myPlaceholder + '</div>');
	} // isValid test
}); // onblur