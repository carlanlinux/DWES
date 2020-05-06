<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
<h1>Calculadora de edad</h1>
<?php
$hidden = false;
if (isset($_POST['numero_medio'])) {
    //Metemos los datos del input en un array filtrados como enteros.
    $input_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_NUMBER_INT);
    //Creamos un random entre el mínimo y el máximo.
    $random = mt_rand($input_post['numero_minimo'],$input_post['numero_maximo']);


    if ($random == $input_post['numero_medio']) {
        echo "Enhorabuena, ha acertado! El número random es " . $random . " igual que el número intermedio " . $input_post['numero_medio'] . ".";
        $hidden = true;
    } else {
        echo "El número random es " . $random . ". Usted no ha acertado con su predicción del " . $input_post['numero_medio'] . ".";
    }
}
?>
<!-- Para ocultarlo añado una variable de hidden y que la pone en true y lo oculta cuando acierta. -->
<form action="" method="post" name="numero" <?php if ($hidden) echo "hidden"?>>
    <label for="numero_minimo">Número mínimo:</label>
    <input id="numero_minimo" type="number" name="numero_minimo"  required>
    <label for="numero_medio">Número mínimo</label>
    <input id="numero_medio" type="number" name="numero_medio" required>
    <label for="numero_minimo">Número mínimo</label>
    <input id="numero_maximo" type="number" name="numero_maximo" required>
    <input type="submit" value="Enviar">
</form>
 <br>
</body>
</html>



