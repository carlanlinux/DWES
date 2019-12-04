<?php require_once ("includes/connection.php") ?>
<?php
//Sólo queremos cargarlas una vez en el caso que se carguen en alún otro archivo
require_once("includes/functions.php") ?>
<?php include("includes/header.php") ?>

<table id="structure">
    <tr>
        <td id="navigation">
            <?php
            //Hacemos una query a la base de datos para sacar los valores del menú
            $result = mysqli_query($connection, "select * from subjects" ); {
                if(!$result) {
                    die("Database query failed" . mysqli_error());
                }
            }

            //Usamos el dato que nos deuvelve
            while ($row = mysqli_fetch_array($result)) {
                echo $row["menu_name"] . " " . $row["position"] . "<br>";
            }

            ?>
        </td>
        <td id="page">
            <h2>Content area</h2>

        </td>
    </tr>
</table>

<?php require("includes/footer.php") ?>

