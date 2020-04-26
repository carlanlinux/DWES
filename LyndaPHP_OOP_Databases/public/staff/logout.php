<?php
require_once('../../private/initialize.php');

// Log out the admin - Usamos el objeto sesión que hemos instanciado en inicialize que contiene el objetó de la seisón
// para cerrarla.
$session->logout();

redirect_to(url_for('/staff/login.php'));

?>
