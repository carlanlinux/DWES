<?php
//Inicializamos la sesión
session_start();

//Si han pulsado el botón borrar preferencia borramos los datos de la sesión
if (isset($_POST['BorrarPreferencias'])){
    session_unset();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DWES04 - Tarea - Carlos Miguel de Lucas Ballesteros</title>
    <link href="tarea.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="BorarPreferencias" action="" method="post">
    <fieldset>
        <legend>Preferencias</legend>

        <?php
        //Si existen las preferencias guardadas en la sesión
        if (!isset($_SESSION['preferencias'])) {
            echo "<span class='mensaje'>Información de la sesión eliminada.</span><br>";
        }
        ?>
        <label>Idioma:
            <?php
            //Si existen las preferencias de la sesión mostramos los datos, en este caso del idioma
            if (isset($_SESSION['preferencias'])) {
                $idioma = $_SESSION['preferencias']['idioma'];
                echo $idioma;
            }
            ?>
        </label><br>
        <label>Perfil público:
            <?php
            //Si existen las preferencias de la sesión mostramos los datos, en este caso del perfilPublico
            if (isset($_SESSION['preferencias'])) {
                $perfilPublico = $_SESSION['preferencias']['perfilPublico'];
                echo $perfilPublico;
            }
            ?>
        </label><br>
        <label>Zona horaria:
            <?php
            //Si existen las preferencias de la sesión mostramos los datos, en este caso de la zonaHoraria
            if (isset($_SESSION['preferencias'])) {
                $zonaHoraria = $_SESSION['preferencias']['zonaHoraria'];
                echo $zonaHoraria;
            }
            ?>
        </label><br>
            <!-- Ponemos el botón para que borre las preferencias -->
        <input type="submit" name="BorrarPreferencias" value="Borrar Preferencias"><br>
        <a href="preferencias.php">Establecer preferencias</a>
    </fieldset>
</form>

<br>
</body>
</html>



