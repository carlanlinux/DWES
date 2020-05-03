<?php
/*
 * Los datos que no son de tipo string, como por ejemplo lod arrays no se pueden 
 * guardar directamente en una cookie.
 * Hay que usar la función "serialize()" que convierte los datos en texto, y
 * la función "unserialize()" para convertirlos a su dato original 
 */
$tareas = array();
//lectura del array si existe la cookie correspondiente
if (isset($_COOKIE["tareas"])) {
    $tareas = unserialize($_COOKIE["tareas"]);
}
//comprobar si se ha enviado una nueva tarea
if (isset($_GET["tarea"]) && strlen(trim($_GET["tarea"])) > 0) {
    //añadir nueva tarea
    array_push($tareas, $_GET["tarea"]);
}
//comprobar si se ha enviado para borrar un índice de tarea
if (isset($_GET["borrar"])) {
    //borrar tarea
    $idTarea = $_GET["borrar"];
    array_splice($tareas, $idTarea, 1);
}
//grabado del array actual usando serialize()
setcookie("tareas", serialize($tareas));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de tareas</title>
</head>
<body>
<form action="">
    <label for="tarea">Añadir tarea</label>
    <input type="text" name="tarea" id="tarea">
    <button>Añadir</button>
</form>
<?php
//escribir tareas guardadas;
if (count($tareas) > 0)
    echo "<h2>Lista de tareas</h2>";
echo "<ol>";
foreach ($tareas as $idTarea => $tarea) {
    //en el enlace se pasa como parámetro el índice dentro el array del elemento
    echo "<li>$tarea <a href='practica4.php?borrar=$idTarea'>Borrar</a></li>";
}
echo "</ol>";
?>
</body>
</html>