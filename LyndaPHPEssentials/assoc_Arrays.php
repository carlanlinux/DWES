<html>
<head>
    <title>Associative array</title>
</head>
<body>
Associative Array: Se usa cuando no nos importa el orden en el Array.
Associative Array
An object-indexted array - Se guarda con etiquetas
No tienen un orden y pueden ser refrenadas
Se busca por etiquetas (the key) and the value
Key-value pair —> Pareja llave valor
Si importa el orden -> Array normal <hr>
<?php
    //Creamos el Array como uno normal (Notación antigua)
    $assoc = array("first_name" => "Kevin", "last_name" => "Perez");
    //Se accede por la clave en vez de por índice, Indice no funciona.
    echo $assoc["first_name"];
?> <br>

<?php
    echo $assoc["first_name"] . " " . $assoc["last_name"];
?> <br>

<?php
    //Se modifica accediendo por clave
    $assoc["first_name"] = "Larry";
    echo $assoc["first_name"] . " " . $assoc["last_name"];
?> <br>
<?php
    //Ambos dos son lo mismo
    $numbers = [2, 4, 8, 16, 32];
    $numbers = [0 => 2, 1 => 4, 2 => 8, 3 => 16, 4 => 32];
    echo $numbers[0];
?>

</body>
</html>