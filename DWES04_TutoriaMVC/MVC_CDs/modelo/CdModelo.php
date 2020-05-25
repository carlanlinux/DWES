<?php
/*
  Clase modelo. Usa SPDO.
 * https://hotexamples.com/examples/-/SPDO/singleton/php-spdo-singleton-method-examples.html
 * http://www.juntadeandalucia.es/servicios/madeja/sites/default/files/historico/1.4.0/contenido-recurso-257.html
 * patrón singleton http://pabletoreto.blogspot.com/2015/04/ejemplo.html
 * https://es.wikipedia.org/wiki/Singleton
 * https://fernando-gaitan.com.ar/php-orientado-a-objetos-parte-13-singleton/
 * 
 * singleton = instancia única,  garantiza que una clase solo tenga una
 * instancia y proporciona un punto de acceso global a ella, por tanto, el 
 * constructor  será declarado como privado.
 * Se implementa creando en nuestra clase un método que crea una instancia del 
 * objeto solo si todavía no existe ninguna. Para asegurar que la clase no puede 
 * ser instaniada de nuevo, se asigna visibilidad private a la propiedad .
*/

class CdModelo {
    protected $db;
 
    public function __construct() {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function devuelveTodosCds() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM cds');
        $consulta->execute();
        //devolvemos la colecci�n para que la vista la presente.
        return $consulta;
    }
	
    public function devuelveCdPorId($id) {
        $elCd = null;
        // ...
          // recuperar el Cd de la BD y crear un objeto Cd
          // $elCd = new Cd(X,Y,Z,W);
        // ...
        return $elCd;
    }
}
?>