<?php
/*Trabajar con texto y array
• Escribe un programa PHP que permita al usuario introducir un texto mediante una caja de texto. El programa informará
al usuario si en dicho texto se incluyen palabras que comience por mayúscula, tenga entre 8 y 10 letras, contenga 4
 vocales y termine en “ero”.
• El programa devolverá un listado con las palabras que cumplan dichas condiciones. Dichas palabras aparecerán en
mayúsculas y separadas por un ‘-‘ y sin repetirse.
• Se listarán ordenadas de mayor a menor longitud y si hay palabras de igual longitud se ordenarán en orden alfabético.
Podemos asumir que las palabras pueden estar separadas por blancos, carácter de nueva línea, tabuladores, puntos, comas,
 dos puntos y punto y coma.*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trabajar con Texto y Array</title>
</head>
<body>

<?php
if (isset($_POST['texto'])) {
    $texto = ($_POST['texto']);
    $salida = [];
    $vocales = "aeiouAEIOU";
    $palabras = [];
    $palabra = "";
    //Comenzamos con dos vocales porque ya asumimos que tenemos dos al final por la regExp
    $numvocales = 0;
    //Usamos un preg_match_all incluyendo un array en matches donde va a ir guardando cada match. Acordarse de las barritas
    //Si queremos rescatar el varios mateches iguales, deberíamos cambiar el método a preg_match_all
    $comprobacion = preg_match_all("/[A-Z][a-z]{4,6}ero/", $texto, $salida);
    //Hacaemosun pop del último elemento del array ya que pregmatch nos guarda los resultados dentro de un array
    // dentro del array salida
    $salida = array_pop($salida);
    //Nos quedamos con las palabras únicas que han salido
    $salida = array_unique($salida, SORT_STRING);
    //Tendríamos que pasar el array salida a strings y comprobar que contengan 4 vocales.
    //** Bucle palabra  */
    for ($i = 0; $i < sizeof($salida); $i++) {
        //Ponemos el contador de vocales a 0 al empezar con una palabra.
        $numvocales = 0;
        /* BUCLE CADA LETRA DE LA PALABRA */
        //Sacamos el tamaño del array que nos devuelve contar caracteres de la palabra. en modo 1, que nos devuelve
        // sólo los que tiene caracter
        for ($j = 0; $j < sizeof(count_chars($salida[$i][$j])); $j++) {
            $letraPalabra = $salida[$i][$j];
            /* BUCLE CADA LETRA DE LAS VOCALES */
            for ($k = 0; $k < sizeof(count_chars($vocales, 1)); $k++) {
                $vocal = $vocales[$k];
                if ($letraPalabra == $vocal) {
                    $numvocales++;
                }
            }
        }
        if ($numvocales >= 4) {
            $palabra = $salida[$i];
            array_push($palabras, $palabra);
        }
    }
}
?>
<?php ?> <br>
<form action="" method="post" name="form">
    <textarea name="texto" value=""></textarea>
    <input type="submit">
</form>
</body>
</html>



