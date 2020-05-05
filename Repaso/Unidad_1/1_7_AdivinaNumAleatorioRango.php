<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>
<h1>Calculadora de edad</h1>
<?php
if (isset($_POST)) {
    $input_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_NUMBER_INT);
    $random = mt_rand($input_post['numero_minimo'],$input_post['numero_maximo']);
    if ($random > $input_post['nummero_medio']) echo "El número random es " . $random . "mayor al número intermedio" . $input_post['nummero_medio'] . ".";
    if ($random == $input_post['nummero_medio']) echo "El número random es " . $random . "igual que el número intermedio" . $input_post['nummero_medio'] . ".";
    if ($random < $input_post['nummero_medio']) echo "El número random es " . $random . "menor al número intermedio" . $input_post['nummero_medio'] . ".";
}
?>
<form action="" method="post" name="numero">
    <label for="numero_minimo">Número mínimo:</label>
    <input id="numero_minimo" type="number" name="numero_minimo"  required>
    <label for="numero_medio">Número mínimo</label>
    <input id="numero_medio" type="number" name="numero_medio" required>
    <label for="numero_minimo">Número mínimo</label>
    <input id="numero_maximo" type="number" name="numero_maximo" required>
    <input type="submit" value="Enviar">
</form>

<?php ?> <br>
</body>
</html>



