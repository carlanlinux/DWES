<?php
include "practica1-comprobar.php";
if (hayCookie()) {
    /*si tenemos preferencias ya guardadas, directamente vamos a saludo.php
     * Si no hemos completado todos los datos del formulario no tendrá el 
     * valor guardado de todas las cookies, y por tanto la función hayCookie
     * devolverá false.
     */
    header("location:practica1-saludo.php");
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de recogida de preferencias</title>
</head>
<body>
<form action="practica1-saludo.php">
    <fieldset>
        <legend>Escoge tus preferencias</legend>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"/><br/><br/>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos"/><br/><br/>
        <label for="fondo">Color de fondo</label>
        <input type="color" name="fondo" id="fondo" value="#FFFFFF"/><br/><br/>
        <label for="frente">Color de letra</label>
        <input type="color" name="frente" id="frente"/><br/><br/>
        <label for="letra">Tipo de letra</label>
        <select name="letra" id="letra">
            <option value="'Shadows Into Light', cursive">
                Shadows Into Light
            </option>
            <option value="'Slabo 27px', serif">Slabo 27px</option>
            <option value="'Roboto', sans-serif">Roboto</option>
        </select><br/><br/>
        <button name="enviar">Enviar</button>
    </fieldset>
</form>
</body>
</html>