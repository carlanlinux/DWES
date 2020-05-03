<?php
if (empty($_POST)) {
    //  si no ha llegado nada vuelve a la página de index.
    header('Location: index.php');
    exit();
}

function cmp ($a, $b)
{
    return (strlen($b) - strlen($a)) ?: strcmp($a, $b);
}

function isNumLetraMayuscula ($palabra, $numLetra)
{
    return (isset($palabra[$numLetra]) && strtoupper($palabra[$numLetra]) === $palabra[$numLetra]);
}

function islongitudMinMAx ($palabra, $min, $max)
{
    return ((strlen($palabra) >= $min) && (strlen($palabra) <= $max));
}

function isNumVocales ($palabra, $num)
{
    return (preg_match_all('/[aeiou]/i', $palabra, $matches) === $num);
}

function isFinPalabra ($palabra, $fin)
{
    return (substr($palabra, -(strlen($fin))) === $fin);
}

/*
 * la función filter_input() toma una variable de un tipo, en este caso
 * INPUT_POST referido a la variable que llega por post con nombre "texto"
 * y la filtra según un tipo de filtro, en este caso FILTER_SANITIZE_STRING
 * que elimina etiquetas.
 * http://php.net/manual/es/function.filter-input.php
 */
$texto = trim(filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING));
$palabras = [];

$palabra = strtok($texto, " \n\t.,;:");
while ($palabra !== false) {
    if (isNumLetraMayuscula($palabra, 0) || isLongitudMinMax($palabra, 8, 10)
        || isNumVocales($palabra, 4) || isFinPalabra($palabra, "ero")) {
        $palabras[] = strtoupper($palabra);
    }


    $palabra = strtok(" \n\t.,;:");
    echo "palabra: " . $palabra . "<br/>";
}
//elimina duplicados
array_unique($palabras);
/*ordena el array según sus valores usando la función que hemos definido,
 * cmp que compara la longitud de las palabras
 */
usort($palabras, "cmp");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Encuentra Palabra Correcta</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div class='info'>
    <p>Las palabras buscadas son
    <p>
    <div>
        <?= implode('-', $palabras) ?>
    </div>
</div>
</body>
</html>







