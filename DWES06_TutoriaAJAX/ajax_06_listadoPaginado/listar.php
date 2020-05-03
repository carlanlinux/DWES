<?php
define("ELEM_PAGINA", 5);
$servidor = "localhost";
$usuario = "root";
$clave = "";
$sql = "";

$html = "";
/******************* método mysql *******************************/
$conn = new mysqli($servidor, $usuario, $clave, "myDB");
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error) . "<br/>";
}
$conn->set_charset("utf8");
$html = "<h3>Listado paginado</h3>";
$html .= "<br/><hr><br/>";
/*
 * Si me ha llegado alguna página la guardo como página actual. Si no
 * significa que estoy en la primera página
 */
if (isset($_GET['pagina'])) {
    $nPagina = $_GET['pagina'];
} else {
    $nPagina = 1;
}
//calculo cuántas páginas va a haber en total
$sql = "SELECT COUNT(*) AS total FROM ALUMNOS";
$result = $conn->query($sql) or die(mysqli_error($conn));
$fila = $result->fetch_assoc();
$numRegistros = $fila['total'];
/*si el módulo no es 0 hay un número impar de páginas y el total debe
 * ser una página más de la que da la divison, si tengo 16 registros y muestro de 5 en 5, tengo que mostrar 4
 * páginas en vez de 3, por eso redondeo o hacia arriba o hacia abajo en función del resto
 */
if ($numRegistros % ELEM_PAGINA)
    $totalPaginas = ceil($numRegistros / ELEM_PAGINA);
else
    $totalPaginas = floor($numRegistros / ELEM_PAGINA);

/*cojo los elementos correspondientes de la página en función del número
 * de página actual. Es decir si estoy en la página 1 voy a buscar
 * 5 registros (ELEM_PAGINA) desde el registro $nPagina -1*ELEM_PAGINA
 * (1-1)*5 =0. Me
 * devolvería del 0 al 4
 * Si estoy en la página 2 voy a buscar 5 registros desde el
 * ($nPagina-1)*5, es decir (2-1)*5 = 5. Me devuelve desde el registro
 * 5 al 9
 */
$sql = "select * from alumnos limit " . ($nPagina - 1) * ELEM_PAGINA . "," . ELEM_PAGINA . ";";
$result = $conn->query($sql);
/* En una tabla HTML voy metiendo los 5 registros que me han llegado */
if ($result->num_rows > 0) {
    $html .= "<section><table>";
    //recupera cada fila como un array asociativo
    $html .= "<tr><th>CÓDIGO</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELÉFONO</th><th>EMAIL</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .= "<td>" . $row["CODIGO"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["APELLIDOS"] . "</td><td>" .
            $row["TELEFONO"] . "</td><td>" . $row["CORREO"] . "</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    $html .= "<br/><br/>";
    /* AQUÍ SE CREA LA PAGINACIÓN utilizando las clases que Bootstrap
     * tiene para ello */
    /*
     * En cada elemento de la lista que se crea con los números de
     * páginas se crea un enlace en el que al hacer clic se invoca a
     * la función JavaScript que hace las peticiones AJAX.
     * Como parámetro se le pasa el número de página
     */
    $html .= "<nav><ul class='pagination'>";
    // si es la primera página el enlace no debe estar activo
    /* al poner en el enlace "return false" evitamos que el navegador
     * intente seguir el enlace.
     * Además incluimos en el código que se ejecute la función listarElementos cuando
     * se pulse el emlace pasándole como parámetro el número de página que debe mostrar
     */
    if ($nPagina == 1)
        $html .= "<li class='page-item disabled'><a class='page-link' href='#'onclick='listarElementos(1);return false;'>&laquo;</a></li>";
    else
        $html .= "<li class='page-item'><a class='page-link' href='#'onclick='listarElementos(1);return false;'>&laquo;</a></li>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        //si coincide es la página actual y debe aparecer resaltada con la clase active.
        if ($nPagina == $i) {
            $html .= "<li class='page-item active'><a class='page-link' href='#' onclick='listarElementos(" . $i . ");return false;'>" . $i . "</a></li>";
        } else {
            $html .= "<li class='page-item'><a class='page-link' href='#' onclick='listarElementos(" . $i . ");return false;'>" . $i . "</a></li>";
        }

    }
    if ($nPagina == $totalPaginas) {
        /* Si es la última página el enlace >> debe aparecer deshabiliado
         */
        $html .= "<li class='page-item disabled'><a class='page-link' href='#' onclick='listarElementos(" . $totalPaginas . ");return false;'>&raquo</a></li>";
    } else {
        $html .= "<li class='page-item'><a class='page-link' href='#' onclick='listarElementos(" . $totalPaginas . ");return false;'>&raquo</a></li>";
    }
    $html .= "</ul></nav></section>";
} else {
    $html .= "No hay registros";
}
$html .= "<br/><hr><br/>";
$conn->close();
/* devolvemos la respuesta*/
echo $html;
?>
