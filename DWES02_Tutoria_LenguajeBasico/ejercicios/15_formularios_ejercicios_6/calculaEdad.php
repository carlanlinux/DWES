<?php
function CalculaEdad ($fecha)
{
    /* la función list asigna una lista de variables en una sola operación
     * No funciona con arrays asociativos.
     * en este ejemplo carga en una variable distinta cada parte de la fecha
     *
     * Separa el string con la fecha que le llega como parámetro en tres
     * variables, $Y, $m y $d que contendrán el año, mes y día (los cogemos
     * con 2 dígitos, para las comparaciones)
     *
     * Comprueba si el mes junto con el día actual  es menor que el que nos
     * ha llegado como fecha de nacimiento, resta al año actual el año de
     * nacimiento menos 12 porque todavía no ha cumplido los años, si no
     * solo resta el año actual del año de nacimento.
     */
    list($Y, $m, $d) = explode("-", $fecha);
    echo "date(md): " . date("md") . "<br/>";
    echo "\$m: " . $m . ", \$d: " . $d . "<br/>";
    echo "date('Y'): " . date("Y") . ", Y: $Y <br/>";
    return (date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y);
}

// la fecha llega como string al igual que todos los campos que llegan en un
// array asociativo
if (isset($_REQUEST["fechaNac"])) {
    $hoy = date("Y-m-d");
    $fecha = $_REQUEST["fechaNac"];
    if ($fecha < $hoy) {
        $edad = CalculaEdad($fecha);
    } else {
        $error = "La fecha de nacimiento ha de ser anterior a la fecha actual";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Fecha de nacimiento:
    <input type="date" name="fechaNac">
    <br>
    <input type="submit" value="Enviar">
    <?php
    if (empty($error)) {
        if (isset($edad)) {
            echo "<p>La edad que tienes es: " . $edad . "</p>";
        }
    } else
        echo "<p>" . $error . "</p>";


    ?>
</form>
<?php
// put your code here
?>
</body>
</html>
