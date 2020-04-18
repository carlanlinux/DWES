<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ajax Zip Code</title>
    <style>
        #entry {
            margin: 2em 1em;
        }
        #location {
            margin: 1em;
        }
    </style>
</head>
<body>

<div id="entry">
    Zip code: <input id="zipcode" type="text" name="zipcode" />
    <button id="ajax-button" type="button">Submit</button>
</div>

<div id="location">
</div>

<?php
//Comprobamos si es una request Ajax viendo si está en primer lugar el en la cabecera: HTTP_X_REQUESTED_WITH'
//y después comprobando que esa cabecera coincide con lo que queremos.
function is_ajax_request(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

//si ambas condiciones se cumplen devuelvo la respuesta Ajax y si no la normal.
if (is_ajax_request()){
    echo "Ajax Response";
} else {
    echo "Normal Response";
}

?>

</body>
</html>
