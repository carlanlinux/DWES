<?php
// You can simulate a slow server with sleep
// sleep(2);

function is_ajax_request ()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

if (!is_ajax_request()) {
    exit;
}

//devuelve verdadero si la letra que ponemos coincide con la primera letra
function str_starts_with ($choice, $query)
{
    //Se necesita usar === en vez de dos porque puede devolver falso, y lo que necesitamos es que sea un 0 estricto no
    // que un falso noslo tome como 0.
    return strpos($choice, $query) === 0;

}

//Devuelve verdadero cuando la palabra lo contiene en culquier parte del texto
function str_contains ($choice, $query)
{
    //Se necesita usar === en vez de dos porque puede devolver falso, y lo que necesitamos es que sea un 0 estricto no
    // que un falso noslo tome como 0.
    return strpos($choice, $query) !== false;

}


//Creamos una función para buscar, aunque hay ya programas como sola o elastic searc, Sphinix h específicos para esto va a devolver
// un array que sean los matches
function search ($query, $choices)
{
    $matches = [];
    //Si queremos que sea case sensitive, lo mejor es que pongamos todos en minúsculas, esta la sacamos del for.
    $d_query = strtolower($query);

    foreach ($choices as $choice) {
        $d_choice = strtolower($choice);
        //Necesitamos una función que devuelva true o false cada vez que se ejecute la query
        if (str_starts_with($d_choice, $d_query)) {
            $matches[] = $choice;
        }
    }
    return $matches;
}


$query = isset($_GET['q']) ? $_GET['q'] : '';

// find and return search suggestions as JSON
//Creamos un array que vamos a llenar con los datos del fichero y le decimos que ignore las primeras líneas, con esto
// emulamos una base de datos.
$choices = file('includes/7_4_us_passenger_trains.txt', FILE_IGNORE_NEW_LINES);

$suggestions = search($query, $choices);
//Conviene ordenaar las sugerencias
sort($suggestions);

//Limitamos a 5 el número de resultados que aparecen, cogiendo X número del array
$max_suggestions = 5;
$top_suggestions = array_slice($suggestions, 0, $max_suggestions);

//Devolvemos sólo las top suggestions
echo json_encode($top_suggestions);

?>
