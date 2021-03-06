<?php

class SofaM
{

    public static $instance_count = 0;
    public $seats = 3;
    public $arms = 2;

    //Destruct se llama automáticamente cuando termina el script
    public function __Construct ($args = [])
    {
        self::$instance_count++;
        $this->seats = $args['seats'] ?? $this->seats;
        $this->arms = $args['arms'] ?? $this->arms;
    }

    public function __destruct ()
    {
        // TODO: Implement __destruct() method.
        //echo "BYE";
        self::$instance_count--;
    }

}

class Couch extends SofaM
{
    var $arms = 0;
}

class Loveseat extends SofaM
{
    var $seats = 2;
}

$sofa = new SofaM(['seats' => 3, 'arms' => 2]);
echo 'Sofa<br />';
echo '- seats: ' . $sofa->seats . '<br />';
echo '- arms: ' . $sofa->arms . '<br />';
echo '<br />';

$couch = new Couch(['seats' => 4]);
echo 'Couch<br />';
echo '- seats: ' . $couch->seats . '<br />';
echo '- arms: ' . $couch->arms . '<br />';
echo '<br />';

unset($sofa);

$loveseat = new Loveseat(['arms' => 0]);
echo 'Loveseat<br />';
echo '- seats: ' . $loveseat->seats . '<br />';
echo '- arms: ' . $loveseat->arms . '<br />';
echo '<br />';

echo 'Instance count: ' . SofaM::$instance_count . '<br />';

?>
