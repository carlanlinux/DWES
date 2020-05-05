<?php
/*3) Arrays y formulario. Precio de productos
• Crea una página PHP que permita elegir una serie de artículos, inventados por ti, de una tienda online mediante checkbox.
• Cada checkbox permite seleccionar un artículo, en el que se indica su precio.
• Al pulsar el botón “Enviar” del formulario, se indicará el detalle de la compra, así como el
total de lo que hemos comprado.*/

$array_articulos= ['Ordenador'=>1600,
    'Pantalla' => 400,
    'Teclado' => 80,
    'Raton' => 70,
    'Dock' => 30
        ];
if (isset($_POST))
    //recogemos todos los datos de post en un array con una sóla línea.
    $datospost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
</head>
<body>
<span>
    <?php
    if (isset($datospost)){
        echo "Ha seleccionado los siguientes productos<br>";
        $totalcesta = 0;
        foreach ($datospost as $producto=>$precio){
            echo "{$producto} | {$precio} EUR <br>";
            $totalcesta += $precio;
        }
        echo "<hr>Productos totales: " . sizeof($datospost) . "<br>Importe total del pedido {$totalcesta}";
    }
    ?>
</span>
<h1>Selección de artículos</h1>
<form name="producto" action="" method="post">
    <?php foreach ($array_articulos as $producto => $precio) {
        echo "<input id='" . $producto . "' type='checkbox' name='" . $producto . "' value='" . $precio . "'>";
        echo "<label for={$producto}>{$producto} - Precio - {$precio} EUR</label><br>";
    }
    ?>
    <input type="submit">
</form>


<?php ?> <br>
</body>
</html>



