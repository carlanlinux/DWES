<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
<h1>Calculadora de edad</h1>
<?php
    if (isset($_POST['fecha_nacimiento'])){
        //Creamos dos obejtos fecha uno con la de ahora y otro con la de fecha actual
        $fecha_nacimiento = new DateTime($_POST['fecha_nacimiento']);
        $fecha_actual = new DateTime("now");
        $msj = "";

        if ($fecha_actual < $fecha_nacimiento) {
            $msj = "Todavía no has nacido";
        } else{
            //Hacemos la resta de las fechas dando formato pidiendo que nos saque los años (días sería d y meses m)
            $anos = $fecha_actual->format("Y") - $fecha_nacimiento->format("Y");
            $msj = "Tienes " . $anos . " años";
            echo "<h3> ". $msj ." </h3>";
        }

    }
?>
<form action="" method="post">
    <input type="number">
    <input type="date" name="fecha_nacimiento" required>
    <input type="submit" value="Enviar">
</form>

<?php ?> <br>
</body>
</html>



