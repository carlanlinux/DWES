<?php

class Ordenador extends Producto
{
    protected $procesador;
    protected $RAM;
    protected $disco;
    protected $grafica;
    protected $unidadoptica;
    protected $SO;
    protected $otros;

    // Métodos para obtener los datos del ordenador

    public function __construct ($row)
    {
        parent::__construct($row);
        $this->procesador = $row['procesador'];
        $this->RAM = $row['RAM'];
        $this->disco = $row['disco'];
        $this->unidadoptica = $row['unidadoptica'];
        $this->grafica = $row['grafica'];
        $this->SO = $row['SO'];
        $this->otros = $row['otros'];
    }

    public function getprocesador ()
    {
        return $this->procesador;
    }

    public function getRAM ()
    {
        return $this->RAM;
    }

    public function getdisco ()
    {
        return $this->disco;
    }

    public function getgrafica ()
    {
        return $this->grafica;
    }

    public function getunidadoptica ()
    {
        return $this->unidadoptica;
    }

    public function getSO ()
    {
        return $this->SO;
    }

    public function getotros ()
    {
        return $this->otros;
    }
}

/*class Ordenador extends Producto{
    protected $procesador;
    protected $RAM;
    protected $grafica;
    protected $unidadoptica;
    protected $SO;
    protected $otros;

    public function getprocesador() {return $this->procesador; }
    public function getRAM() {return $this->RAM; }
    public function getgrafica() {return $this->grafica; }
    public function getunidadoptica() {return $this->unidadoptica; }
    public function getSO() {return $this->SO; }
    public function getotros() {return $this->otros; }
    
    public function __construct($row) {
        $this->procesador = $row['procesador'];
        $this->RAM = $row['RAM'];
        $this->grafica = $row['grafica'];
        $this->unidadoptica = $row['unidadoptica'];
        $this->SO = $row['SO'];
        $this->otros = $row['otros'];
        echo "fin construvt";
    }

}*/

?>
