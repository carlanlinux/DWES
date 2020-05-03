<?php
require_once "funcionesSoap.class.php";
$funciones = new FuncionesSoap();
echo $funciones->getPVP("3DSNG");
echo "<br>";
echo $funciones->getStock("3DSNG", 1);
echo "<br>";
print_r($funciones->getFamilias());
echo "<br>";
print_r($funciones->getProductosFamilias("MEMFLA"));
echo "<br>";