<!--Escribe un programa PHP que permita al usuario introducir una fecha y la valide como fecha correcta.
El formato de la fecha será “dd-mm-yyyy”.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página de cálculo</title>
</head>
<?php
//Declaramos las constantes
define('NUMRESULTADOS',100);
define('NUMSPORPAPELETA', 6);
define('NUMNIN', 1);
Define('NUMMAX',49);
//Creamos el array donde guardar las papeletas
$papeletas = [];


//Creamos las 100 papeletas
do {
    $papeleta = [];
    //Creamos cada papeleta mientras que haya menos de 6 números en la papeleta
    do {
        //Variable auxiliar para comprobar si son iguales
        $igual = false;
        //Creamos el número alatorio
        $num = rand(NUMNIN,NUMMAX);
        //Comprobamos si ese número ya ha salido
        for ($k = 0; $k < sizeof($papeleta);$k++){
            if ($num == (int)$papeleta[$k]) {
                //Si el número ya ha salido ponemos e aux a true y paramos el bucle
                $igual = true;
                break;
            }
        }
        //Si igual es falso lo metemos en el array que guarda los números de la papeleta
        if (!$igual) {
            array_push($papeleta,$num);
        }
    } while (sizeof($papeleta) < NUMSPORPAPELETA);
    //Pasamos el array a String con implode separando cada número de la papeleta por un espacio
    $papeletaString = implode( " ", $papeleta);
    //Metemos la papeleta en el array
    array_push($papeletas, $papeletaString);
    //Comprobamos que no haya repetidos, si hay repetido borramos la entrada repetida
    array_unique($papeletas);

} while (sizeof($papeletas) < NUMRESULTADOS);
//Pintamos las papeletas
print_r($papeletas);


?>
