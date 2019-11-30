<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
// Creamos un array donde se guardaran los datos
$miArray = array();

// Comprobamos si se ha recibido por post la variable array, y si tiene
// algun valor
if (isset($_POST["array"]) && $_POST["array"]) {

    // Obtenemos el array pasado por post
    $miArray = unserialize(stripslashes($_POST["array"]));
}

// Si hemos recibido un nombre y telefono
if (isset($_POST['nombre']) && $_POST['nombre'] && isset($_POST['telefono']) && $_POST['telefono'])
{

    // Añadimos el nuevo nombre y telefono al array $nombreArray[clave] = valor
    $miArray[$_POST['nombre']] = $_POST['telefono'];
}

if(count($miArray)>0)
{
    // mostramos los valores del array
    foreach($miArray as $nombre=>$telefono)
    {
        echo "<br>".$nombre." => ".$telefono;
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--
    Enviamos el array pasandolo como aculto (hidden). Fijar que las comillas
    son simples, ya que el serialize, pone comillas dobles.
    -->
    <input type="hidden" name="array" value='<?php echo serialize($miArray);?>'>
    <div>
        Nombre</h4><input type="text" name="nombre">
        Telefono</h4><input type="text" name="telefono">
        <input type="submit" name="submit" value="Enviar">
    </div>
</form>
</body>
</html>