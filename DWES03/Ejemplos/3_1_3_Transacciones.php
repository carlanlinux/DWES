<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Conexión base de datos</title>
</head>
<body>

<?php
    //Utilizando constructor de clase
    @ $dwes = new mysqli("localhost", "root", "root", "dwes");

    // Por defecto cada consulta individual se incluye dentro de su propia transacción
    //con autocomit deshabilitamos el modo transaccional automático esto hace que haya que hacer commits cada vez que
    //Terminemos una operación para confirmar los cambios.
    $dwes -> autocommit(false);
    $dwes -> query("DELETE from stock where unidades = 0"); //Inciamos una transacción
    $dwes -> query('update stock set unidades = 3 where producto = "STYLUSSX515W"');
    $dwes -> commit(); //Confirmar cambios
    if($dwes) echo "Los cambios se han realizado con éxito";


    $dwes -> close();
    ?>
<?php ?> <br>
</body>
</html>



