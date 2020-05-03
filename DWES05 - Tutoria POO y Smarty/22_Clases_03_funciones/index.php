<?php
require_once("Persona4.php");
/*
 * La clase Persona tiene atributos public, private y protectes tanto de
 * estáticos como no.
 */
$objPersona = new Persona4();

/* Llamamos a la función get_class_vars() que nos devuelve un array los
 * nombres de las propiedades definidas en una clase.
 * Al llamar a esta función desde una instancia de la clase solo tenemos
 * acceso a las propiedades con visibilidad pública, que serán las que
 * devuelva en el array.
 */
$aPropiedades1 = get_class_vars("Persona4");

// También es posible hacerlo pasando un Objeto como parámetro...
// $aPropiedades1 = get_class_vars( get_class($objPersona) );
echo "<h2> Obtenemos las propiedades con get_class_vars('Persona4')</h2>";
echo "<p>Mostramos PROPIEDADES 1: solo muestra las propiedades a las que "
    . "tenemos acceso desde aquí, es decir las públicas.</p>";

foreach ($aPropiedades1 as $nombre => $valor) {
    echo $nombre . ": [" . $valor . "]<br/>";
}
echo "<hr>";

/*
 * Llamamos a la función get_object_vars que devuelve en un array el nombre de
 * las propiedades NO ESTÁTICAS del objeto dado por parámetro.
 * Al llamar a esta función desde una instancia de la clase solo tenemos
 * acceso a las propiedades NO ESTÁTICAS con visibilidad pública.
*/
$aPropiedades2 = get_object_vars($objPersona);
echo "<h2> Obtenemos las propiedades con get_object_vars( \$objPersona )</h2>";
echo "<p>PROPIEDADES 2: muestra las propiedades públicas definidas en la clase</p>";

foreach ($aPropiedades2 as $nombre => $valor) {
    echo $nombre . ": [" . $valor . "]<br/>";
}
echo "<hr>";


/*
 * Llamamos al método que hemos definido en la clase getPropiedades que
 * a su vez llama a la función get_class_vars que devuelve en un array el
 * nombre de las propiedades de la clase a las que tengamos acceso.
 * Al llamar a esta función desde un MÉTODO de la clase tenemos acceso a
 * todas las propiedades de la clase independientemente de su visibilidad
*/
echo "<h2> Obtenemos las propiedades llamando al método de la clase <br/>"
    . "getPropiedades </h2>";
echo "<p>PROPIEDADES (obtenidas desde un método de la clase recuperamos "
    . "todas las propiedades</p>";

// Se devolverán TODAS las propiedades:
$objPersona->getPropiedades();
echo "<hr>";

/*
 * Llamamos a la función get_class_methods que devuelve en un array el nombre
 * de los métodos de la clase a los que tengamos acceso.
 * Al llamar a esta función desde una instancia de la clase solo tenemos
 * acceso a los métodos con visibilidad pública.
*/

$aMetodos = get_class_methods("Persona4");
// También es posible hacerlo pasando un Objeto como parámetro...
// $aMetodos = get_class_methods( get_class($objPersona) );
echo "<h2> Obtenemos los métodos definidos en la clase <br/>con "
    . "get_class_methods('Persona4') (desde aquí solo públicos)</h2>";
echo "<p>MÉTODOS:</p>";

foreach ($aMetodos as $clave => $valor) {
    echo $clave . ": " . $valor . "<br/>";
}
echo "<hr>";

/*
 * Llamamos al método que hemos definido en la clase getMetodos que
 * a su vez llama a la función get_class_methods que devuelve en un array
 * el nombre de los métodos de la clase a las que tengamos acceso.
 * Al llamar a esta función desde un MÉTODO de la clase tenemos acceso a
 * todos los métodos de la clase independientemente de su visibilidad
*/

echo "<h2> Obtenemos los métodos llamando al método de la clase <br/>"
    . "getMetodos </h2>";
echo "<p>Métodos (obtenidos desde un método de la clase recuperamos "
    . "todos los métodos)</p>";

// Se devolverán TODOS los métodos:
$objPersona->getMetodos();
echo "<hr>";
?>