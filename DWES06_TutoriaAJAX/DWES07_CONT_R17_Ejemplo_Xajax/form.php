<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 7 : Aplicaciones web dinámicas: PHP y Javascript
 * Ejemplo Validación formulario con Xajax: form.php
 */

// Incluimos la librería Xajax para poder utilizarla
require_once("xajax_core/xajax.inc.php");

// Creamos las funciones de validación, que van a ser llamadas
//  desde JavaScript

/* El nombre debe tener más de 3 letras */
function validarNombre ($nombre)
{
    if (strlen($nombre) < 4) return false;
    return true;
}

function validarEmail ($email)
{
    return preg_match('^[a-zA-Z0-9]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$^', $email);
}

function validarPasswords ($pass1, $pass2)
{
    return $pass1 == $pass2 && strlen($pass1) > 5;
}

/* En esta función se vaidarán los compos del formulario llamando a sus
 * respectivas funciones.
 * En caso de que se haya producido algún error en los datos introducidos en
 * el formulario, se utilizan las etiquetas definidas en el código HTML para
 * ello asignándoles los mensajes de error correspondientes.
 */
function validarFormulario ($valores)
{
    /* En cada función que se defina se puede instanciar y usar un objeto de
     * la clase xajaxResponse para devolver al navegador los resultados del
     * proceso
     *
     * El método assign de xajaxResponse lo utilizamos para asignar el
     * mensaje de error que corresponde al elemento HTML definido para ellos
     * mediante su id. Si no se produce error en la validación se utiliza el
     * método clear de xajaxResponse para vaciar el contenido de esos
     * elementos
     */
    $respuesta = new xajaxResponse();
    $error = false;

    if (!validarNombre($valores['nombre'])) {
        $respuesta->assign("errorNombre", "innerHTML", "El nombre debe tener más de 3 caracteres.");
        $error = true;
    } else $respuesta->clear("errorNombre", "innerHTML");

    if (!validarPasswords($valores['password1'], $valores['password2'])) {
        $respuesta->assign("errorPassword", "innerHTML", "La contraseña debe ser mayor de 5 caracteres o no coinciden.");
        $error = true;
    } else $respuesta->clear("errorPassword", "innerHTML");

    if (!validarEmail($valores['email'])) {
        $respuesta->assign("errorEmail", "innerHTML", "La dirección de email no es válida.");
        $error = true;
    } else $respuesta->clear("errorEmail", "innerHTML");

    /* Si no se produce ningún error se muestra un mensaje de información
     * indicando que todo está correcto.
     * Mediante el método assign habilitamos el botón de envío del formulario
     * y volvemos a ponerle su etiqueta "Enviar"
     */
    if (!$error) $respuesta->alert("Todo correcto.");

    $respuesta->assign("enviar", "value", "Enviar");
    $respuesta->assign("enviar", "disabled", false);

    return $respuesta;
}

/* Creamos el objeto xajax, como en este caso, las funciones PHP que pueden
 * ser llamadas desde AJAX están en este mismo script, no se le indica ningún
 * parámetro
 */
$xajax = new xajax();
//  $xajax->configure('debug',true);
/* usamos el método register para registrar cada una de las funciones PHP
 * del servidor que estarán disponibles para ser ejecutadas de forma
 * asíncrona desde el navegador. En este caso, la función "validarFormulario"
 * Al registrar una función, se crea automáticamente una función JavaScript
 * en el documento HTML con su mismo nombre precedido por el sufijo "xajax_"
 */
$xajax->register(XAJAX_FUNCTION, "validarFormulario");

/* Configuramos la ruta en que se encuentra la carpeta xajax_js que contiene
 * el código JS de la librería
 */
$xajax->configure('javascript URI', './');


// El método processRequest procesa las peticiones que llegan a la página
// Debe ser llamado antes del código HTML
$xajax->processRequest();
?>
<!DOCTYPE html">
<html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <title>Ejemplo Tema 7: Validación formulario con Xajax</title>
      <link rel="stylesheet" href="estilos.css" type="text/css" />
      <?php
/* Le indicamos a Xajax que incluya el código JavaScript necesario
 * llamamos al método printJavascript del objeto xajax
 * es la manera en la AJAX incluye en la página web que se envía al
 * navegador su propio código JS. Se puede ver el código generado en
 * el código fuente de la página
 */
$xajax->printJavascript();
?>
      <script type="text/javascript" src="validar.js"></script>
    </head>

    <body>
        <div id='form'>
        <!-- Al pulsar el botón de envío del formulario, se ejecutará
             una función JavaScript, que realiza la llamada a la función PHP 
             mediante AJAX
             La función JavaScript enviarFormulario usará la función 
            xajax_validarFormulario que ha sido creada automáticamente por xajax 
            al registrar la función PHP correspondiente.
            javascript:void(null); anula el comportamiento por defecto del 
            formulario
        -->
        <form id='datos' action="javascript:void(null);" onsubmit="enviarFormulario();">
        <fieldset >
            <legend>Introducción de datos</legend>
            <div class='campo'>
                <label for='nombre' >Nombre:</label><br />
                <input type='text' name='nombre' id='nombre' maxlength="50" /><br />
                <span id="errorNombre" class="error" for="nombre"></span>
            </div>
            <div class='campo'>
                <label for='password1' >Contraseña:</label><br />
                <input type='password' name='password1' id='password1' maxlength="50" />
                <span id="errorPassword" class="error" for="password"></span>
            </div>
            <div class='campo'>
                <label for='password2' >Repita la contraseña:</label><br />
                <input type='password' name='password2' id='password2' maxlength="50" />
            </div>
            <div class='campo'>
                <label for='email' >Email:</label><br />
                <input type='text' name='email' id='email' maxlength="50" />
                <span id="errorEmail" class="error" for="email"></span>
</div>

<div class='campo'>
    <input type='submit' id='enviar' name='enviar' value='Enviar'/>
</div>
</fieldset>
</form>
</div>
</body>
</html>
