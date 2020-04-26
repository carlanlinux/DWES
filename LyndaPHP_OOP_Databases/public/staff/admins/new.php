<?php

require_once('../../../private/initialize.php');

require_login();

//Si es una post request
if (is_post_request()) {

    // Cogemos los argumentos del formulario que están dentro del array admin los guardamos
    $args = $_POST['admin'];
    //Creamos un nuevo usuario admin con los argumentos y lo guardamos en la variable admin.
    $admin = new Admin($args);
    //Hasheamos la contraseña antes de guardar en base de datos y lo guardamos en su propiedad $admin->set_hashed_password();
    //Se podría hacer así pero se puede automatizar si modificamos en la clase los métodos create y update para que quede transparente
    //Guardamos en la base de datos la info del nuevo usuario.
    $result = $admin->save();

    //Pasamos el mensaje a la sesión
    if ($result === true) {
        $new_id = $admin->id;
        $session->message('The admin was created successfully.');
        redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
    } else {
        // show errors
    }

} else {
    // display the form
    $admin = new Admin;
}

?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

    <div class="admin new">
        <h1>Create Admin</h1>

        <?php echo display_errors($admin->errors); ?>

        <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Create Admin"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
