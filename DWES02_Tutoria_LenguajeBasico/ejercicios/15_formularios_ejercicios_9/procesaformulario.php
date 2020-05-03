<!DOCTYPE html>
<html>
<head>
    <title>Datos de Formulario de Registro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<h1>
    <p>Sus datos son los siguientes:</p>
    <p>Nombre: <em><?= $_POST['nombre'] ?></em></p>
    <p>Email: <em><?= $_POST['email'] ?></em></p>
    <p>Contraseña: <em><?= $_POST['contrasenia'] ?></em></p>
    <p>Fecha de nacimiento: <em><?= $_POST['fecha'] ?></em></p>
    <p>Tienda: <em><?= $_POST['poblacion'] ?></em></p>
    <p>Sexo: <em><?= (isset($_POST['sexo']) ? $_POST['sexo'] : "Dato no introducido") ?></em></p>
    <p>Edad: <em><?= $_POST['edad'] ?></em></p>
    <p>Suscripción: <em><?= (isset($_POST['suscripcion']) ? "Suscrito" : "No Suscrito") ?></em></p>
</h1>
</body>
</html>