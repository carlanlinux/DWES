<?php
echo "<h2>variables no estáticas</h2>";
function contador ()
{
    // Cada vez que se ejecuta la función, se incrementa el valor de $cont
    $cont = 0;
    $cont++;
    echo "CONTADOR: $cont</br>";
}

echo "</br>";
echo "</br>";

for ($i = 0; $i < 10; $i++)
    contador();


echo "<h2>variables estáticas</h2>";
//static
function contador_estatico ()
{
    // Cada vez que se ejecuta la función, se incrementa el valor de $a
    static $cont = 0;
    $cont++;
    echo "CONTADOR: $cont</br>";
}


echo "</br>";
echo "</br>";

for ($i = 0; $i < 10; $i++)
    contador_estatico();
?>
