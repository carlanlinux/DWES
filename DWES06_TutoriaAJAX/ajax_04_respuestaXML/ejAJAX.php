<?php
header("Content-type:text/xml");
//se envía un encabezado al cliente indicando que la respuesta es de tipo xml
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
/*generamos la respuesta en formato XML, vamos a enviar un nombre y una edad*/
$xml = "<datos><nombre>Juan</nombre><edad>33</edad></datos>";
echo $xml;
?>
