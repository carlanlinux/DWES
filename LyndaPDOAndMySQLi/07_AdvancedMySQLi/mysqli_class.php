<?php
try {
    require_once '../mysqli_connect.php';
    require_once 'Car.php';
    // Set car id
    $car_id = 25;

    // Get the car's details
    $sql = "SELECT * FROM cars
            LEFT JOIN makes USING (make_id)
            WHERE car_id = $car_id";

    $result = $db->query($sql);
    //Para poder instanciar un objeto necesitaos devolverlo como un resultado usando fetch, object
    //Primer argumento nombre de la clase, segundo argumento un array de lo que se quiera pasar al constructor
    //Mysql usa los valores por defecto del constructor y no se puede hacer nada salvo cambiar el constructor de la clase, con PDO sí
    $car = $result->fetch_object('Car', array($car_id));
    echo $car;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}