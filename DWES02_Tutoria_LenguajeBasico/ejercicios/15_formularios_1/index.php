<!DOCTYPE html>
<html>
<head>
    <meta charset=UTF-8">
    <title>Formulario web</title>
</head>
<body>
<!--
En este ejemplo cuando se pulse el botón submit del formulario, se enviará
el contenido al script procesa.php.
Otra forma de tratar formularios que contengan checkbox es tratarlos como
un array. Fíjate en el atributo name de los campos checkbox, el atributo
name tiene el mismo nombre con corchetes.
-->
<form name="input" action="procesa.php" method="post">
    Nombre del alumno: <input type="text" name="nombre"/><br/>
    <p>Ciclos que cursa:</p>
    <input type="checkbox" name="ciclos[]" value="DWES"/> Desarrollo
    web en entorno cliente<br/>
    <input type="checkbox" name="ciclos[]" value="DWEC"/> Desarrollo
    web en entorno servidor<br/>
    <br/>
    <input type="submit" value="Enviar"/>
</form>
</body>
</html>
