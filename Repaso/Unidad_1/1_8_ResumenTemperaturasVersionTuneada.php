<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
<h1>Calculadora de edad</h1>
<?php

/*8) Resumen de temperaturas
• Escribe un programa PHP que permita al usuario introducir las temperaturas medias de las ciudades de Madrid, Barcelona,
 Sevilla y Bilbao en cada uno de los meses del año.
• El programa mostrará calculará la Temp. Max, Temp. Min y Temp. del año completo.*/

//Fijamos en una constante el número de las ciudades
define("NUM_CUIDADES", 4);

if (isset($_POST['Madrid'])) {
    //Metemos los datos del input en un array filtrados como enteros y nos devuelve un array con un array asociativo dentro Cuidade->Mes[valor]
    $input_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_NUMBER_FLOAT);
    //Ponemos una variable temperatura
    $temperatura = 0;
    //Nos recorremos el array de los input como cuidades=>meses
    foreach ($input_post as $ciudades => $meses) {
        //Ordenamos el array que contiene cada cuidad con la temperatura por MES (Mes es posición del 0 a 11 del array)
        sort($meses, SORT_DESC);
        //Nos recorremos el array de los meses dentro del array de cada ciudad para sacar los valores de la temperatura y sumarlos para hacer la media
        for ($i = 0; $i < 12; $i++) {
            $temperatura += $meses[$i];
        }
        //Pintamos la temperatura máxima y la mínima y calculamos la media
        echo "Temperatura máxima en $ciudades " . array_pop($meses) . ", con una media de " . round($temperatura / 12)
            . " Y una mínima de " . array_shift($meses) . ".<br>";
        //Reseteamos la temperatura a 0 para empezar con la siguiente ciudad
        $temperatura = 0;
    }

}

?>

<?php
//Crear menú con bucles
$nombre_ciudades = ["Barcelona", "Bilbao", "Madrid", "Sevilla"];
$nombre_meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$numero_cajas = ['Temperatura Máxima', 'Temperatura Mínima'];

echo "<form name='temperaturas' action='' method='post'>";
foreach ($nombre_ciudades as $ciudad) {
    echo "<fieldset><legend>$ciudad</legend>";
    foreach ($numero_cajas as $tipo_temperatura){
        echo "<fieldset><legend>$tipo_temperatura</legend>";
        foreach ($nombre_meses as $mes) {
            echo "<label for=\"{$numero_cajas[0]}\"_\"{$mes}}\">{$mes}</label>";
            echo "<input id==\"{$numero_cajas[0]}\"_\"{$mes}} type=\"number\" name=\"{$ciudad}[]\" value=\"2\" required>";
    }
        echo "</fieldset>";
    }
    echo "</fieldset>";
}
echo "</fieldset>";
?>

<!-- Para ocultarlo añado una variable de hidden y que la pone en true y lo oculta cuando acierta. -->
    <input type="submit" value="Enviar">

</form>
<br>
</body>
</html>