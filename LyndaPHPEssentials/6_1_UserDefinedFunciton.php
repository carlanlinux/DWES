<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions definining PHP</title>
</head>
<body>
En las funciones no se tiene en cuenta las mayus.
Definimos una función:
function name (args1, arg3) {
}

<?php
 function say_hello() {
     echo "Hello World!<br>";
 }

 say_hello();

 function say_hello_to($word){
     echo "Hello {$word}<br>";
 }

say_hello_to("perra");

?>
En PHP se puede llamar a una función antes de que se haya declarado ya que PHP pre procesaa toda la página primero.


<?php ?> <br>
</body>
</html>



