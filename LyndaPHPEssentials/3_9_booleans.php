<html>
<head>
    <title>Associative array</title>
</head>
<body>
<?php
$result1 = true;
$result2 = false;
?>
Result 1: <?php echo $result1; ?>
Result 2: <?php  echo $result2; ?>
Result is boolean: <?php echo is_bool($result2); ?> <br>

<?php
$number = 3.14;
if (is_float($number)) {
    echo "Its a float";
}?> <br>

<?php  ?> <br>

</body>
</html>