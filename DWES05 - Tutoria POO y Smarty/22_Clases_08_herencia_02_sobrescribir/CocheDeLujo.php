<?php
require 'Coche.php';

class CocheDeLujo extends Coche
{
    protected $extras;

    public function __construct ()
    {
        echo "Estoy en el construct de CocheDeLujo va a invocar al constructor "
            . "de la clase padre<br/>";
        parent::__construct();
        echo "Estoy otra vez en el construct de CocheDeLujo<br/>";
    }

    public function getExtras ()
    {
        return $this->extras;
    }

    public function setExtras ($extras)
    {
        $this->extras = $extras;
    }

    public function setColor ($color)
    {
        //sobrescribo el método de la clase padre
        echo "Estoy en setColor de CocheDeLujo y pongo el color $color. <br/>";
        $this->color = "$color";
    }

    public function printCaracteristicas ()
    {
        echo "Estoy en printCaracteristicas de CocheDeLujo<br/>";

        parent::printCaracteristicas();
        echo 'Extras de printCaracterísticas de CocheDeLujo: ' . $this->extras . "<br/>";
        /* A las propiedades y métodos protected no se puede acceder directemente desde el objeto*/
        parent::$numRuedas = 4;
        echo "Numero de ruedas en prinCaracteristicas de cocheDeLujo: " . parent::$numRuedas;
        echo '<hr/>';

    }
}