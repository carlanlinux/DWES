<?php
//Inicializamos la sesión
session_start();

//Si se ha hecho click en enviar las preferencias asignamos los datos a la variable preferencias
if (isset($_POST['Preferencias'])) {
    //Declaramos la variable que vamos a utilizar para filtrar los datos que nos vienen por post
    $args = array(
            'idioma' => FILTER_DEFAULT,
            'perfilPublico' => FILTER_DEFAULT,
            'zonaHoraria' => FILTER_DEFAULT,
    );
    //Asignamos los datos que nos interesan de POST a la variable preferencias
    $preferencias = filter_input_array(INPUT_POST,$args);

    //Asignamos el array con lo que recibimos en post a la sesión
    $_SESSION['preferencias']=$preferencias;

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
<form name="preferencias" action="" method="post">

        <fieldset>
            <legend>Preferencias:</legend>
            <!-- Si existe la variable preferencias entonces mostramos el mensaje que querrá decir que se acaban
             de guardar los datos -->
            <?php
            if (isset($preferencias)){
                echo "<span class='mensaje'>Información guardada en la sesión</span>";
            }
            ?>
        <label for="idoma">Idioma</label><br>
        <select name="idioma">
            <?php
            //si existe el array de preferencias en la sesión
            if (isset($_SESSION['preferencias'])){
                //Buscamos cuáles son estas preferencias y en función de eso mostramos la seleccionada por defecto
                //para cada caso
                switch ($_SESSION['preferencias']['idioma']){
                    case "Español":
                        echo "<option value='Español' selected='true'>Español</option>";
                        echo "<option value=\"Inglés\">Inglés</option>";
                        break;
                    case "Inglés":
                        echo "<option value='Inglés' selected='true'>Inglés</option>";
                        echo "<option value=\"Español\">Español</option>";
                        break;
                }
            }
            //En el caso que no existan las preferencias pintamos todos option sin seleccionar.
            else {
                echo "<option value=\"Español\">Español</option>";
                echo "<option value=\"Inglés\">Inglés</option>";
            }
            ?>

        </select>
        <label for="perfil">Perfil público:</label><br>
        <select name="perfilPublico">
            <?php
            //Mismo mecanismo que el anterior pero con los datos de perfilPublico
            if (isset($_SESSION['preferencias'])){
                switch ($_SESSION['preferencias']['perfilPublico']){
                    case "Sí":
                        echo "<option value=\"Sí\" selected='true'>Sí</option>";
                        echo "<option value=\"No\">No</option>";
                        break;
                    case "No":
                            echo "<option value='No' selected='true'>No</option>";
                            echo " <option value=\"Sí\">Sí</option>";
                            break;
                }
            } else{
                echo " <option value=\"Sí\">Sí</option>";
                echo "<option value=\"No\">No</option>";
            }
            ?>
        </select>
        <label for="zonaHoraria">Zona horaria:</label>
        <select name="zonaHoraria">
            <?php
            //Mismo mecanismo que el anterior pero con los datos de ZonaHoraria
                if (isset($_SESSION['preferencias'])){
                    switch ($_SESSION['preferencias']['zonaHoraria']){
                        case "GMT-1":
                            echo "<option value=\"GMT-1\" selected='true'>GMT-1</option>";
                            echo "<option value=\"GMT-2\">GMT-2</option>";
                            echo "<option value=\"GMT+0\">GMT+0</option>";
                            echo "<option value=\"GMT+1\">GMT-2</option>";
                            echo "<option value=\"GMT+2\">GMT+2</option>";
                            break;
                        case "GMT-2":
                            echo "<option value=\"GMT-2\" selected='true'>GMT-2</option>";
                            echo "<option value=\"GMT-1\">GMT-1</option>";
                            echo "<option value=\"GMT+0\">GMT+0</option>";
                            echo "<option value=\"GMT+1\">GMT-2</option>";
                            echo "<option value=\"GMT+2\">GMT+2</option>";
                            break;
                        case "GMT+0":
                            echo "<option value=\"GMT+0\" selected='true'>GMT+0</option>";
                            echo "<option value=\"GMT-1\">GMT-1</option>";
                            echo "<option value=\"GMT-2\">GMT-2</option>";
                            echo "<option value=\"GMT+1\">GMT-2</option>";
                            echo "<option value=\"GMT+2\">GMT+2</option>";
                            break;
                        case "GMT+1":
                            echo "<option value=\"GMT+1\" selected='true'>GMT+1</option>";
                            echo "<option value=\"GMT-1\">GMT-1</option>";
                            echo "<option value=\"GMT-2\">GMT-2</option>";
                            echo "<option value=\"GMT+0\">GMT+0</option>";
                            echo "<option value=\"GMT+2\">GMT+2</option>";
                            break;
                        case "GMT+2":
                            echo "<option value=\"GMT+2\" selected='true'>GMT+2</option>";
                            echo "<option value=\"GMT-1\">GMT-1</option>";
                            echo "<option value=\"GMT-2\">GMT-2</option>";
                            echo "<option value=\"GMT+0\">GMT+0</option>";
                            echo "<option value=\"GMT+1\">GMT-2</option>";
                            break;
                    }
                } else{
                    echo "<option value=\"GMT-1\">GMT-1</option>";
                    echo "<option value=\"GMT-2\">GMT-2</option>";
                    echo "<option value=\"GMT+0\">GMT+0</option>";
                    echo "<option value=\"GMT+1\">GMT-2</option>";
                    echo "<option value=\"GMT+2\">GMT+2</option>";
                }
            ?>

        </select>
            <!-- Ponemos el botón de preferencias que nos servirá para enviar la info del formulario -->
            <input type="submit" name="Preferencias" value="Establecer Preferencias"><br>
            <a href="mostrar.php">Mostrar preferencias</a>
    </fieldset>

</form>

 <br>
</body>
</html>



