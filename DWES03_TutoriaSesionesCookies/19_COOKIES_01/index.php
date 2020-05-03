<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
/*
 * En este script se comprueba si existe la cookie "usuario". Si es así,
 * muestra un mensaje de saludo  y un enlace a pagina3.php en la que se
 * borra la cookie
 *
 * Si no existe se crea de forma dinámica un formulario en el que se
 * al usuario que teclee un nombre (tiene el atributo required),
 * y también tiene un botón para enviar los datos del formulario. El
 * action tiene como valor pagina2.php
 */
if (isset($_COOKIE['usuario'])) {
    echo "<div>Hola " . $_COOKIE['usuario'] . ", ¿Cómo estás?</div>";
    echo "<a href='pagina3.php'>Borrar cookie</a>";
} else {
    echo "<form method='post' action='pagina2.php'>
            NOMBRE:
            <input type='text' name='nombre' required>
            <br>
            <input type='submit' value='confirmar'>
            </form>";
}
?>
</body>
</html>
