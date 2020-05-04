<!--2) Suma de números pares
• Crea un formulario que pida al usuario un número.
• Después en otra página se recoge ese número y se muestra la suma total de todos los
números pares anteriores a él.
• Mejorar el resultado para que la página que muestra la suma, después muestre un enlace
con el que regresar al formulario de modo que al hacer clic en él el cuadrado de entrada del número muestre el último
número introducido.-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página de cálculo</title>
</head>
<?php
 if (isset($_POST['numero'])){
     $numero = filter_var($_POST['numero'], FILTER_SANITIZE_NUMBER_INT);
     $numeros_pares = [];
     $suma = 0;
     //Cálculo de los pares
     for ($i = 0; $i < $numero; $i++ ){
         if ( $i % 2 == 0) array_push($numeros_pares, $i);
     }
     //Recorrido y sumado de array de pares, con size of sacamos el tamaño del array
     for ($i = 0; $i < sizeof($numeros_pares) ;$i++ ){
         $suma += $numeros_pares[$i];
     }
 }
?>
<body>
<p>La suma de los números pares hasta este número es <?php echo $suma?>  </p>
<a href="1_2_SumaPares_index.php?cuadrado=<?php echo array_pop($numeros_pares) * array_pop($numeros_pares)?>">Volver al forumlario</a>

<?php ?> <br>
</body>
</html>


