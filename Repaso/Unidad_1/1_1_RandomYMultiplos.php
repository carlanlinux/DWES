<?php
/*1) Múltiplos de 7
• Escribir un programa PHP que muestre en pantalla números aleatorios entre 1 y 500 hasta que aparezca un múltiplo de 7.*/


// Los múltiplos de un número natural son los números naturales que resultan de multiplicar ese número por otros números
// naturales. Decimos que un número es múltiplo de otro si le contiene un número entero de veces.

do {
    $num = rand(1,500);
    echo "<br>" . $num;
    //Para ser múltiplo el módulo de del número % 7 debe ser 0
} while ($num % 7 != 0 );

