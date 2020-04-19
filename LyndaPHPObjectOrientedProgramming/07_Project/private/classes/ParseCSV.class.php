<?php


class ParseCSV
{
    //Creamos los atributos de la clase que va a parsear los datos
    public static $delimeter = ',';
    private $filename;
    private $header;
    private $data = [];
    private $rowCount = 0;

//En el constructor únicamente indicamos el nombre del fichero
    public function __construct ($filename = '')
    {
        //Si el filename no está vacío entonces que me asigne el nombre al atributo
        if ($filename != '') $this->file($filename);
    }

    public function file ($filename)
    {
        if (!file_exists($filename)) {
            echo "File does not exist";
            return false;
        } elseif (!is_readable($filename)) {
            echo "File is not readable";
            return false;
        }
        $this->filename = $filename;
        return true;
    }

    public function parse ()
    {
        //Comprobar si el filename se ha puesto
        if (!isset($this->filename)) {
            echo "File not found";
            return false;
        }

        //Clear any previos parseo
        $this->reset();

        $file = fopen($this->filename, 'r');
        //Mientras que no sea el final del fichero me sigues haciendo el while
        while (!feof($file)) {
            $row = fgetcsv($file, 0, self::$delimeter);
            //si alguna fila es nula o false entonces que no haga nada y pase a la siguiente
            if ($row == NULL || $row === FALSE) {
                continue;
            }
            if (!$this->header) {
                $this->header = $row;
            } else {
                $this->data[] = array_combine($this->header, $row);
                $this->rowCount++;
            }
        }
        fclose($file);

        return $this->data;
    }

    private function reset ()
    {
        $this->header = NULL;
        $this->data = [];
        $this->rowCount = 0;
    }

    public function last_results ()
    {
        return $this->data;
    }

    public function row_count ()
    {
        return $this->rowCount;
    }

}