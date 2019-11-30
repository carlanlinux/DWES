<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Page</title>
</head>
<body>

<?php
    $url_page= 'php/created/page/url.php';
    $param1 = 'this is a string';
    $param2 = '"bad"/<>characters$';
    $linktext = "<click> & you'll see";
    ?>

<?php
    //ESto da un link limpio que interpreta cualquier navegador
    $url = "http://localhost/";
    //delante del question mark usamos el rawurldecode y luego ya van los siguientes parámetros
    $url .= rawurldecode($url_page);
    $url .= "?param1=" . urlencode($param1);
    $url .= "&param2=" . urlencode($param2);

?> <br>
<?php
    echo "La URL resultante es: {$url} "
?> <br>
Usamos specialcaracters abajo para escapar todos los caracteres especiales  asegurarnos que no salen cosas raras.
<a href="<?php echo htmlspecialchars($url); ?>"> <?php echo htmlspecialchars($linktext); ?> </a>

<?php ?> <br>
</body>
</html>



