<?php

class Menu
{
    static public $txt = "Hola esto es una variable estática";
    private $enlaces = array();
    /*
     * En versiones anteriores  las propiedades estáticas  no las guardaba en
     * variables de sesión.
     */
    private $titulos = array();

    public function cargarOpcion ($en, $tit)
    {
        $this->enlaces[] = $en;
        $this->titulos[] = $tit;
    }

    public function mostrar ()
    {
        for ($f = 0; $f < count($this->enlaces); $f++) {
            echo '<a href="' . $this->enlaces[$f] . '">' . $this->titulos[$f] . '</a>';
            echo "-";
        }
        echo "<br/>" . self::$txt . "<br/>";
    }
}
