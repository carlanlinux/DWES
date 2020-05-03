<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
          crossorigin="anonymous">
    <style type="text/css">
        table {
            margin: auto;
            width: 100%;
        }

        section {
            width: 80%;
            margin: auto;
        }

        ul {
            width: 50%;
            margin: auto;
        }
    </style>
    <script type="text/javascript">
        function listarElementos(pagina) {
            var objAJAX = new XMLHttpRequest();
            /*utilizamos el método GET y pasamos al script como parámetro
             * el núemro de página que la función ha recibido
             */
            objAJAX.open("GET", "listar.php?pagina=" + pagina, true);
            objAJAX.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            objAJAX.onreadystatechange = function () {
                if (objAJAX.readyState == 4) {
                    /* cargamos la respuesta recibida en el div */
                    document.getElementById("datos").innerHTML = objAJAX.responseText;
                    ;
                }
            }
            objAJAX.send();

        }

    </script>
</head>
<body>
<div id="datos">
    <?php include_once 'listar.php'; ?>
</div>
</body>
</html>
