<?php
/* 
  Camino único para acceder a la aplicación. 
  Sólo incluye e inicia el FrontController.
*/

//Incluimos el FrontController
require 'libs/FrontController.php';
//Lo iniciamos con su método estático main. (Nombre de la clase + nombre del método)
FrontController::main();
?>