<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body {
            font-size: 20px;
            margin: 50px;
        }
    </style>
</head>
<body>
<?php
echo "<h2>Ejemplo de checkdate()</h2>";
if (checkdate(1, 28, 2011) == true)
    echo "La fecha  checkdate(1, 28, 2011) es válida<br />";
else
    echo "La fecha checkdate(1, 28, 2011) NO es válida<br />";
/* en este caso la fecha no será válida porque no era un año bisiesto*/
if (checkdate(2, 29, 2011) == true)
    echo "La fecha checkdate(2, 29, 2011) es válida<br />";
else
    echo "La fecha checkdate(2, 29, 2011) NO es válida<br />";

if (checkdate(2, 29, 2012) == true)
    echo "La fecha checkdate(2, 29, 2012) es válida<br />";
else
    echo "La fecha checkdate(2, 29, 2012) NO es válida<br />";

if (checkdate(0, 12, 2012) == true)
    echo "La fecha checkdate(0, 12, 2012) es válida<br />";
else
    echo "La fecha checkdate(0, 12, 2012) NO es válida<br />";
?>
</body>
</html>
