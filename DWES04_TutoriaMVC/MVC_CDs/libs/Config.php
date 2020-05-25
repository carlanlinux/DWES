<?php
/*
  Clase de configuración
  Implementa el patrón Singleton para mantener una única instancia 
  y poder acceder a sus valores desde cualquier sitio.
  Declara el constructor como privado para que solo haya una instancia de la 
  clase.
*/

class Config
{
    private $arrayParametros;
    private static $instancia;
 
    private function __construct() {
        $this->arrayParametros = array();
    }
 
    //Con set vamos guardando nuestras variables.
    public function set($name, $value) {
        if(!isset($this->arrayParametros[$name])) {
            $this->arrayParametros[$name] = $value;
        }
    }
 
    //Con get('nombre_de_la_variable') recuperamos un valor.
    public function get($name)
    {
        if(isset($this->arrayParametros[$name])) {
            return $this->arrayParametros[$name];
        }
    }
 
    //método para aplicar el patrón singleton
    // si no existe la instancia, la crea.
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $c = __CLASS__;
            self::$instancia = new $c;        	
        }
        return self::$instancia;
    }
}

/*
 Uso:
 
 $config = Config::singleton();
 $config->set('nombre', 'Federico');
 echo $config->get('nombre');
 
 $config2 = Config::singleton();
 echo $config2->get('nombre');
 
*/
?>