<?php
/*
  Clase que extiende de PDO. 
  Permite aplicar el patrón Singleton para mantener una única instancia de PDO.
*/
class SPDO extends PDO {
    private static $instance = null;
 
    public function __construct() {
        $config = Config::singleton();
        parent::__construct('mysql:host=' . $config->get('servidorBD') . 
                            ';dbname=' . $config->get('nombreBD'),
                            $config->get('usuarioBD'), 
                            $config->get('claveUsuarioBD'));
    }

    /* 
     * para aplicar el patrón singleton creamos un método en el que se comprueba 
     * si ya hay una sontancia creada, de no ser así crea una y nos devuelve 
     * la instancia nueva o la que ya existiera.
     */
    public static function singleton() {
        if( self::$instance == null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>