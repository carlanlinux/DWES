<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions arguments</title>
</head>
<body>

<?php
    function say_hello_to($word) {
        echo "Hello {$word}!<br>";
    }
    $name = "Jhon Doe";
    say_hello_to($name);
?>
<?php
    function better_hello($greeting, $target, $punct) {
        echo $greeting . " " . $target . " " . $punct . "<br>";
    }

    //Coonvierte a null en una cadena vacía
    better_hello("Hello",$name,null);
?> <br>

<?php ?> <br>


</body>
</html>



