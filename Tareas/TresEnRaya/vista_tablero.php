<?php
//si no tengo sesión manda de nuevo a index
if (!isset($_SESSION['username'])) {
    header("Location: " . "index.php");
    exit;
}
//Buscamos el objeto usuario
$usuario = buscar_usuario($_SESSION['username']);
//Creamos una variable para luego guardar la partida
$partida = null;
$victoria = 0;
$mensaje = "";

//Comprobamos si nos viene algo por post y si está el cerrar sesión, entonces destruimos la sesión y mandamos index
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: " . "index.php");
    exit;
}
//Comprobamos que nos viene por post y que está el valor nueva partida, entonces la partida la ponemos en null.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_partida'])) {
    $usuario->partida = NULL;
}

//Comprobamos si el usuario tiene alguna partida comprobando la propiedad partida del objeto
if ($usuario->partida == null) {
    //Creamos la partida usando la partida del usuario mandando el usuario
    $partida = crear_partida($usuario);
    $usuario->partida = $partida->partida;
    $usuario->insertar_partida();
} else {
    //Buscamos la partida para pintar el tablero
    $partida = buscar_partida($usuario);
    //Comprobamos si el usuario ha ganado o no y pintamos los mensajes para el caso que la partida esté acabada
    $victoria = $partida->comprobar_victoria();
    if ($victoria !=0 ) {
        $mensaje = "<div><p>Usted ha jugado: {$usuario->partidas_totales}</p>";
        $mensaje .= "<p>Usted ha jugado: {$usuario->partidas_ganadas}</p></div>";
    }
    //Si la partida esta terminada creamos una nueva
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['posicion_inicial']) && $_POST['posicion_inicial'] != "") {
    //Guardamos los datos
    $posicion_inicial = filter_var($_POST["posicion_inicial"], FILTER_SANITIZE_STRING);
    //Si no vienen datos en la final le damos null ( PHP7)
    $posicion_final = filter_var($_POST["posicion_final"], FILTER_SANITIZE_STRING) ?? NULL;

    //Si nos viene null igualamos la posición inicial a la final ya que el cambio de ficha se lleva a acabo con la final
    //Se presume que aún no había 3 fichas en el tablero.
    if ($posicion_final == NULL) {
        $posicion_final = $posicion_inicial;
    }


    $partida->jugar_jugador($posicion_inicial, $posicion_final);
    $victoria = $partida->comprobar_victoria();

    if ($victoria == 1) {
        $partida->terminada = 1;
        $usuario->partidas_ganadas += 1;
        $usuario->partidas_totales += 1;
        actualizar_usuario($usuario);
        actualizar_partida($partida);
        $mensaje = "<div><p>Usted ha jugado: {$usuario->partidas_totales}</p>";
        $mensaje .= "<p>Usted ha jugado: {$usuario->partidas_ganadas}</p></div>";

    } else {
        $partida->jugar_maquina();
        $victoria = $partida->comprobar_victoria();
        if ($victoria == 2) {
            $partida->terminada = 1;
            $usuario->partidas_totales += 1;
            actualizar_usuario($usuario);
            actualizar_partida($partida);

        }
    }
    actualizar_partida($partida);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Juego de las tres en raya</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
        window.onload = function () {
            listeners();
        };

        let celdas_jugador = document.getElementsByClassName("jugador");
        let celdas_vacias = document.getElementsByClassName("vacio");
        let celdas_seleccionadas = document.getElementsByClassName("selected");

        var posicion_inicial;
        var posicion_final;


        function listeners() {
            {
                for (let i = 0; i < celdas_jugador.length; i++) {
                    celdas_jugador[i].addEventListener("click", getid, false);
                }
            }
            {
                for (let j = 0; j < celdas_vacias.length; j++) {
                    celdas_vacias[j].addEventListener("click", getid, false);
                }
            }

            let reset = document.getElementById("reset").addEventListener("click", borrarDatos, false);
        }

        function getid() {
            //Si tenemos dos o más casillas seleccionadas no debe dejar seleccionar más hasta dar a botón reset.
            if (celdas_seleccionadas.length <= 2) {

                console.log("listener");
                posicion_inicial = document.getElementById("posicion_inical");
                posicion_final = document.getElementById("posicion_final");

                if ((posicion_inicial.value) === "") {
                    //Comprobamos que tenemos 3 celdas de jugador o más y que además tiene la clase de jugador para que
                    // nos deje seleccionarla
                    if (celdas_jugador.length >= 3 && this.getAttribute("class") === "jugador") {
                        posicion_inicial.value = this.parentElement.getAttribute("id");
                        this.parentElement.setAttribute("class", "selected");

                    }
                    //Si tenemos menos de 3 fichas, nos deja seleccionar y ponemos fichita y se colorea
                    if (celdas_jugador.length < 3) {
                        posicion_inicial.value = this.parentElement.getAttribute("id");
                        this.parentElement.setAttribute("class", "selected");
                        //Borramos imagen actual y ponemos ficha nueva
                        this.setAttribute("src", "circle-Jug.png");
                    }

                } else {
                    //Si tenemos menos de 3 fichas en el tablero salimos del if y no dejamos seleccionar otra casilla
                    //y ponemos fichita y se colorea
                    if (celdas_jugador.length < 3) return;
                    if (posicion_final.value === "") {
                        console.log("tine cosas");
                        posicion_final.value = this.parentElement.getAttribute("id");
                        this.parentElement.setAttribute("class", "selected");
                        //Borramos imagen actual y ponemos ficha nueva
                        this.setAttribute("src", "circle-Jug.png");
                        //Borramos la fichita actual y la dejamos seleccionada para recordar origen.
                        let borrarCirculito = posicion_inicial.value;
                        document.getElementById(borrarCirculito).firstElementChild.setAttribute("src", "vacio.png");

                    }
                }
            }
        }

        function borrarDatos() {
            posicion_inicial.value = "";
            posicion_final.value = "";
            for (let i = 0; i < celdas_seleccionadas.length; i++) {
                celdas_seleccionadas[i].removeAttribute("class");
            }
        }

    </script>
</head>
<body>
<h1>Partida de <?php echo $usuario->nombre_usuario ?></h1>
<?php if ($victoria == 1) {
    echo "Enhorabuena ha ganado!";
    echo $mensaje;
}?>
<?php if ($victoria == 2) {
echo "Lo siento ha perdido!";
    echo $mensaje;
} ?>
<div id="container">
    <?php if ($victoria == 0) echo $partida->crearTablero();
          if ($victoria == 1) echo "<img class='finpartida' src='congrats.png'>";
          if ($victoria == 2) echo "<img class='finpartida' src='gameover.png'>";
    ?>
</div>
<form name="enviar_posicion" action="" method="post">
<?php if ($victoria == 0 ) {?>

    <input type="hidden" id="posicion_inical" name="posicion_inicial" value="">
    <input type="hidden" id="posicion_final" name="posicion_final" value="">
    <input type="submit">
</form>
<button id="reset">Resetear movimientos</button>
<?php
} else {
    ?>
    <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    <input type="submit" name="nueva_partida" value="Nueva Partida">
    </form>
<?php
}
?>
</body>
</html>
