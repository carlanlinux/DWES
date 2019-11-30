<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processing</title>
</head>
<body>
<?php
    //Se accede de la misma forma que con el Get. Post no necestan ser decoded.
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "{$username} : {$password}";
?>
<?php ?> <br>
</body>
</html>



