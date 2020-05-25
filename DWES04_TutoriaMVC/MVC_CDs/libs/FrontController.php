<?php
/*
  Se encarga de recibir todas las peticiones e incorporar algunos ficheros. 
  Después realiza una selección del controlador encargado de atender la petición
  y produce el evento correspondiente 
*/

class FrontController {
	static function main() {

        //Incluimos algunas clases:
        require 'libs/Config.php'; //de configuracion
        require 'libs/SPDO.php'; //PDO con singleton
        require 'libs/View.php'; //Mini motor de plantillas
 
        require 'configuracion.php'; //Archivo con configuraciones.
 
        //Con el objetivo de no repetir nombre de clases, nuestros controladores
        //terminarán todos en Controller. Por ej, la clase controladora Items, 
        //será ItemsController
 
        //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if(! empty($_GET['controlador'])) {
              $controllerName = $_GET['controlador'] . 'Controller';
        } else {
              $controllerName = "CdController";
		}
 
        //Lo mismo sucede con las acciones, si no hay acci�n, tomamos index como acci�n
        if(! empty($_GET['accion'])) {
              $actionName = $_GET['accion'];
        } else {
              $actionName = "listar";
 		}
        $controllerPath = $config->get('directorioControlador') . $controllerName . '.php';
 
        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if(is_file($controllerPath)) {
              require $controllerPath;
        } else {
              die('El controlador no existe - 404 not found');
 		}
        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        // is_callable(): comprueba que los contenidos de una variable pueden
        // ser llamados como función. 
        // en el ejemplo comprobaría si la funcion listar es una función de la 
        // clase CdController
        // trigger_error() genera un mensaje de error/adventencia/aviso a nivel 
        // de usuario
        if (is_callable(array($controllerName, $actionName)) == false) {
            trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
            return false;
        }
        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        $controller = new $controllerName();
        $controller->$actionName();
    }
}
?>