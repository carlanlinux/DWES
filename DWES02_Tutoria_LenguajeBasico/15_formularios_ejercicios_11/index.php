<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<h1>Introduce un texto</h1>
<div class="info">
    <form name="Formulario Seleccion Palabra"
          action="encuentrapalabras.php" method="POST">
        <div class="form-section">
            <textarea rows="4" cols="50" name="texto"></textarea>
        </div>
        <input class="submit" type="submit"
               value="Enviar" name="botonenvio"/>
    </form>
</div>
</body>
</html>