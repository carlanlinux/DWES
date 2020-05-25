<?php
require_once ('../private/initialize.php');
//Si no tiene sesión entonces es cuando la abro
if (session_status() == PHP_SESSION_NONE) session_start();

$animal1 = new Animal("Peter","Perro", "Carlino", "Femenino", "marron", 10);
$animal1 = new AnimalDos("Juana","Marmota", "Carlino", "Femenino", "marron", 10);
$animal1 = new AnimalDos("Felipe","Perro", "Carlino", "Femenino", "marron", 10);

?>



