<?php
/* Esta función activará el almacenamiento en búfer de la salida. Mientras dicho almacenamiento esté activo, no se enviará
ninguna salida desde el script (aparte de cabeceras); en su lugar la salida se almacenará en un búfer interno. */
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

require_once('functions.php');
require_once('status_error_functions.php');
require_once('db_credentials.php');
require_once('database_functions.php');
require_once('validation_functions.php');


// Load class definitions manually usando requieres por cada fichero

/*Se pueden cargar todas las clases que estén dentro de un directorio usando la función glob: Gets last access time of file
Indicamos el directorio y el tipo de ficheros, los que estén en classes y temrinen por .class.php y esos me los cargas
 uno a  uno en cada bucle
foreach (glob('classes/*.class.php') as $fileClass) {
  require_once($fileClass);
}
  */

// -> All classes in directory
foreach (glob('classes/*.class.php') as $file) {
    require_once($file);
}


// Autoload class definitions
function my_autoload ($class)
{
    if (preg_match("/\A\w+\Z/", $class)) {
        //Ponemos el include de la localización
        include('classes/' . $class . '.class.php');
    }
}

//Cargamos el fichero en el registro de autoload
spl_autoload_register('my_autoload');

//Nos conectamos a la base de datos
$database = db_connect();

//Le pasamos a la clase el objeto devuelto de la conexión de la base de datos.
DatabaseObject::set_database($database);


?>
