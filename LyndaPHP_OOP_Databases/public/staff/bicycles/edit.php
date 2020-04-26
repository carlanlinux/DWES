<?php

require_once('../../../private/initialize.php');

require_login();

//Si no hay por get un ID en la URL lo devolvemos al index
if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}
//Cogemos por get el ID que recibimos de la página anterior
$id = $_GET['id'];
//Con ese ID lo que hacemos es crear un objeto bicicleta buscándolo por ID llamando al método estático find_by_id
$bicycle = BicycleP::find_by_id($id);
if ($bicycle == false) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}

//si es un post request, lo que hacemos es mandar el formulario y actualizarlo en el objeto
if (is_post_request()) {

    // Save record using post parameters
    //Usando en el formulario en name la notación de array: name[campo] consigues crear un único array donde mandas
    // toda la información y la puedes rescatar de una vez todos ellos
    $args = $_POST['bicycle'];
    /* $args['brand'] = $_POST['brand'] ?? NULL;
     $args['model'] = $_POST['model'] ?? NULL;
     $args['year'] = $_POST['year'] ?? NULL;
     $args['category'] = $_POST['category'] ?? NULL;
     $args['color'] = $_POST['color'] ?? NULL;
     $args['gender'] = $_POST['gender'] ?? NULL;
     $args['price'] = $_POST['price'] ?? NULL;
     $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
     $args['condition_id'] = $_POST['condition_id'] ?? NULL;
     $args['description'] = $_POST['description'] ?? NULL;*/

    //Creamos un método que lo que haga sea coger estos valores del formulario y no los que nos ha devuelto la BD inicialmente
    $bicycle->merge_attributes($args);
    //Llamamos al método para que con estos valores que tiene ahora mi objeto actualice la base de datos.
    $result = $bicycle->save();

    //Guardamos los mensajes en la sesión para mostrarlos posteriormente con la funciones del fichero status_functions
    if ($result === true) {
        $session->message('The bicycle was updated successfully.');
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $id));
    } else {
        // show errors
    }

} else {

    // display the form
    $bicycle = BicycleP::find_by_id($id);
    if ($bicycle == false) {
        redirect_to(url_for('/staff/bicycles/index.php'));
    }
}

?>

<?php $page_title = 'Edit Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

    <div class="bicycle edit">
        <h1>Edit Bicycle</h1>

        <?php //Mostramos los errores que nos aparezcan si los hay.
        echo display_errors($bicycle->errors); ?>

        <form action="<?php echo url_for('/staff/bicycles/edit.php?id=' . h(u($id))); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Edit Bicycle"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
