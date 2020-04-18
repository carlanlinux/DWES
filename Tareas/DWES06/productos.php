<?php
require_once('include/DB.php');
require_once('include/CestaCompra.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Recuperamos la cesta de la compra
$cesta = CestaCompra::carga_cesta();

// Comprobamos si se ha enviado el formulario de vaciar la cesta
if (isset($_POST['vaciar'])) {
    unset($_SESSION['cesta']);
    $cesta = new CestaCompra();
}

// Comprobamos si se quiere añadir un producto a la cesta
if (isset($_POST['enviar'])) {
    $cesta->nuevo_articulo($_POST['cod']);
    $cesta->guarda_cesta();
}



function creaFormularioProductos()
{
    $productos = DB::obtieneProductos();
    foreach ($productos as $p) {
        echo "<p><form id='" . $p->getcodigo() . "' action='productos.php' method='post'>";
        // Metemos ocultos los datos de los productos
        echo "<input type='hidden' name='cod' value='" . $p->getcodigo() . "'/>";
        //Añadimos una clase al botón que sirva para capturar el evento
        //Añadimos atributo  data-codigo para que cada botón tenga su propio código
        //Cambiamos el tipo a button en vez de submit y lo enviamos por AJAX
        echo "<input class='addToCart' type='button' name='enviar' value='Añadir' data-codigo='{$p->getcodigo()}'/>";
        echo $p->getnombrecorto() . ": ";
        echo $p->getPVP() . " euros.";
        echo "</form>";
        echo "</p>";
    }        
}

function muestraCestaCompra($cesta) {

    echo "<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>";
    echo "<hr />";
    $cesta->muestra();
    echo "<form id='vaciar' action='productos.php' method='post'>";
    echo "<input type='submit' name='vaciar' value='Vaciar Cesta' "; 
    if ($cesta->vacia()) echo "disabled='true'";
    echo "/></form>";
    echo "<form id='comprar' action='cesta.php' method='post'>";
    echo "<input type='submit' name='comprar' value='Comprar' ";
    if ($cesta->vacia()) echo "disabled='true'";
    echo "/></form>";  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 7 : Aplicaciones web dinámicas: PHP y Javascript -->
<!-- Tarea: Cesta de la compra con Xajax: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">


    <!-- insert the script to reference jQuery here -->
    <script type="text/javascript" src="jquery-3.0.0.js"></script>
    <script type="text/javascript">
        //Llamamos al objeto jQuery seleccionando el elemento document que ejecuta una función anónima cuando la página
        //está cargada.
      $("#document").ready(function () {
          //Seleccionamos los items que tienen clase addCesta, capturamos el evento click y cuando se hace un click,
          // ejecutamos el evento addToCart.
          $(".addToCart").on("click",addToCart);
      })

        //Función que se encargará de añadir en la cesta los productos
       function addToCart(evt) {
          //Seleccionamos el botón que ha hecho el click (this), usamos la función data para conseguir el valor del
           // atributo data que se ha rellenado al cargar los productos y lo metemos en la variable código
            let codigo = $(this).data('codigo');
            //Lo mostramos por consola a modo debug.
            //console.log(codigo);

           $.ajax({
               url: "/include/fcesta.php",
               data: codigo,
               method: "POST",
               success: successfnt,
               dataType : "text"
           });

            function successfnt() {
                var productID = this;
                console.log(productID);
            }
       }

    </script>

</head>

<body class="pagproductos">

<div id="contenedor">
  <div id="encabezado">
    <h1>Listado de productos</h1>
  </div>
  <div id="cesta">
<?php muestraCestaCompra($cesta); ?>
  </div>
  <div id="productos">
<?php creaFormularioProductos(); ?>
  </div>
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>'/>
    </form>        
  </div>
</div>
</body>
</html>
