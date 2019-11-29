<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparison And Logical Operators</title>
</head>
<body>

<?php
    function add($val1, $val2){
        $sum = $val1 + $val2;
        return $sum;
    }

    $result = add(3,4);
    $result2 = add(5,$result);
    echo $result2;

?>
<hr>

<?php // Chinese Zodiac as a function

function chinese_zodiac($year) {
    switch (($year - 4) % 12) {
        case  0: return 'Rat';
        case  1: return 'Ox';
        case  2: return 'Tiger';
        case  3: return 'Rabbit';
        case  4: return 'Dragon';
        case  5: return 'Snake';
        case  6: return 'Horse';
        case  7: return 'Goat';
        case  8: return 'Monkey';
        case  9: return 'Rooster';
        case 10: return 'Dog';
        case 11: return 'Pig';
    }
}

$zodiac = chinese_zodiac(1988);
echo "1988 This is the year of the {$zodiac}";

echo "2017 is the year of the " . chinese_zodiac(2017) . "<br>";

?> <br>
</body>
</html>



