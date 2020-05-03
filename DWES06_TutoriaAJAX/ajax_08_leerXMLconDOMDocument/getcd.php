<?php
$q = $_GET["q"];

/* la clase DOMDocument representa un documento HTML o XML totalmente
 * sirviendo como raíz del árbol del documento
 * http://php.net/manual/es/class.domdocument.php
 * http://php.net/manual/es/class.domnode.php
 * http://php.net/manual/es/dom.constants.php
 */
$xmlDoc = new DOMDocument();
$xmlDoc->load("cd_catalog.xml");
/* */
$x = $xmlDoc->getElementsByTagName('ARTIST');

for ($i = 0; $i <= $x->length - 1; $i++) {
    /*Se comprueba si el nodo coincide con el elemento seleccionado
         * la página HMTL y si es así guardamos el nodo padre (CD) en la
         * variable $y
         */
    if ($x->item($i)->nodeType == 1) {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
            $y = ($x->item($i)->parentNode);
        }
    }
}
/* Una vez encontrado el artista que se seleccionó en la página HTML
 * se obtiene el resto de datos que están en los nodos hijos del
 * elemento que hemos encontrado
 */
$cd = ($y->childNodes);

for ($i = 0; $i < $cd->length; $i++) {
    //si es un nodo elemento
    if ($cd->item($i)->nodeType == 1) {
        //cogemos el nombre del nodo y el valor
        echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
        echo($cd->item($i)->childNodes->item(0)->nodeValue);
        echo("<br>");
    }
}
?>
