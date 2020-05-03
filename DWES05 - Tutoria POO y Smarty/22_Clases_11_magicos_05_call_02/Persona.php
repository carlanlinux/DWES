<?php
include 'Direccion.php';

class Persona
{
    protected $nombre;
    protected $direccion;

    public function __construct ()
    {
        /*
         * Creamos en la clase Persona un objeto de la clase Dirección.
         * Observa que de esta forma, sin "heredar" de la clase Direccsión, podríamos
         * acceder a los atributos y métodos de la clase Dirección.
         */
        $this->direccion = new Direccion;
    }

    public function getNombre ()
    {
        return $this->nombre;
    }

    public function setNombre ($nombre)
    {
        $this->nombre = $nombre;
    }

    /*
     * Utilizando el método mágico __call() podemos con una sola llamada
     * acceder a cualquier método de la clase Dirección desde la clase Persona
     * Las líneas comentadas simplemente son para que probéis los argumentos que
     * llegan y como se forma el parámetro de la función call_user_func.
     * Los argumentos llegan en un array
     */
    public function __call ($metodo, $argumentos)
    {
        echo "Método __call(): se ha llamado al método: $metodo<br>";
        echo "Los argumentos recibidos son: ";
        print_r($argumentos);
        echo "<br>";
        /*
         * Comprobamos si el método existe en el objeto de la clase direccion
         * Si es así
         * la función call_user_func_array ejecuta una función callback que
         * se le pasa como primer parámetro, y como segundo un array de
         * argumentos.
         * IMPORTANTE: si la función que se pasa en el primer parámetro es un
         * método de una clase, el primer argumento ha de ser un array de
         * dos elementos, el primero el objeto (con sus propiedades), y el
         * segundo el nombre del método del objeto que queremos que se ejecute.
         * Algunos métodos de la clase Dirección reciben argumentos y otros no
         * Utilizando la función call_user_func_array no tenemos que inidcar
         * exactamente los argumentos, nos llegan en un array. La función
         * devuelve el valor devuelto por la funcion callback (si devuleve
         * algo, o false en caso de error.
         */
        if (method_exists($this->direccion, $metodo)) {
            $objParametro = array($this->direccion, $metodo);
            $resultado = call_user_func_array($objParametro, $argumentos);
            return $resultado;

            //FORMA ABREVIADA.
            //return call_user_func_array(array($this->direccion, $metodo), $argumentos);
        }
    }
}


?>