<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Include</title>
</head>
<body>
Include: Se usa generalmente para cargar HTML que no es 100% necesario para que funcione la página. <br>
Require: Es necesario que cargue el fichero para que funcione la página, si no da un error. Normalmente para las funciones
PHP necesarias. <br>
Require_once: Se usa para evitar que carguemos un archivo con las mismas funciones dos veces en el código sin querer y
que pete, ya que sólo se pueden definir las funciones una única vez.Así, si se incluye una segunda vez, se ignora.<br>

Lo bueno de esto es que podemos tener un único fichero que incluya todas las funciones de un cierto tipo, de tal forma
que se hace un include y luego se puede ir llamando a sus funciones sin enguarrinar el código. (Usarlo a modo de interfaz)
Ej: Funciones para formularios, funciones para control de sessiones...etc <br>

Require: Es necesario que cargue el fichero para que funcione la página, si no da un error. P

<?php
    //Cuando incorporamos contenido PHP necesitamos que el fichero que incluimos tenga los tags de PHP aunque se vaya a
    // cargar dentro de unos tags PHP en la página que lo carga
    include("10_9_Included_func.php");
    require("10_9_Included_func.php");
?>
<?php
    hello("Everyone");
?> <br>
</body>
</html>



