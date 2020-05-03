<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'Persona.php';

$p = new Persona();
$p->setNombre("Lucas");
echo "\$p->getNombre(): " . $p->getNombre() . "<br/>";
/*
 * Si utilizamos el operador de asignación obtenemos un solo objeto con
 * dos identificadores. Si realizamos algún cambio afecta al objeto
 * independientemente del identificador que utilicemos
 */
$a = $p;
echo "\$a->getNombre(): " . $a->getNombre() . "<br/>";

$a->setNombre("Clara");

echo "he cambiado el nombre en \$a, pero muestro \$p->getNombre(): " . $p->getNombre() . "<br/>";
echo "<hr>";
echo "<h2>copiamos un objeto con clone \$c=clone(\$p)</h2>";
/*
 * en cambio, si utilizamos clone(obj) obtenemos una copia del objeto
 * que podemos manipular sin que los cambios afecten al original.
 */
$c = clone($p);
echo "<p>Hacemos \$c->setNombre('Carlos') y mostramos el contenido"
    . " <br/>de la propiedad nombre que hay en los tres objetos</p>";
$c->setNombre("Carlos");
echo "\$p->getNombre(): " . $p->getNombre() . "<br/>";
echo "\$c->getNombre(): " . $c->getNombre() . "<br/>";
echo "\$a->getNombre(): " . $a->getNombre() . "<br/>";
echo "<hr>";

echo "<h2>Comparamos objetos con == y === "
    . "Ponemos el mismo valor del atributo para los tres</h2>";
echo "<p>Asigamos a la propiedad nombre del objeto \$c el "
    . "valor 'Clara' para que tengan todos el mismo</p>";

$c->setNombre("Clara");
echo "\$p->getNombre(): " . $p->getNombre() . "<br/>";
echo "\$c->getNombre(): " . $c->getNombre() . "<br/>";
echo "\$a->getNombre(): " . $a->getNombre() . "<br/>";
if ($a == $p)
    echo "\$a==\$p es cierto" . "<br/>";
else
    echo "\$a==\$p es falso" . "<br/>";
if ($a === $p)
    echo "\$a===\$p es cierto" . "<br/>";
else
    echo "\$a===\$p es falso" . "<br/>";
echo "<br/>";
if ($a == $c)
    echo "\$a==\$c es cierto" . "<br/>";
else
    echo "\$a==\$c es falso" . "<br/>";
if ($a === $c)
    echo "\$a===\$c es cierto" . "<br/>";
else
    echo "\$a===\$c es falso" . "<br/>";
echo "<br/>";
if ($p == $c)
    echo "\$p==\$c es cierto" . "<br/>";
else
    echo "\$p==\$c es falso" . "<br/>";
if ($p === $c)
    echo "\$p===\$c es cierto" . "<br/>";
else
    echo "\$p===\$c es falso" . "<br/>";

?>
</body>
</html>
