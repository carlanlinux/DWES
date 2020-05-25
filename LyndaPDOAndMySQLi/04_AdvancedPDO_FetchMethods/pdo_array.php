<?php
try {
    require_once '../pdo_connect.php';
    $sql = 'SELECT name, meaning FROM names';
    $result = $db->query($sql);
    //Los resultados se guardan todos en un array por defecto usando fetchALL
    //Se puede incluir constante PDO:FETCH_KEY_PAIR para devolver un arary asociativo
    $names = $result->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (Exception $e) {
    $error = $e->getMessage();
}

echo "<pre>";
echo print_r($names);
echo "</pre>";
