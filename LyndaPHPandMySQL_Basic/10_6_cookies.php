<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>



<?php /* Setting a cookie
//Antes de usar una cookie tenemos que crear la cookie
setcookie ($name, $value, $expire);

//Para poner la fecha de expiración de la cookie lo mejor es tirar de la función time que da la hora ectual y
//sumarle los segundos que queramos. 60 segundos un minuto * 60 segundos una hora * 24 horas un día * 7 días a la semana

setcookie(name, value, expiration); */
//Si queremos deshacernos de una cookie o ponemos su valor a nada o ponemos su fecha de expiración en negativo.

setcookie('lastre', 45, time()+(60*60*24*7));

?>



<?php ?> <br>
</body>
</html>



