<?php

//Si no estoy logado que nos redireccione a la página index, tendremos que llamar a esta función en todas las páginas
// que sean de acceso resitringido a usuarios. Si lo ponemos en inicializar aplicaria a todos, por lo que hay que hacerlo uno por uno.
function require_login ()
{
    //Como el objeto sesión está fuera del ámbito de este fichero, utilizamos global para hacerlo global y poder acceder.
    global $session;
    if (!$session->is_logged_in()) {
        redirect_to(url_for('/staff/login.php'));
    }
}

function display_errors ($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}


//Muestra mensajes de sesión
function display_session_message ()
{
    //Tenemos que llamar a global para poder acceder al objeto de la sesión
    global $session;
    //Nos guardamos el mensaje en una variable
    $msg = $session->message();
    if (isset($msg) && $msg != '') {
        //Borramos el mensaje
        $session->clear_message();
        return '<div id="message">' . h($msg) . '</div>';
    }
}

?>
