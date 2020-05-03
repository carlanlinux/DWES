<?php
/*
 * como no especificamos wsdl ponemos las url donde vamos a consumir el servicio
 * 'uri' => 'directorio donde está el servicio'  => identifica al recurso
 * 'location' => 'ruta absoluta del fichero que tiene el objeto SoapServer'
 * Observa que no incluimos ni la clase ni el archivo servidor del servicio
 */
require_once "servicioGenerado.php";


try {
    //Creamos el cliente: El primer parámetro es null (No tenemos WSDL) y el segundo Array con las direcciones del servicio
    $cliente = new servicioGenerado();
    $pvp = $cliente->getPVP("3DSNG");
    echo $pvp . "<br>";
    $stock = $cliente->getStock("3DSNG", 1);
    echo $stock . "<br>";
    $familias = ($cliente->getFamilias());
    print_r($familias) . "<br>";
    $proctosFamilias = ($cliente->getProductosFamilias("MEMFLA"));
    print_r($proctosFamilias) . "<br>";

} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>