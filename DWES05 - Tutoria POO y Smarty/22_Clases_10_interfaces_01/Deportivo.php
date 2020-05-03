<?php
include_once "Combustible.php";

class Deportivo implements Combustible
{
    const CONSUMO = 0.08;
    private $estado = false;
    //suponemos los litros de gasolina que gasta por kilómetro,
    private $deposito = 0;

    public function compruebaEstado ()
    {
        if ($this->estado) {
            echo "Está arrancado<br>";
        } else {
            echo "Está apagado<br>";
        }
    }

    public function vaciarDeposito ()
    {
        $this->deposito = 0;
    }

    public function LlenarDeposito ($cantidad)
    {
        $this->deposito = $cantidad;
    }

    public function arrancarMotor ()
    {
        if ($this->estado) {
            echo "El motor ya está en marcha<br>";
        } else {
            if ($this->deposito <= 0) {
                echo "Imposible arrancar, no hay combustible<br>";
            } else {
                echo "Arrancando motor .... Hay " . $this->deposito . " litros en el depósito <br>";
                $this->estado = true;
            }
        }
    }

    public function circular ($km)
    {
        if ($this->estado) {
            if ($this->getMaxDistancia() < $km) {
                echo "AVISO: no tiene suficiente combustible para recorrer $km km Debe repostar<br>";
            }
            //calculamos lo que ha gastado
            $gasto = (self::CONSUMO * $km);
            $this->deposito -= $gasto;
            if ($this->deposito <= 0) {
                $this->pararMotor();
            } else {
                printf("circulando %d km.... quedan %.2f litros de combustible, "
                    . "puedes recorrer %d km<br>", $km, $this->deposito, $this->getMaxDistancia());
            }
        } else {
            echo "El motor del coche está apagado. Hay que arrancarlo antes de circular<br>";
        }
    }

    public function getMaxDistancia ()
    {
        $maxD = $this->deposito / self::CONSUMO;
        return ($this->deposito / self::CONSUMO);
    }

    public function pararMotor ()
    {
        if ($this->estado) {
            if ($this->deposito <= 0) {
                echo "Se acabó el combustible, parando motor ....<br>";
            } else {
                echo "Parando motor ....<br>";
            }
            $this->estado = false;
        } else {
            echo "El motor ya está apagado<br>";
        }
    }
}
