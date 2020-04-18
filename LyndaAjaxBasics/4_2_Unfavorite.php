<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  session_start();

  //Comprobamos si existe la sesión creada, si no es así la creamos.
  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

  //Comprobamos que sea una petición Ajax, viendo sitiene header requested with y el HTTP x Requested with que sea el
  //XMLhttprequest
  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  //Función para borrar un elemento de un array
  function array_remove($element, $array) {
    //queremos saber cuál es el indice del elemento en el array
    $index = array_search($element, $array);
    //con esto voy al array, al index enconcreto y eliminar un ítem
    array_splice($array,$index,1);
    //Devolvemos el array
    return $array;
  }


  //si no es una petición Ajax, que no haga nada
  if(!is_ajax_request()) { exit; }

  // extract $id
  //si en la variable post nos viene el ID entonces raw_id toma ese valor (lo primero seguido de la interrogación, si no,
  // lo que hace es poner la variable con una cadena vacía (lo que está después de los dos puntos.
  $raw_id = isset($_POST['id']) ? $_POST['id'] : '';

  //Comprobar si existe y a la vez capturar la variable. Esto se hace así porque preg_match es un método que devuelve
  //True si lo enceuntra y false que no, aprovechamos que sea true para capturar el valor.
  //Como el nomnbre contiene letras y números y nos queremos quedar sólo con el número usamos regexp para sacarlo
  //En este caso nos busca un patrón y si lo encuentra lo mete dentro de la variable matches que es un array. En la
  //Poaición 1 (OJO no 0) es donde se guarda el match.

  if (preg_match("/blog-post-(\d+)/",$raw_id,$matches)) {
    $id = $matches[1];

    // store in $_SESSION['favorites']
    //Si no tenemos en el array de $_Session el ID dentro de favorites, entonces me lo guardas en la sesión
    if (in_array($id, $_SESSION['favorites'])){
      //En vez de meter el ID en el array de sesión, hacemos lo contrario lo tenemos que quitar
      $_SESSION['favorites'] = array_remove($id, $_SESSION['favorites']);

    }

    echo 'true';
  } else {
    echo 'false';
  }

  //Para comprobar que está funcionando, ponemos un echo
  //echo $raw_id;




?>
