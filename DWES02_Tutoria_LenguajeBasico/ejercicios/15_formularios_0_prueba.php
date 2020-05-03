<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<!-- otra forma de indicar que se ejecute el script actual es no poner
nada en el action
Recuerda que cuando pulsamos el botón de envío de un formulario, el
navegador hace una petición http del servidor enviándole el contenido
del formulario cuyos atributos name tengan valor.
Cuando la petición llega al servidor, como en este caso es el mismo script
el que contiene el código PHP, se ejecutaría la parte del servidor, y se
genera la respuesta que se devuelve al navegador, que de nuevo es el
formulario web en su estado inicial
Esta no es la forma habitual de trabajo, se ha hecho en el ejemplo
por tener todo el código a la vista
-->
<h2>Formulario con radiobutton</h2>
<form name="formulario_radio" method="POST" action="">
    <input type=radio name=conv value=1 checked>Euros<br>
    <input type=radio name=conv value=2>Dólares<br>
    <input type="submit" name=enviar value="Enviar"/>
</form>
<hr>
<br/>
<h2>Formulario con checkbox</h2>
<form name="formulario_check" method="POST" action="">
    <input type=checkbox name="futbol" value="on">Fútbol<br>
    <input type=checkbox name="baloncesto" value="on">Baloncesto<br>
    <input type=checkbox name="ciclismo" value="on">Ciclismo<br>
    <input type=checkbox name="tenis" value="on">Tenis<br>
    <input type="submit" name=comprobar value="Enviar"/>
</form>
<hr>
<br/>
<h2>Formulario con select</h2>
<form name="formulario_select" method="POST" action="">
    <select name="selCombo">
        <option value="valor1">1-1000</option>
        <option value="valor2">1001-3000</option>
        <option value="valor3">>3000</option>
    </select>
    <input type="submit" name=seleccionar value="Enviar"/>
</form>
<hr>
<br/>
<?php
/*
 * todos los campos del formulario que tengan valor en el atributo name
 * llegarán al servidor en el atributo $_POST. en el ejemplo preguntamos
 * si existe el elemento con clave Enviar, que equivale a preguntar si
 * se ha pulsado el botón enviar del formulario. Esto es muy útilizado
 */
if (isset($_POST['enviar']))
    var_dump($_POST);
if (isset($_POST['comprobar']))
    var_dump($_POST);
if (isset($_POST['seleccionar']))
    var_dump($_POST);

?>
</body>
</html>
