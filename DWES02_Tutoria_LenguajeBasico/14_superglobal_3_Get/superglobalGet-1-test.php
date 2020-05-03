<?php
/*
 * Recoge lo que ha llegado mediente el método GET usando la variable
 * superglobal $_GET cuyo contenido es un array asociativo con todas las
 * variables que se han pasado en la URL. La calve de cada elemento del
 * array asociativo es el nombre de la variable, y su contenido será el
 * valor pasado en el array.
 */
echo "Estudia " . $_GET['asig'] . " en " . $_GET['donde'];
?>