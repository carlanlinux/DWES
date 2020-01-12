<?php
//Almacenar sesión con número de visitas - Lo de sesion va siempre antes que se pinte la página
//Inciamos la sesión o recuperamos
session_start();
//Comprobamos si la variable ya existe
if (isset($_SESSION['visitas'])) {
    //si existe le sumamos una visita
    $_SESSION['visitas']++;
} else {
    //si no existe la creamos a 0
    $_SESSION['visitas'] = 0;
}
?>

<?php
//Si en lugar del número de visitas, quisieras almacenar el instante en que se produce cada una, la variable de sesión
//"visitas" deberá ser un array y por tanto tendrás que cambiar el código anterior por:

//Iniciar sesión o recuperar
session_start();
//En cada visita añadimos un valor al array de visitas
$_SESSION['visitas'][] = mktime();

?>

<?php
//Cerrar sesión:
session_unset();

//Elminar completamente la sesión:
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>

<?php

?>
<?php ?> <br>
</body>
</html>



