<?php

//Esta clase gestionará las sesiones, debe de estar en inicializar y crear una instancia de esta clase ahí y en la
// paágina de login que en cuanto pase las validaciones se debe llamar al método login y pasarle el usuario (admin) en este ejemplo.
class Session
{
    //Creamos la clase sólo accesible desde aquí
    public const MAX_LOGIN_AGE = 60 * 60 * 24;
    //Se puede aprovehcar la clase de la sesión para guardar más información como el nombre de usuario y último login.
    public $username;
    public $last_login;
    //Se puede crear una constante para indicar el tiempo máximo de la sesión y en base a eso hacer operaciones.
    // En este caso la aplicamos de un día.
    private $admin_id; //1 day

    //Se mete dentro del constructor, de tal forma que cuando se cree una nueva instance, se llame a este método.
    // Cada vez que llamemos a crear un objeto sesión, se abrirá la sesión. Este objeto se creará cada vez que se abra
    // la aplicación, por eso debe de estar en la página de inicialización en la que se carga tod o el programa.

    public function __construct ()
    {
        session_start();
        $this->checked_stored_login();
    }

    //Cuando hacemos un login pasamos el objeto usuario y si recibimos ese usuario guardamos su propiedad id en la sesión
    //además lo asignamos a la propiedad privada de la clase sesión para tenerlo y poderlo usar, cada instancia lo tendrá.
    //Aquí al hacer login se pueden sacar los datos de username y poner el timestamp del last login.

    private function checked_stored_login ()
    {
        if (isset($_SESSION['admin_id'])) {
            $this->admin_id = $_SESSION['admin_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
        }

    }

    //Comprobamos que el usuario está logado, para eso comprobamos que la popiedad admin_id está set pero a parte podemos ver
//Que si el tiempo desde que inicio la sesiión está dentro del maximo permitido, le decimos que login es correcto que aún tiene sesión.

    public function login ($admin)
    {
        if ($admin) {
            //Esto sirve para protegerse de ataques, usarlo siempre que se inicie una sesión.
            session_regenerate_id();
            $_SESSION['admin_id'] = $admin->id;
            $this->admin_id = $admin->id;
            //Se puede hacer una asignación doble
            $this->username = $_SESSION['username'] = $admin->username;
            $this->last_login = $_SESSION['last_login'] = time();
        }
        //Devolvemos true cuando se complete
        return true;
    }

    //cuando hacemo sun logout, hacemos un unset tanto de la sesión como de la propiedad de la clase. y devolvemos True

    public function esta_logado ()
    {
        return isset($this->username) && $this->last_login_is_recent();

    }

    //Va a comprobar si el id está ya en la sesión y si está, la propiedad adminid se le da el mismo valor que la sesión.
    //Este método lo tenemos que llamar cada vez que la página se cargue en login. Se puede poner en inizlizar o meterlo
    // dentro del constructor, de tal forma que cuando se cree una nueva instance, se llame a este método

    private function last_login_is_recent ()
    {
        if (!isset($this->last_login)) {
            return false;
            //Comproamos que si está el dato de last login, más el tiempo que tenemos como máximo, si esto es menor
            // que la fecha actual entonces el tiempo desde la sesión anterior es muy largo y supera el máximo.
        } elseif (($this->last_login + self::MAX_LOGIN_AGE) < time()) {

        } else {
            return true;
        }
    }

//Quereos saber si el último login ha sido antes de un día o no

    public function logout ()
    {
        unset($this->admin_id);
        unset($this->username);
        unset($this->last_login);
        unset($_SESSION['admin_id']);
        unset($_SESSION['username']);
        unset($_SESSION['last_login']);
        return true;
    }
//Quiero llamar a este método ya sea pasándole un mensaje o sin él, y para eso, que se ponga por defecto un string vacío.
//Si viene un mensaje lo metemos en la sesión y devolvemos un true y si viene vacío, devolvemos en la sesión el mensaje.

    public function message ($message = "")
    {
        if (!empty($message)) {
            //Then this is a set message
            $_SESSION['message'] = $message;
            return true;
        } else {
            //This is a get message, si no viene con parámetro la llamada al método,  mandamos lo que tengamos en la sesión como mensaje
            //Pero puede estar vacío, entonces asegurarnos que en ese caso mandamos una cadena vacia.
            return $_SESSION['message'] ?? '';
        }

    }

    public function clear_message ()
    {
        unset($_SESSION['message']);
    }

}