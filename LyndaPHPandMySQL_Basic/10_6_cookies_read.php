<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer Cookies</title>
</head>
<body>


<?php
    //Para leer cookies como no siempre están tenemos que hacer un if y darle un valor por defecto que queramos en el caso
    //que no se puedan leer y que no pete
    $var1 = 0;
    if(isset($_COOKIE['test'])) {
        $var1 = $_COOKIE['test'];
    }
    echo $var1;
?>
<?php
    //Para borrar una cookie poner valor a 0 y fecha de expiración negativa
    setcookie('test',0,time()-(60*60*24*7));

?> <br>
</body>
</html>



