//Hacemos que cuando esté listo el documento cargue una función.
$(document).ready(function () {
    //accedemos a la función submit

    $('#myform').submit(function () {
        var abort = false;
        //Borramos el div de los errores.

        $("div.error").remove();
        //Seleccionamos todos los campos que tengan requiered usando la función each de JQuery para seleccionar todos.
        $(':input[required]').each(function () {
            if ($(this).val() === '') {
                $(this).after('<div class="error">This is a required field</div>');
                abort = true;
            }
        }); // go through each required value
        if (abort) {
            return false;
        } else {
            return true;
        }
    })//on submit
}); // ready

//Vamos a hacer el error cuando se quite el ratón del campo
$('input[placeholder]').blur(function () {
    //Vamos a borrar el div de los errores.

    $("div.error").remove();
    //Vamos a guardar en variables el patrón y el placeholder

    var myPattern = $(this).attr('pattern');
    var myPlaceholder = $(this).attr('placeholder');
    //si en el meétodo search nos sale un número negativo es que no ha habido match en el patrón.

    var isValid = $(this).val().search(myPattern) >= 0;
    //si no es válido, vamos a hacer que se muestre el error.
    if (!isValid) {
        $(this).focus();
        $(this).after('<div class="error">Entry does not match expected pattern: ' + myPlaceholder + '</div>');
    } // isValid test
}); // onblur