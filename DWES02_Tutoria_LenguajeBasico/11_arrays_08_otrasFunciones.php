<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
echo "<h2>insertar elementos array_unshift y array_push</h2>";
/* Insertar elementos en un array */
/* Usaremos la función array_push() para insertar elementos al final
 * de un array y array_unshift() para insertar elementos al principio del mismo.
 * Estas funciones de PHP devuelven el número de elementos en el
 * array tras la inserción. */
$aDias = array("Martes", "Miércoles", "Jueves");
echo "array antes de insertar<br/>";
print_r($aDias);
array_unshift($aDias, "Lunes");
$num = array_push($aDias, "Viernes");

// El array quedaría: "Lunes", "Martes", "Miércoles", "Jueves", "Viernes"
//Con la función print_r() mostramos los valores contenidos en las diferentes posiciones del array.
echo "array después de insertar al principio rl lunes y al final el vierner<br/>";
print_r($aDias);

echo "<p/>el array tiene " . $num . " elementos<br/>";   // Devuelve 5
echo "número de elementos del array con count " . count($aDias) . "<br />";      // Devuelve 5
echo "<hr>";
echo "<h2>insertar/borrar elementos array_splice</h2>";
/*
     * Para insertar elementos en un array disponemos también de la función
     * de PHP array_splice(): en el segundo parámetro especificamos en qué
     * posición insertar el elemento (recuerda que comienzan desde cero),
     * en el tercer parámetro pondremos cero (puesto que esta función es
     * usada también para borrar elementos en un array, como veremos más a
     * delante) y en el cuarto parámetro indicaremos el valor que deseamos
     * guardar en dicha posición.
    */
/*Observa que los valores de las posiciones existentes, desde la que
 * hemos insertado el nuevo elemento, se han desplazado a la derecha.*/
$aDias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
// En la posición 2 insertamos el valor 88
echo "el array insertando el valor 88 en la segunda`posición queda: <br/>";
array_splice($aDias, 2, 0, 88);
// El array quedaría: "Lunes", "Martes", 88, "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo";
print_r($aDias);
echo "<br/><br/>";
/* Para borrar un elemento
 * Se puede usar array_splice() para borrar elementos de un array,
 * así pues podemos combinar las dos acciones: si en el tercer parámetro
 * escribimos un número que no sea cero se insertará el elemento deseado
 * y también se borrarán las posiciones indicadas:
 * podemos eliminar un determinado número de posiciones a partir de la
 * indicada: en el segundo parámetro indicamos a partir desde qué
 * posición borrar (recuerda que comienzan desde cero) y en el tercer
 * parámetro cuántos elementos deseamos eliminar (si se pone cero,
 * no se eliminará ninguno).
*/
array_splice($aDias, 2, 1, "DWES");

// El array quedaría: "Lunes", "Martes", "DWES", "Jueves", "Viernes", "Sábado", "Domingo";
echo "el array BORRANDO el valor 88 y cambiandolo por DWES en la segunda`posición queda: <br/>";
print_r($aDias);
echo "<br>";
// Desde la posición 3 borramos 2 elementos (el actual y el siguiente, las posiciones 2 y 3)
array_splice($aDias, 2, 2);
// El array queda: "Lunes", "Martes", "Jueves","Viernes", "Sábado", "Domingo"
print_r($aDias);
echo "<hr>";
echo "<h2>borrar elementos array_shift / array_pop</h2>";
$aDias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
print_r($aDias);
echo "<br>";
echo "borramos el primero con array_shift()<br/>";
$primero = array_shift($aDias);
print_r($aDias);     // El array queda: "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"
echo "<br/><br/>";
echo "borramos el ultimo con array_pop()<br/>";
$ultimo = array_pop($aDias);
print_r($aDias);              // El array queda: "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
echo "<br />";
echo "<p>ahora el array tiene " . count($aDias) . " dias<p />";      // Devuelve 5

echo "El primer elemento era: " . $primero . "<br />";  // Devuelve "Lunes"
echo "El último elemento era: " . $ultimo . "<br />";   // Devuelve "Domingo"

/*
 * la función array_unique(), devuelve un array con el resultado de
 * eliminar valores duplicados en un array:
*/
echo "<hr>";
echo "<h2>array sin duplicados: array_unique</h2>";
$aDias = array("Lunes", "Martes", "Jueves", "Jueves", "Viernes", "Sábado", "Lunes");
$resultado = array_unique($aDias);
// Devuelve: Array ( [0] => Lunes [1] => Martes [2] => Miércoles )
print_r($aDias);
echo "<br/>";
print_r($resultado);
echo "<hr>";

/*
 * Por último, para vaciar un array lo crearemos de nuevo con el mismo
 * nombre, o bien usando la función de PHP unset() eliminaremos el array
 * definitivamente:
*/
echo "<h2>eliminar array</h2>";
$aDias = array("Lunes", "Martes", "Miércoles");   // Crear el array
print_r($aDias);
echo "creasmos el array aDias vacio con la función array() <br/>";
$aDias = array();   // Borrar todos los elementos
print_r($aDias);
echo "<br/>";
echo "eliminamos el array con unset()<br/>";
unset($aDias);      // Eliminar el array de la memoria
if (!isset($aDias)) {
    echo "el array no existe<br/>";
} else
    print_r($aDias);
echo "<hr/>";
echo "<h2>ordenar array</h2>";
/* ordenar un array: función sort() */

$aDias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes",
    "Sábado", "Domingo");
sort($aDias);

// El array queda: "Domingo", "Jueves", "Lunes", "Martes", "Miércoles",
// "Sábado", "Viernes"
echo "el array aDias ordenado ascendentemente queda: <br/>";
print_r($aDias);
echo "<br/><br/>";
/*
Para ordenar descendentemente usaremos la función rsort():
*/
$aDias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes",
    "Sábado", "Domingo");
$aNumeros = array(10, 11, 8, 103, 99, 54);
echo "el array aNumeros sin ordenar: <br/>";
print_r($aNumeros);
rsort($aDias);
rsort($aNumeros);
// El array queda: "Viernes", "Sábado", "Miércoles", "Martes", "Lunes",
// "Jueves", "Domingo"
echo "<br/><br/>";
echo "el array aDias ordenado descendentemente queda: <br/>";
print_r($aDias);
echo "<br/><br/>";
// El array queda: 103, 99, 54, 11, 10, 8
echo "el array aNumeros ordenado descendentemente queda: <br/>";
print_r($aNumeros);
echo "<br/><br/>";

/* con array_reverse() obtenemos el array con los elementos en orden inverso
 *  (no modifica el array original):
*/
$aNombres = array("Pepe", "Ana", "Marta", "Alfredo", "Rosa");
// El array queda: "Rosa", "Alfredo", "Marta", "Ana", "Pepe"
echo "el array aNombres sin ordenar:<br/>";
print_r($aNombres);
echo "<br/><br/>";
echo "el array aNombres sin ordenado en orden inverso:<br/>";
print_r(array_reverse($aNombres));
echo "<hr/>";

echo "<h2>ordenar arrays asociativos</h2>";
$aColores1 = array("color1" => "rojo", "color2" => "verde",
    "color3" => "azul", "color4" => "verde");
$aColores2 = array(37, "Pedro", "color1" => "rojo",
    "color2" => "verde", "color3" => "azul");
echo "array asociativo sin ordenar<br/>";
print_r($aColores1);
echo "<br/><br/>";
echo "array asociativo ordenado<br/>";
asort($aColores1);
print_r($aColores1);
echo "<br/><br/>";
/* obtener las claves de un array asociativo, función array_keys()*/
// Devuelve: Array ( [0] => color1 [1] => color2 [2] => color3
// [3] => color4 )
echo "<hr/>";
echo "<h2>Ver claves array_keys arrays asociativos</h2>";
print_r(array_keys($aColores1));
echo "<br/><br/>";

/* busca si está una clave y devuelve en qué posiciones está o un array
 * vacío si no lo encuentra
 */
// Devuelve: Array ( [0] => color2 [1] => color4 )
echo "busca el valor verde<br/>";
print_r(array_keys($aColores1, "verde"));
echo "<br/><br/>";
echo "busca el valor amarillo<br/>";
print_r(array_keys($aColores1, "amarillo"));
echo "<br/><br/>";
// Devuelve: Array ( [0] => 0 [1] => 1 [2] => color1 [3] => color2
// [4] => color3 )
print_r(array_keys($aColores2));
echo "<hr><br/>";
/*comprobar si un array asociativo tiene una determinada clave
 * función array_key_exists() */
$aColores = array("color1" => "rojo", "color2" => "verde",
    "color3" => "azul");
echo "el array aColores ahora tiene: <br/>";
print_r($aColores);
echo "<br/><br/>";
echo "buscamos si existe la clave 'color3' con la función array_key_exists(): <br/>";
if (array_key_exists("color3", $aColores) == true)
    echo "La clave 'color3' existe en el array asociativo.<br/>";
echo "buscamos si existe la clave 'color9' con la función array_key_exists(): <br/>";
if (array_key_exists("color9", $aColores) == false)
    echo "La clave 'color9' NO existe en el array asociativo.";
echo "<hr><br/>";
echo "<h2>otro ejemplo con array_keys()</h2>";
$superheroes = array("spider-man" => array("name" => "Peter Parker",
    "email" => "peterparker@mail.com"),
    "super-man" => array("name" => "Clark Kent",
        "email" => "clarkkent@mail.com"),
    "iron-man" => array("name" => "Harry Potter",
        "email" => "harrypotter@mail.com")
);
echo "tenemos un array asociativo de super héroes;<br/>";
print_r($superheroes);
$keys = array_keys($superheroes);
echo "obtenemos las claves del array  con array_keys (las del primer array<br/>";
print_r($keys);
echo "<br/><br/>";
echo "mostramos toda la información del array<br/>";

for ($i = 0; $i < count($superheroes); $i++) {
    echo $keys[$i] . "{<br>";
    foreach ($superheroes[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "}<br>";
}
echo "<br/><br/>";
for ($i = 0; $i < count($superheroes); $i++) {
    //cogemos las claves del segundo array que son name e email para
    //cada elemento del primer array
    $keys2[$keys[$i]] = array_keys($superheroes[$keys[$i]]);
}
print_r($keys2);

?>
</body>
</html>



