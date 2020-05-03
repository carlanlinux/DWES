$(document).ready(function () {
    /*
     * Definimos las funciones de validación similares a las de PHP que ahora 
     * están en el archivo "validar.php"
     * 
     * Las funciones de validación utilizan los métodos "addClass" y 
     * "removeClass" para asignar o quitar la clase oculto a un elemento.
     * La clase oculto simplemente hace un display:none del elemento.
     */
    function validarNombre() {
        if (nombre.val().length < 4) {
            errorNombre.removeClass("oculto");
            return false;
        }
        errorNombre.addClass("oculto");
        return true;
    }

    function validarEmail() {
        /* En JS usamos la función match para validar las direcciones de email
         * Las expresiones regulares que admite esta función no son exactamente 
         * iguales a las de preg_match de PHP
         */
        if (!email.val().match("^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$")) {
            errorEmail.removeClass("oculto");
            return false;
        }
        errorEmail.addClass("oculto");
        return true;
    }

    function validarPasswords() {
        if (password1.val().length < 6 || password1.val() != password2.val()) {
            errorPassword.removeClass("oculto");
            return false;
        }
        errorPassword.addClass("oculto");
        return true;
    }

    function validar() {
        return validarNombre() & validarEmail() & validarPasswords();
    }

    /*
     * Asignamos a variables los elementos HTML para utilizarlos en las funciones
     * de validacion
     */
    var nombre = $("#nombre");
    var password1 = $("#password1");
    var password2 = $("#password2");
    var email = $("#email");
    var errorNombre = $("#errorNombre");
    var errorPassword = $("#errorPassword");
    var errorEmail = $("#errorEmail");

    /* 
     * Capturamos el evento submit del formulario para evitar su envío y hacemos
     * que se ejecute la función JS que valida los datos del formulario. Si la 
     * validación es correcta, (devuelve true) el formulario se envía.
     */
    $("#datos").submit(function () {
        if (validar()) return true;
        else return false;
    });

});