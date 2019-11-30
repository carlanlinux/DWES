<?php
    //Así es como se redirige una página - 302 redirect
    header("Location: 10_5_Forms.php");
    exit();
?>

<?php
    //Así es como se manda un error 404 al navegador
    header("HTTP/1.0 404 Not Found");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Headers and page redirections</title>
</head>
<body>
Headers: Es la primera cosa qeu se pasa, cualquier manipulación sobre los headers tiene que ser antes de cualquier otra
cosa ya que se trata de decir al navegador lo que va a recibir. <br>
Output buffering: Hay navegadores que cargan todo primero y luego cuando tienen todo cargado, es cuando ejecutan los headers
y el resto del contenido. Por eso puede ser que poniendo las cabeceras entremedias del código siga funcionando.
Para gestionar output buffer tenemos:
<strong>ob_start();</strong>
    el codigo de nuestra web
<strong>ob_end_flush();</strong>
<?php

?>
<?php ?> <br>
</body>
</html>



