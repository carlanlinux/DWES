<!DOCTYPE html>
<!-- Esta vista muestra un formulario para dar de alta alumos en el curso-->
<html>
<head>
    <meta charset="utf8"
    <title>Problema</title>
</head>
<body>
<h1>Alta de Alumnos</h1>
<form action="" method="post">
    Ingrese nombre:
    <input type="text" name="nombre" required><br>
    Ingrese mail:
    <input type="text" name="mail" required><br>
    Seleccione el curso:
    <select name="codigocurso" required>
        <option value="1">PHP</option>
        <option value="2">ASP</option>
        <option value="3">JSP</option>
    </select>
    <br>
    <input type="submit" value="Registrar">
</form>
</body>
</html>