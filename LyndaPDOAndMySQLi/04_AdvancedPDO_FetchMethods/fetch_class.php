<?php
try {
    require_once '../pdo_connect.php';
    require_once 'Car.php';
    // Set car id
    $car_id = 20;

    // Use prepared statement to get the car's details
    $sql = 'SELECT * FROM cars
            LEFT JOIN makes USING (make_id)
            WHERE car_id = ?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($car_id));

    // Create a car object using the database result - Se debe tener método mágico __Construct y __set
    //Seteamos el modo de PDO a FETCH_CLASS para que me cree un objeto de la clase y añadimos una segunda constante usando pipe
    //PDO::FETCH_PROPS_LATE para indicar que rellene los datos una vez hemos creado el objeto para asegurarmos que sobreecribimos
    // cualquier propiedad que haya por defecto en el constructor
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Car', array($car_id));
    $car = $stmt->fetch();

    echo $car;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}