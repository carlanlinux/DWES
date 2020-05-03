<?php

class Coche
{
    public $marca = 'Audi';
    public $enMarcha = false;
    protected $potencia = 120;
    private $color = 'rojo';

    public function getColor ()
    {
        return $this->color;
    }

    public function setColor ($color)
    {
        $this->color = $color;
    }

    protected function arranca ()
    {
        if ($this->enMarcha)
            echo "El coche ya estaba arrancado<br/>";
        else {
            $this->enMarcha = true;
            echo "Coche arrancando....<br>";
        }
    }

    protected function para ()
    {
        if (!$this->enMarcha)
            echo "El coche ya estaba parado<br/>";
        else {
            $this->enMarcha = false;
            echo "Coche parando....<br>";
        }
    }

}

