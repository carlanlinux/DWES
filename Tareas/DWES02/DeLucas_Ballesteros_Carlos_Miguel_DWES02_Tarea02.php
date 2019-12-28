<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplicación Agenda - Tarea DEWS02</title>
</head>
<body>
        <h1>Datos de la agenda</h1>
        <?php

        //Chequeamos que el campo hidden del formulario tiene información con nombre agendaoculta
        if (!empty($_POST['agendaoculta']))
        {
            //Si tiene información le pasamos la info al array agenda
            $agenda = $_POST['agendaoculta'];

        } else {
            //si no tiene información creamos un nuevo array llamado agenda
            $agenda = array();
        }

        //Si el campo teléofno no está vacío asignamos el número del teléfono al nombre.
        // Si no existe ya nombre-telefono se añade y si existe, se reemplazará.

        //Comprobamos que se haya clicado en el botón para que haga esto si no... lo ignora
        if (isset($_POST['btnForm'])) {

        if (!empty($_POST['telefono']))
            $agenda[$_POST['nombre']] = $_POST['telefono'];
        else
            //Si no hay teléfono se borra el nombre del array.
            unset ($agenda[$_POST['nombre']]);
        }

        //Si el array no está vacío, se muestran los datos de la agenda en una tabla.
        if(!empty($agenda)){

            echo "<table border='2' cellpadding='2' cellspacing=0> <th align='center'>Nombre</th> 
            <th align='center'>Teléfono</th>";

            foreach ($agenda as $nombre => $telefono) {
                echo "<tr align='center'><td>$nombre</td><td>$telefono</td></tr>";
            }
            echo "</table>";
        }
        ?>

        <!-- Creamos un formulario POST enviando los datos a la misma página con las comillas para que se introduzcan
        los datos de nombre y teléfono, nombre text y requerido y  telefono formato número para facilitar la validación
        de datos -->
        <form action="" method="post">

            <p>Nombre: <input type="text" name="nombre" required/></p>
            <p>Teléfono: <input type="number" name="telefono"/></p>
            <input type="submit" name="btnForm"/>

            <!-- Recorremos el array de la agenda y lo metemos dentro del campo oculto siendo un array de nombre agendacoulta
            para recuperarlo posteeriormente -->
            <?php foreach ($agenda as $nombre => $telefono) {

                echo "<input type = \"hidden\" name = \"agendaoculta[{$nombre}]\" value = \"$telefono\" />";
            }
   ?>
        </form>
     </body>
</html>
