<?php
class User{
    var $firstName;
    var $lastName;
    var $username;

    function fullName(){
        return $this->firstName . " " . $this->lastName;
    }
}

class Testeo extends User{
 public $is_admin = false;
}

class Customer extends Testeo {
    public $city;
    public $state;
    public $country;

    function location() {
        return $this->city . ", " . $this->state . ", " . $this->country;
    }

}

class AdminUser extends User{
    public $is_admin = true;

    function fullName(){
        return $this->firstName . " " . $this->lastName . "(admin)";
    }
}

$u = new User();
$u->firstName = "Pepe";
$u->lastName = "Loco";
$u->username = "pepeloco";

$c = new Customer();
$c->username = "Petra";
$c->lastName = "Nieto";
$c->username = "petranieto";
$c->city = "New York";
$c->state = "New York";
$c->country = "US";

echo $u->fullName() . "<br>";
echo $c->fullName() . "<br>";

echo get_parent_class($u) . "<br>";
echo get_parent_class($c) . "<br>";

if (is_subclass_of($c,'User')) {
    echo "Instance is a subclass of user <br>";
}

$parents = class_parents($c);
echo implode(',',$parents) . "<br>";
