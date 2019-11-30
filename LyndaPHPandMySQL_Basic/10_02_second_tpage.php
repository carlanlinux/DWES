<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Second Page</title>
</head>
<body>

<?php
    //PHP guarda todo lo que recibe después de la interrogación en un array que se le llama super global variable
    //Las variables superglobal empiezan con _
    //No hace falta que pongamos urldecode, PHP ya lo hace automáticamente cada vez que le viene con un encode
    print_r($_GET);
    $id = $_GET['id'];
    $name = $_GET['name'];
    echo "<hr><strong>" . $id . " con nombre {$name}" . "</strong>";

?>
<?php ?> <br>
</body>
</html>



