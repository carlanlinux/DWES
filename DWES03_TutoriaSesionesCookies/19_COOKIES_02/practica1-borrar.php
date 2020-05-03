<?php
//borra las cookies y nos devuelve al formulario
setcookie("nombre", " ", time() - 6000);
setcookie("apellidos", " ", time() - 6000);
setcookie("fondo", " ", time() - 6000);
setcookie("frente", " ", time() - 6000);
setcookie("letra", " ", time() - 6000);
header("location:practica1-index.php");
?>