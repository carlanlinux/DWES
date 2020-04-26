<?php


class Admin extends DatabaseObject
{
    /// PROPIEDADES //

    //Creamos la propiedad tabla la clase Admin, que es la de la bd, por lo que lo ponemos protected y estática, ya que
    // es compartida por todas las instancias
    static protected $table_name = 'admins';

    //las propiedades tienen que ser las mismas que las que tiene el objeto en la base de datos.
    static protected $db_columns = [
        'first_name',
        'last_name',
        'email',
        'username',
        'hashed_password',
    ];

    //Creamos un espejo de la tabla de la base de datos en propiedades pero incluyendo password y confirmación de la
    // contraseña además de poniendo el hash protejido ya que sólo debe tener acceso esta clase.
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    protected $hashed_password;
    //Creamos una propiedad para que nos sirva para saber cuándo se necesita la password o no, como en el caso de
    // actualizar donde si queremos cambiar algún otro dato, no siempre vamos a necesitar pedir las pass dos veces.
    protected $password_requiered = true;

    /// CONSTRUCTOR //

    public function __construct ($args = [])
    {
        foreach ($args as $key => $value) {
            //Ojo, el this ponerlo siempre con $
            if (property_exists($this, $key)) $this->$key = $value;
        }
    }

    /// FUNCIONES //

    //Función que devuelve el nombre completo del usuario

    static public function find_by_username ($username)
    {
        {
            //Dividimos la query en dos partes para poder meter el id entre comillas simples y aplicando primero el método
            //escape_string para evitar sql injections y convertir el id en string de forma segura.
            $sql = "SELECT * FROM " . static::$table_name;
            $sql .= " WHERE username='" . self::$database->escape_string($username) . "'";
            //como en el anterior nos devovlerá un array de objetos sólo que como en la SQL filtramos por uno, ese array
            // contendrá un único objeto
            $obj_array = static::find_sql($sql);
            //Si al array no está vacío queremos devolver sólo el array que se encuentra en la primera posición, eso lo
            // hacemos usando el método array_shift.
            if (!empty($obj_array)) {
                return array_shift($obj_array);
                //si no lo encuentra, devolvemos falso.
            } else {
                return false;
            }
        }
    }

    //Creamos un método para encriptar el password que recogemos del formulario, y usamos encriptación BCRYPT

    public function full_name ()
    {
        return $this->first_name . " " . $this->last_name;
    }

    //Creamos la función pública porque vamos a tener que necesitarla desde fuera. Usamos la función por defecto de PHP
    // de comprobar contraseñas con verify_password.

    public function verify_password ($password)
    {
        return password_verify($password, $this->hashed_password);
    }

    //Hacemos un override de la función de la clase padre incluyendo que nos hashee la password al princpio de la creación
    //Luego llamamos mediante parent al método create para qeu haga el resto. Lo mismo con update.
    //Incluimos un return ya que el padre devuelve true o false, nosotros queremos que nos devuelva tambien ese resultado.
    //Ojo, como en el padre son protected, al hacer el override debe ser protected también el método
    protected function create ()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function set_hashed_password ()
    {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //añadimos uno para buscar en la base de datos, el mismo que findbyid pero pesando los datos de username. Este lo
    // ponemos en esta clase en vez de la padre porqeu sólo lo va a utilizar los objetos admin. Tenemos que añadir esto
    // también a la función de validaciones. Esto también servirá tanto para validar como para controlar el login.

    protected function update ()
    {
        //Comprobamos si se requiere validar los campos de password o no (como en el caso de editar) Si el campo
        // password está vacío entonces nos saltamos la valiación. Y para ello cambiamos el atributo pass required a false
        if ($this->password != "") {
            //validate password y setear el hash
            $this->set_hashed_password();
        } else {
            //Skip el hasing y la validación
            $this->password_requiered = false;
        }

        return parent::update();

    }


    //Función para validar el formulario con todas las validaciones necesarias.

    protected function validate ()
    {
        $this->errors = [];

        if (is_blank($this->first_name)) {
            $this->errors[] = "First name cannot be blank.";
        } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "First name must be between 2 and 255 characters.";
        }

        if (is_blank($this->last_name)) {
            $this->errors[] = "Last name cannot be blank.";
        } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "Last name must be between 2 and 255 characters.";
        }

        if (is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email, array('max' => 255))) {
            $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Email must be a valid format.";
        }

        if (is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
            $this->errors[] = "Username must be between 8 and 255 characters.";
            //Aquí llamo al método y lepaso el username y el ID. Si no existe en este objeto ID(porque no se haya creado
            // aún, entonces le paso 0) Acordarse de ?? Cuando se pasa algo y si no existe queremos que se ponga otra cosa.
        } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
            $this->errors[] = "Username not allowed, already exists. Try Another";
        }

        //si pass_requiered es true, entonces sí validamos las contraseñas.
        if ($this->password_requiered) {
            if (is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 12))) {
                $this->errors[] = "Password must contain 12 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if (is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }
        }
        return $this->errors;
    }
}