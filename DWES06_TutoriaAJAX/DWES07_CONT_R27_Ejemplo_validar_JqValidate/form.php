<?php
/**
 * Desarrollo Web en Entorno Servidor
 * Tema 7 : Aplicaciones web dinámicas: PHP y Javascript
 * Ejemplo Validación formulario con jQuery4PHP y JqValidate: form.php
 */

/* Existen varias extensiones que se integran con la librería JQuery4PHP y que
 * permiten realizar de forma sencilla tareas adicionales a las que soporta el
 * núcleo de la misma.
 * Una de ellas es la extensión JqValidate que vamos a utilizar para realizar la 
 * validación del formulario de forma más sencilla.
 */
// Incluimos la lilbrería jQuery4PHP
include_once('source-showcase/lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php');
YsJQueryAutoloader::register();
// Indicamos que vamos a usar el plugin de validación
YsJQuery::usePlugin(YsJQueryConstant::PLUGIN_JQVALIDATE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 7: Validación formulario con jQuery4PHP</title>
    <link rel="stylesheet" href="estilos.css" type="text/css"/>
    <!-- Incluímos la librería de JavaScript jQuery -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <!-- Y también la de validación -->
    <script type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
</head>

<body>
<?php
// Cargamos los mensajes de validación en castellano
echo YsJQueryAssets::loadScripts('../jq4php-showcase/showcase/jquery4php-assets/js/plugins/bassistance/validate/localization/messages_es.js')->execute();
?>
<div id='form'>
    <form id='datos' action="javascript:void(null);">
        <fieldset>
            <legend>Introducción de datos</legend>
            <div class='campo'>
                <label for='nombre'>Nombre:</label><br/>
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
 * Al usar la extensión JqValidate para validar los datos introducidos en un 
 * formulario, el código que de validación que se usará utiliza la extensión
 * JQuery.Validate. No será necesario programar los algoritmos de validación en
 * PHP, sino que hay que indicar qué reglas se van a aplicar a cada uno de los 
 * campos del formulario usando para ello el metodo rules.
 * Para indicar las reglas de pasa un array, que contendrá tantos elementos como
 * campos a validar.
 * Para cada uno de los campos se crea un nuevo array que contendrá las reglas 
 * de ese campo. Cada una de las reglas se compone en base a los distintos 
 * métodos de validación que incorpora la extensión de JavaScript JQuery.Validate.
 * 
 * En el  ejemplo vemos que la asociación al evento se sigue haciendo como antes.
 * AL ejecutar la página, se sigue generando código JavaScript (llamadas a 
 * funciones JQuery), por tanto todo el código que se ejecuta es JavaScript
 */
echo
YsJQuery::newInstance()
    ->onClick()
    ->in("#enviar")
    ->execute(
        YsJQValidate::build()->in('#datos')
            ->_rules(
                array('nombre' => array('required' => true, 'minlength' => 4),
                    'email' => array('required' => true, 'email' => true),
                    'password1' => array('required' => true, 'minlength' => 6, 'equalTo' => '#password2')
                )
            )
    );
?>
</body>
</html>
