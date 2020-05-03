<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script type="text/javascript">
        function traeDatos() {
            //creo instancia del objeto XMLHttpRequest
            objAJAX = new XMLHttpRequest();
            var capa = document.getElementById("salidaIP");
            capa.innerHTML = "Cargando...";
            //mediante POST me quiero conectar de forma asíncrona (atributo true) al script ejAJAX.php
            objAJAX.open("POST", "ejAJAX.php", true);
            //modifico la cabacera indicando que el content-type va a ser una url
            objAJAX.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //asigna la función anónima al evento onreadystatechange
            objAJAX.onreadystatechange = function () {
                //si se ha recibido la respuesta completa
                if (objAJAX.readyState == 4) {
                    /* asigno la respuesta, que me ha llegado en forma de cadena 
                     * de caracteres a un elemento de mi página
                    */
                    capa.innerHTML = objAJAX.responseText;
                }
            }
            //envío la petición.
            objAJAX.send();
        }
    </script>
</head>
<body>
<div id="demo" style="width:600px;">
    <div id="salidaIP">IP del servidor...</div>
    <br>
    <div>
        <button type="button" onclick="traeDatos()">
            Dame IP
        </button>
    </div>
</div>
</body>
</html>
