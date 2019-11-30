<?php
    //1. Crear una conexión --> La creamos al principio de la página y Seleccionar una base de datos
    $link = mysqli_connect("localhost:8889", "root", "root", "widgetcoorp");
     //probamos que está funcionando y si no que nos devuelva el error. Usamos die para parar todo lo que estamos haciendo
    if (!$link) die("Database connection failed" . mysqli_error());

    /* 2. Seleccionar una base de datos --> Versiones antiguas de MySQL
    $db_select = mysql_select_db("widget_copr",$connection);
    if (!$db_select){
        die("Database selection failed" . mysqli_error());
    }
    */

?> <br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Connections</title>
</head>
<body>
Para conectarnos con PHP a una base de datos necesitamos llevar a cabo 5 pasos
1. Crear una conexión --> La creamos al principio de la página  y seleccionar una base de datos
2. Realizar una query a las base de datos
3. Usar los valores que nos devuelve la query (si hay)
4. Cerrar la conexión.
<?php
    //2. Realizar una query a las base de datos y comprobar que tenemos datos
    $result = mysqli_query($link, 'SELECT * FROM subjects');
    if (!$result) die("No se ha podido extraer datos " . mysqli_error());

    //3. Usar los valores que nos devuelve la query (si hay)
    //Nos devuelve array asociativo, por lo que podemos usar los nombres a la hora de llamar a los datos del array para
    //pintarlos.
    while ($row = mysqli_fetch_array($result)){
        echo $row["menu_name"] . " " . $row["position"] . "<br>";
    }


?>

</body>
</html>
<?php
//4. Cerrar la conexión.
mysqli_close($link);
?> <br>


