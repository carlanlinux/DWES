<?php
//Si el método de envío es post y se envia el formulario(Para eso comprobamos el nombre del formulario y si su acción
// no está vacía, debería teneres submit
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))) {

    //Compruebas que las variables estén y las guardas
    if (isset($_POST['myname'])) $myname = $_POST['myname'];
    if (isset($_POST['mypassword'])) $mypassword = $_POST['mypassword'];
    if (isset($_POST['mypasswordconf'])) $mypasswordConf = $_POST['mypasswordconf'];
    if (isset($_POST['mycomments'])) $mycomments = filter_var($_POST['mycomments'], FILTER_SANITIZE_STRING);
    if (isset($_POST['reference'])) $reference = $_POST['reference'];
    if (isset($_POST['favoritemusic'])) $favoritemusic = $_POST['favoritemusic'];
    if (isset($_POST['requesttype'])) $requesttype = $_POST['requesttype'];

    //Cremos una variable donde controlamos los errores para en caso que los haya no mandarlo.
    $formErros = false;

    //Ponemos los errores siempre que no cumpla las condicioens y lo guardamos en una variable para luego ponerlo donde
    // corresponda en el formulario
    if ($myname === "") {
        $err_myname = '<div class="error">Sorry, your name is a requiered field</div>';
        $formErros = true;
    }
    if (strlen($mypassword) <= 6) {
        $err_mypassword = '<div class="error">Sorry, your password is too short</div>';
        $formErros = true;
    }
    if ($mypassword !== $mypasswordConf) {
        $_err_mypasswordConf = '<div class="error">La contraseña no coincide</div>';
        $formErros = true;
    }
    if (!preg_match("/[A-Za-z]+, [A-Za-z]+/", $myname)) {
        $err_patternmatch = '<div class="error">Nombre debe ser First Name, Last Name</div>';
        $formErros = true;
    }
    // ********************** SUBIDA DE FICHEROS *********************


    if (!$formErros) {
        $tmp_name = $_FILES['myprofilepix']['tmp_name'];
        $uploadfilename = $_FILES['myprofilepix']['name'];
        //Creamosu una fecha para asegurarnos que cada nombre sea único porque si no sobrescribe.
        $saveDate = date("mdy-Hms");
        //Componemos el nombre del fichero
        $newFileName = "uploads/" . $saveDate . "_" . $uploadfilename;
        //componemos la URL donde lo vamos a subir. Request URI da la URI de la página actual del root del servidor y lo
        // opnemos dentro de la función dirname para que nos devuelva el directorio
        $uploadurl = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newFileName;

        //Coge el fichero de la zona temporal a la carpeta que hemos creado en el servidor
        if (move_uploaded_file($tmp_name, $newFileName)) {
            $msg = "File uploaded";
        } else {
            //Accedemos a la superglobal fie
            $msg = "Sorry, couldnt upload your profile picture" . $_FILES['file']['error'];
            $formErros = true;
        }
    }


    // ********************** CREAMOS LA PARTE DEL ENVÍO DEL MAIL GUARDANDO LOS DATOS EN JSON PARA ENVIARLO *********************
    //Creamos un Array para guardar los datos del form
    $formData = array(
        'myname' => $myname,
        'myspassowrd' => $mypassword,
        'mypasswordconf' => $mypasswordConf,
        'reference' => $reference,
        'favoritemusic' => $favoritemusic,
        'requesttype' => $requesttype
    );


    //Comprobamos que no haya errores antes de enviar el mail
    if (!$formErros) {
        //Seteamos las variables necesarias para el envío del email.
        $to = "carlanlinux@gmail.com";
        $subject = "Fom $myname --SignUp Page";
        $message = json_encode($formData);
        $replyto = "From: fromprocessor@pepe.com\r\n" .
            "Reply-To: donotreply@pepe.com";

        //Usamos la función mail para enviar el correo
        if (mail($to, $subject, $message)) {
            $msg = "Thanks for filling out our form";
        } else {
            $msg = "Problem sending the message";
        }
    }


}


?>