<?php
  // You can simulate a slow server with sleep
//sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  $length = isset($_POST['length']) ? (int) $_POST['length'] : '';
  $width = isset($_POST['width']) ? (int) $_POST['width'] : '';
  $height = isset($_POST['height']) ? (int) $_POST['height'] : '';

  $volume = $length * $width * $height;

  //validar formulario
  //Creamos un array donde vamos a meter todos los erroes que se vean
  $errors = [];
  if ($length == '') $errors[] = 'length';
  if ($width == '') $errors[] = 'width';
  if ($height == '') $errors[] = 'height';

  //si tiene erroes, enviamos el array de errores dentro de un JSON

  if (!empty($errors)){
    //Si es una reques Ajax
    if (is_ajax_request()){

      // OJO, poner los curly braces de JSON y JSON es tocapelotas con las comillas, no poner comillas simples
      //echo "{ 'errors: " . json_encode($errors) . "}";
      //Por eso lo que tenmos que hacer es meterlo en un array dentro de una única estructura PHP y luego ya
      //codificarlo. buenas prácticas devolver JSONes por eso el dato que devolvemos también será JSON
      $final_array = array('errors' => $errors);
      echo json_encode($final_array);
      exit;
    } else{
      //Cuando haya erroees usamos implode de forma que los vaya juntando con los ', ' y listen todos ellos y volvemos atrás
      echo "<p>There were errors on " . implode(', ', $errors) . "</p>";
      echo "<p><a href=\"5_3_HandleFormErrors.php\">Back</a><p/>";
      exit;
    }

  }

  if(is_ajax_request()) {
    //Funciona si se devuelve volumen pero es mejor devolver siempre JSON
    //echo $volume;
    echo json_encode(array('volume' => $volume));
  } else {
    //Si no es una request Ajax, calculalo de todas formas y mandalo por HTML
    echo "<p>The total volume is: " . $volume . "</p>";
    echo "<p><a href=\"5_3_HandleFormErrors.php\">Back</a><p/>";
    exit;
  }

?>
