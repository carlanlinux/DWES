<?php
require_once("Persona.php");

//acceder a la constante antes de crear un objeto:
//se escribeel nombre de la clase siguida del operador de ámbito de
//resolución y el nombre de la constante (se suelen definir en mayúsculas,
//para diferenciarlas de las propiedades)
echo "Muestro la constante PERSONA_MUJER antes de crear instancia de la clase: ";
echo Persona::PERSONA_MUJER;
echo "<hr><br/>";

// Crear un Objeto (una instancia de la Clase):
// Se accede a las propiedades y métodos utilizando el operador flecha
// Observa que no anteponemos el símbolo $ al nombre de la propiedad cuando
// la referenciamos
$objPersona = new Persona();

// Establecemos valores para las propiedades de la clase, utilizando los
// métodos set para las propiedades de visibilidad privada y directamente
// con el operador flecha en el caso de las propiedades de visibilidad pública
$objPersona->setNombre("MARTINA");
$objPersona->setApellidos("MARRERO MEDINA");
//edad es un atributo público
$objPersona->edad = 40;

// la forma de obtener los valores de las propiedades es mediante los métodos
// get en el caso de las propiedades privadas, y mediante el operador flecha
// en el cado de las propiedades públicas.
echo "Nombre: " . $objPersona->getNombre() . "<br/>";        // Devuelve: "Nombre: [MARTINA]"
echo "Apellidos: " . $objPersona->getApellidos() . "<br/>";  // Devuelve: "Apellidos: [MARRERO MEDINA]"
echo "Edad: " . $objPersona->edad . "<br/>";  // Devuelve: 40
echo "<hr>";

//al borrar el objeto con unset forzamos que se ejecute el destructor
if (!strcmp($objPersona->getNombre(), "MARTINA")) {
    unset($objPersona);
}
//una vez destruido ya no podemos acceder a él
echo "Nombre: [" . $objPersona->getNombre() . "]<br/>";        // Da error, el objeto ya no existe

?>
