<?php

require_once('../../../private/initialize.php');

require_login();


if (is_post_request()) {

    //Creamos un array asociativo para enviar como argumento para crear el objeto.
    // Create record using post parameters
    //Usando en el formulario en name la notación de array: name[campo] consigues crear un único array donde mandas
    // toda la información y la puedes rescatar de una vez todos ellos
    $args = $_POST['bicycle'];
    /*$args['brand'] = $_POST['brand'] ?? NULL;
    $args['model'] = $_POST['model'] ?? NULL;
    $args['year'] = $_POST['year'] ?? NULL;
    $args['category'] = $_POST['category'] ?? NULL;
    $args['color'] = $_POST['color'] ?? NULL;
    $args['gender'] = $_POST['gender'] ?? NULL;
    $args['price'] = $_POST['price'] ?? NULL;
    $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
    $args['condition_id'] = $_POST['condition_id'] ?? NULL;
    $args['description'] = $_POST['description'] ?? NULL;*/

    //Vamos a crear un nuevo objeto con los argumentos de arriba
    $bicycle = new BicycleP(($args));
    $result = $bicycle->save();

    //Ahora tenemos que coger este objeto en memoria y decirle que se grabe en la base de datos con el método que está en
    // la calse bici que sabe como meterlo en SQL y crearlo


    if ($result === true) {
        $new_id = $bicycle->id;
        $session->message('The bicycle was created successfully.');
        redirect_to(url_for('/staff/bicycles/show.php?id=' . $new_id));
    } else {
        // show errors
    }

} else {
    // display the form
    $bicycle = new BicycleP();
}

?>

<?php $page_title = 'Create Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

    <div class="bicycle new">
        <h1>Create Bicycle</h1>

        <?php //Mostramos los errores que nos aparezcan si los hay.
        echo display_errors($bicycle->errors); ?>

        <form action="<?php echo url_for('/staff/bicycles/new.php'); ?>" method="post">

            <?php include('form_fields.php'); ?>

            <div id="operations">
                <input type="submit" value="Create Bicycle"/>
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
