<?php
//En vez de usar un soap server creamos un objeto soap cliente

$options = array('uri' => 'http://localhost/DWES/DWES_TutoriaServiciosWeb/',
    'location' => 'http://localhost:8888/DWES/DWES_TutoriaServiciosWeb/cliente.php');

try {
    $cliente = new SoapClient(null, $options);
    $response = $cliente->eightBall();
    echo $response;

} catch (SoapFault $e) {
    echo "ERROR" . $e->getMessage();
}