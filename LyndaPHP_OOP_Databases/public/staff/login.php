<?php
require_once('../../private/initialize.php');

//Ponemos las variables a 0, error y los datos del login.
$errors = [];
$username = '';
$password = '';

//Si acabamos de enviar el formulario entones haz las cosas.
if (is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if (is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if (is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if (empty($errors)) {
        $admin = Admin::find_by_username($username);
        // test if admin found and password is correct
        if ($admin != false && $admin->verify_password($password)) {
            // Mark admin as logged in, tenemos que llamar al método login de la sesión que hemos creado en initialize.
            $session->login($admin);
            redirect_to(url_for('/staff/index.php'));
        } else {
            // username not found or password does not match
            $errors[] = "Log in was unsuccessful.";
        }

    }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <h1>Log in</h1>

    <?php echo display_errors($errors); ?>

    <form action="login.php" method="post">
        Username:<br/>
        <input type="text" name="username" value="<?php echo h($username); ?>"/><br/>
        Password:<br/>
        <input type="password" name="password" value=""/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
