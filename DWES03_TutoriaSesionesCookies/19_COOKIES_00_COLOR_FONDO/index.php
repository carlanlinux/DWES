<!DOCTYPE html>
<!-- En este ejemplo se elige el color de fondo que queremos que tenga la página.
Al enviar el formulario al servidor, se guarda en una cookie el color elegido
Cuando se vuelve a cargar esta página, se comprueba si existe la cookie, y si 
es así, se asigna el color que contiene al atributo background -->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body <?php if (isset($_COOKIE['color'])) echo " style=\"background:$_COOKIE[color]\"" ?>
> <!-- cierre del body -->
<form action="pagina2.php" method="post">
    Seleccione de que color desea que sea la página de ahora en más:<br>
    <input type="radio" value="rojo" name="radio">Rojo<br>
    <input type="radio" value="verde" name="radio">Verde<br>
    <input type="radio" value="azul" name="radio">Azul<br>
    <input type="submit" value="Crear cookie">
</form>
</body>
</html>
