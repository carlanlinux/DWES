<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 7 : Aplicaciones web dinámicas: PHP y Javascript
 * Ejemplo Validación formulario con jQuery4PHP: form.php
 */

// Incluimos  y registramos los ficheros necesarios de la librería jQuery4PHP
include_once('source-showcase/lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php');
YsJQueryAutoloader::register();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 7: Validación formulario con jQuery4PHP</title>
    <link rel="stylesheet" href="estilos.css" type="text/css"/>
    <!-- Incluímos la librería de JavaScript jQuery ya que JQuery4PHP se apoya en JQuery-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<div id='form'>
    <form id='datos' action="javascript:void(null);">
        <fieldset>
            <legend>Introducción de datos</legend>
            <div class='campo'>
                <label for='nombre'>Nombre:</label>
                <input type='text' name='nombre' id='nombre' maxlength="50"/>
            </div>
            <div class='campo'>
                <label for='password1'>Contraseña:</label><br/>
                <input type='password' name='password1' id='password1' maxlength="50"/>
            </div>
            <div class='campo'>
                <label for='password2'>Repita la contraseña:</label><br/>
                <input type='password' name='password2' id='password2' maxlength="50"/>
            </div>
            <div class='campo'>
                <label for='email'>Email:</label><br/>
                <input type='text' name='email' id='email' maxlength="50"/>
            </div>

            <div class='campo'>
                <input type='submit' id='enviar' name='enviar' value='Enviar'/>
            </div>
        </fieldset>
    </form>
</div>
<?php
/*
 * Creamos un objeto nuevo a partir del método estático newInstance
 * Capturaremos el evento onClick del formulario y le indicamos los datos
 * del mismo que vamos a enviar a una página de validación.
 * A continuación, se asocia el evento onclick del botón enviar al código
 * que se encuentra en la llamada a execute.
 * Este código llama al script validar.php, enviando como parámetros los
 * datos del formulario (los que se hayan introducido en etiquetas de tipo
 * input) convertidos a array, y una vez recibida la respuesta, ejecuta una
 * función JavaScript. En esta función se usa la función alert de JavaScript
 * para mostrar los errores que se hayan producido en la validación.
 * Para comunicarnos con el servidor usamos el método getJSON, que usa
 * notación JSON para transmitir información con el servidor.
 * Al ejecutar esta página PHP se genera código JavaScript cuando se envía
 * al navegador (todo el código se traduce a llamadas a la librería JQuery
 * de JavaScript.
 */
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#enviar")
    ->execute(
        YsJQuery::getJSON(
            "validar.php",
            YsJQuery::toArray()->in('#datos input'),
            new YsJsFunction('
                    if(msg.errorNombre) alert(msg.errorNombre);
                    if(msg.errorPassword) alert(msg.errorPassword);
                    if(msg.errorEmail) alert(msg.errorEmail);', 'msg'
            )
        )
    );
?>
</body>
</html>
