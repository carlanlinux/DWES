<?php
include_once 'Auto.php';

interface Combustible extends Auto
{
    public function vaciarDeposito ();

    public function LlenarDeposito ($cantidad);
}
