<?php
    /*
      Archivo de configuración, hace uso de una instancia de la clase Config.
     * patrón singleton, única instancia de la clase Config de ámbito global
    */
    $config = Config::singleton();

    // parámetros de configuración de la aplicación
    $config->set('directorioControlador', 'controlador/');
    $config->set('directorioModelo', 'modelo/');
    $config->set('directorioVista', 'vista/');

    // par�metros de configuración del acceso a la BD 
    $config->set('servidorBD', 'localhost');
    $config->set('nombreBD', 'cdcol');
    $config->set('usuarioBD', 'root');
    $config->set('claveUsuarioBD', '');
?>