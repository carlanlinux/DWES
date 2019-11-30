<?php
    session_start();

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions</title>
</head>
<body>
En sesiones puedes controlar mejor que con cookies ya que se guardan en nuestor servidor, aunque se guardan por un tiempo
inferior al de las cookies
Usamos cookies, special session cookies para encontrar cuál es la localización del archivo de sesión del usuario en concreto
1. Crear este archivo de sesión y crear la cookie en el navegador del usuario.
Tiene que aparecer el session start al principio de nuestra web, encima de cualquier HTML.
Una vez tengamos nuestro fichero de sesión ahí podemos almacenar información accediendo a la super global variable session
<hr>
<?php
    $_SESSION['first_name'] = "Pepito";
    $_SESSION['second_name'] = "palotes";
?>
<?php
    $name = $_SESSION['first_name'] . " " . $_SESSION['second_name'] ;
    echo $name;
?> <br>
</body>
</html>



