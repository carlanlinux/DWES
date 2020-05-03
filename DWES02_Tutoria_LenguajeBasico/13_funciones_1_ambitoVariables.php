<?php
//ámbito  LOCAL de las variables
/*
 * tenemos una función en la que recibimos una valor por parámetro y calculamos
 * el doble.
 * fuera de la función tenemos una variable que se llama igual que la variable que
 * usamos dentro de la función.
 * 
 * Aunque se llamen igual PHP las trata como variables diferentes. El valor de 
 * la variable usada fuera de la función no cambia después de llamar a la función.
 */
function duplicar ($var)
{
    $var *= 2;
}

$var = 5;

echo "<h2>ejemplo ámbilo local de las variables</h2>";
echo "el valor de la variable ANTES DE llamar a la función duplicar es: $var </br>";
duplicar($var);
echo "el valor de la variable DESPUÉS de llamar a la función duplicar es: $var </br>";
echo "</br>";
echo "<hr></br>";

//devolviendo un resultado
function duplicar2 ($valor)
{
    $resultado = $valor * 2;
    return ($resultado);
}

echo "<h2>llamar a una función devolviendo un resultado </h2>";
$var = 5;
echo "el valor de la variable ANTES DE llamar a la función duplicar2 es: $var </br>";
$var = duplicar2($var);
echo "el valor de la variable DESPUÉS de llamar a la función duplicar2 es: $var </br>";
echo "</br>";
echo "<hr>";


echo "<h2>variables no globales</h2>";
//si se define fuera sin la palabra global, se consideren varaibles distintas. 
//En este ejemplo da error porque intenta mostrar en la función una variable que
//no existe.
$a = 1;
echo "el valor de la variable a antes de llamar a la función prueba es: $a </br>";
function prueba ()
{
    if (isset($a))
        echo "en la función la variable a vale $a"; //es una variable distinta;
    else
        echo "<b>la variable a no existe en la función</b>";
}

prueba();
echo "</br>";


//variable global. se define anteponiendo la palabra global
//la forma de usarlo es definir fuera de la función la variable global
//y dentro indicar que es global. 

echo "<h2>Definir variables globales</h2>";
echo "Para poder usar una variable definida fuera de una función, se antepone "
    . "dentro de la función la palabra reservada global antes del nombre de la variable";
echo "</br>";
function duplicar3 ()
{
    global $varG;
    $varG = $varG * 2;
}

$varG = 5;
echo "el valor de la variable GLOBAL ANTES DE llamar a la función duplicar3 es: $varG </br>";
duplicar3();
echo "el valor de la variable GLOBAL DESPUÉS de llamar a la función duplicar3 es: $varG </br>";
echo "</br>";
echo "<hr></br>";


echo "<h2>ejemplo de la plataforma con pi sin ser variable global</h2>";
$pi = 3.14;
function valor_pi ()
{
    if (isset($pi)) {
        $pi = pi();
        return $pi;
    } else
        echo "la variable pi no está definida";
}

echo valor_pi();

echo "<h2>ejemplo de la plataforma con pi como variable global</h2>";
$pi = 3.14;
function global_valor_pi ()
{
    global $pi;
    if (isset($pi)) {
        $pi = pi();
        return $pi;
    } else
        echo "la variable pi no está definida";
}

echo global_valor_pi();
?>
