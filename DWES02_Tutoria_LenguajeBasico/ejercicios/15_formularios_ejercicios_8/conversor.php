<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>conversor de monedas</title>
</head>
<body>
<?php
echo "Son: ";
if ($_POST['conv'] == 1) {
    echo $_POST['cantidad'] * 0, 889868;
    echo " libras";
} else {
    echo $_POST['cantidad'] * 1, 13742;
    echo " dolares";
}
?>
</body>
</html>