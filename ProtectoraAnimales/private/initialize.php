<?php
  ob_start(); // turn on output buffering

  // session_start(); // turn on sessions if needed

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/chain_gang/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  
  // Load class definitions manually usando requieres por cada fichero

/*Se pueden cargar todas las clases que estén dentro de un directorio usando la función glob: Gets last access time of file
Indicamos el directorio y el tipo de ficheros, los que estén en classes y temrinen por .class.php y esos me los cargas
 uno a  uno en cada bucle
foreach (glob('classes/*.class.php') as $fileClass) {
  require_once($fileClass);
}
  */


  // Cargo Automáticamente las clases
function my_autoload($class){
  if (preg_match("/\A\w+\Z/",$class)) {
    //Ponemos el include de la localización
    include '../private/classes/' . $class . ".class.php";
  }
}

spl_autoload_register('my_autoload');

?>
