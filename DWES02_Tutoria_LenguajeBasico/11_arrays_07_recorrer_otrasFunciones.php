<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
echo "<h2>Recorrer un array usando otras funciones</h2>";
$semana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
echo "-> " . current($semana) . "<br />"; // Devuelve: "Lunes"
echo "-> " . next($semana) . "<br />";    // Devuelve: "Martes"
echo "-> " . current($semana) . "<br />"; // Devuelve: "Martes"
echo "-> " . prev($semana) . "<br />";    // Devuelve: "Lunes"
echo "-> " . end($semana) . "<br />";     // Devuelve: "Domingo"
echo "-> " . current($semana) . "<br />"; // Devuelve: "Domingo"
echo "-> " . key($semana) . "<br />"; // Devuelve: 6
echo "<hr><br/>";

echo "<h2>Array multidimensional indexado y asociativo</h2>";
$agenda = array(array("Nombre" => "Jorge",
    "Dirección" => "Madrid",
    "Telefono" => 999999999,
    "Correo" => "jorge@correo.com"),
    array("Nombre" => "Julia",
        "Dirección" => "Valencia",
        "Telefono" => 235456987,
        "Correo" => "julia@correo.com"),
    array("Nombre" => "Lucas",
        "Dirección" => "Orense",
        "Telefono" => 222222222,
        "Correo" => "lucas@correo.com"),
    array("Nombre" => "Susana",
        "Dirección" => "Ávila",
        "Telefono" => 987546321,
        "Correo" => "susana@correo.com"),
);

//estas funciones necesitan arrays como parámetros
foreach ($agenda as $contacto) {
    echo "bucle 1 contacto- current = " . current($contacto) . "<br/>";
    echo "bucle 1 contacto - key = " . key($contacto) . "<br/>";
    echo "bucle 1 contacto - next= " . next($contacto) . "<br/>";
    echo "bucle 1 contacto - key = " . key($contacto) . "<br/>";
    echo "bucle 1 contacto - end= " . end($contacto) . "<br/>";
    echo "bucle 1 contacto - key = " . key($contacto) . "<br/>";
}

echo "<hr><br/>";
?>
</body>
</html>



