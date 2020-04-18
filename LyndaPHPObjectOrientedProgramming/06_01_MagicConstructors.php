<?php

class SofaM {

  public static $instance_count = 0;

  public function __Construct(){
      self::$instance_count++;
  }

  public $seats = 3;
  public $arms = 2;

}

class Couch extends SofaM {
  var $arms = 0;
}

class Loveseat extends SofaM {
  var $seats = 2;
}

$sofa = new SofaM();
echo 'Sofa<br />';
echo '- seats: ' . $sofa->seats . '<br />';
echo '- arms: ' . $sofa->arms . '<br />';
echo '<br />';

$couch = new Couch();
echo 'Couch<br />';
echo '- seats: ' . $couch->seats . '<br />';
echo '- arms: ' . $couch->arms . '<br />';
echo '<br />';

$loveseat = new Loveseat();
echo 'Loveseat<br />';
echo '- seats: ' . $loveseat->seats . '<br />';
echo '- arms: ' . $loveseat->arms . '<br />';
echo '<br />';

echo 'Instance count: ' . SofaM::$instance_count . '<br />';

?>
