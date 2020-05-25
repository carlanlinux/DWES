<?php
try {
    require_once '../pdo_connect.php';
    require_once 'Car.php';

    // Create an instance of Car object
    $car_id = 10;
    $car = new Car($car_id);

    // Use prepared statement to get the car's details
    $sql = 'SELECT * FROM cars
        LEFT JOIN makes USING (make_id)
        WHERE car_id = ?';
    //Creamos una consulta preparada
    $stmt = $db->prepare($sql);
    //Usamos execute y pasamos un array que contiene el car_id (por lo que buscamos en la base de datos
    $stmt->execute(array($car_id));
    //Seteamos el modo que va a hacer el fetch el objeto statement y usamos la constante PDO::FETCH_INTO y le pasamos el
    // objeto donde queremos que se rellenen los datos con lo de la base de datos.
    //Para que esto funcione, la clase del objeto debe tener los métodos mágicos set implementados
    $stmt->setFetchMode(PDO::FETCH_INTO, $car);
    //Hacemos el fetch para que coga los datos y los meta en el objeto que le pasamos.
    $stmt->fetch();
    // Display the car object
    echo $car;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}