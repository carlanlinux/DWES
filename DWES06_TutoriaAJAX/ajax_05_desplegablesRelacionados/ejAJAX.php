<?php
header("Content-type:text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";

$xml;
/* obtenemos el parámetro que nos llega con la petición AJAX
 * comprobamos si la opción seleccionada es "hombre" en cuyo caso devolvemos
 * los datos de los hombres, en caso contrario se devuelven los datos de las
 * mujeres
 */
if (!strcmp($_REQUEST["sexo"], "Hombre")) {
    $xml = "<datos><nombre>Juan</nombre><valor>1</valor>"
        . "<nombre>Pedro</nombre><valor>2</valor><nombre>David</nombre><valor>3</valor></datos>";
} else {
    $xml = "<datos><nombre>Maria</nombre><valor>1</valor>"
        . "<nombre>Sara</nombre><valor>2</valor><nombre>Ana</nombre><valor>3</valor></datos>";
}
echo $xml;
