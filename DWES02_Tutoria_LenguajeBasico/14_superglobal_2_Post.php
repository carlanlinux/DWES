<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<!--En el action ponemos el nombre del archivo que se está ejecutando con
$_SERVER['PHP_SELF'], es decir al pulsar el botón del formulario se vuelve
a cargar la misma página -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit">
</form>

<?php
/* si el método de envío ha sido POST guarda en la variable $name
 * el contenido la variable superglobal $_POST[name] que es el nombre
 * del campo del formulario HTML. si está vacía no muestra nada
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "El nombre está vacío";
    } else {
        echo $name;
    }
}
?>
</body>
</html>
