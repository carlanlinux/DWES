<?php
require 'Coche.php';

class CocheDeLujo extends Coche
{

    // La función displayColor devolverá un error porque es private
    public function displayColor ()
    {
        return $this->color;
    }

    public function dameColor ()
    {
        return $this->getColor();
    }

    // La función displayPotencia devolverá 120, ya que hereda el valor
    public function displayPotencia ()
    {
        return $this->potencia;
    }

    // La función displayMarca devolverá audi, ya que también hereda el valor
    public function displayMarca ()
    {
        return $this->marca;
    }

    public function cambiaEstado ()
    {
        if ($this->enMarcha) {
            echo "Apago motor<br/>";
            $this->para();
        } else {
            echo "Enciendo Motor<br/>";
            $this->arranca();
        }
    }

}