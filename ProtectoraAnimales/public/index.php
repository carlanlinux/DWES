<?php
require_once ('../private/initialize.php');
//Si no tiene sesión entonces es cuando la abro recordar
//if (session_status() == PHP_SESSION_NONE) session_start();

$animal1 = new Animal("Peter","Perro", "Carlino", "macho", "marron", 10);
$animal2 = new AnimalDos("Juana","Marmota", "Carlino", "hembra", "marron", 10);
$animal3 = new AnimalDos("Felipe","Perro", "Carlino", "macho", "marron", 10);

?>



