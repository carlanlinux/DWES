<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
<h1>Calculadora de edad</h1>
<?php

/*scribe un programa PHP que permita al usuario introducir las temperaturas máximas y mínimas de las ciudades de Madrid,
 Barcelona, Sevilla y Bilbao en cada uno de los meses del año.
• El programa mostrará una tabla con columnas correspondientes al nombre de la ciudad, Temp. Max, Temp. Min y Temp.
 Media ordenadas alfabéticamente.*/

//Fijamos en una constante el número de las ciudades
define("NUM_CUIDADES", 4);
$nombre_ciudades = ["Barcelona", "Bilbao", "Madrid", "Sevilla"];
$nombre_meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$numero_cajas = ['Temperatura Maxima', 'Temperatura Minima'];

if (isset($_POST['Madrid'])) {
    //Metemos los datos del input en un array filtrados como enteros y nos devuelve un array con un array asociativo dentro Cuidade->Mes[valor]
    //Usamos valideta para que nos pase lo que encuentra a float
    $input_post = filter_input_array(INPUT_POST, FILTER_VALIDATE_FLOAT);
    //Ponemos una variable temperatura
    $temperatura = 0;

    //Ordenamos el array para poner en la última posición la máxima del array
    //sort($input_post['Barcelona']['Temperatura Maxima'], SORT_DESC);

    //Nos recorremos el array de los input como cuidades=>tipo de temperatura
    foreach ($input_post as $ciudades => $tipo_temperatura){
            //Nos recorremos el array del tipo de temperatura como temperaturas
        foreach ($tipo_temperatura as $temper) {
            //Nos recorremos el array que tiene las temperaturas de cada tipo de temperatura para sacar los valores de
            // la temperatura y sumarlos para hacer la media
            for ($i = 0; $i < 12; $i++) {
                $temperatura += $temper[$i];
            }
        }
        $temp_media = $temperatura / 24;
        //Sumamos en la parte final del array la media para añadirlo al array asociativo desde el input post hasta las
        // ciudades donde poner otro array con la temperatura media y su valor
        $input_post[$ciudades]['TemperaturaMedia'] = $temp_media;
        $temperatura = 0;
    }

    echo "<table><tr><th>Nombre ciudad</th><th>Temperatura Máxima</th><th>Temperatura Mínima</th><th>Temperatura Media</th></tr>";
    foreach ($input_post as $ciudades => $tipo_temperatura){
        if ($tipo_temperatura == 'TemperaturaMedia') {
            $media = $tipo_temperatura[0];
        }
        echo "<tr><td>$ciudades<td>";
        foreach ($tipo_temperatura as $temper){
            if ($tipo_temperatura = 'Temperatura Maxima') $max = max($temper);
            if ($tipo_temperatura = 'Temperatura Minima') $min = min($temper);
            echo "<td>$max</td><td>$min</td><td>$media</td></tr>";
        }
    }
    echo "/table>";





}
?>
<?php
////// *******************************        CREACIÓN FORM CON BUCLES       ***********************************   /////

echo "<form name='temperaturas' action='' method='post'>";
foreach ($nombre_ciudades as $ciudad) {
    echo "<fieldset><legend>$ciudad</legend>";
    foreach ($numero_cajas as $tipo_temperatura){
        echo "<fieldset><legend>$tipo_temperatura</legend>";
        foreach ($nombre_meses as $mes) {
            echo "<label for=\"{$numero_cajas[0]}\"_\"{$mes}}\">{$mes}</label>";
            echo "<input id==\"{$numero_cajas[0]}\"_\"{$mes}} type=\"number\" name=\"{$ciudad}[$tipo_temperatura][]\" value=2 required>";
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