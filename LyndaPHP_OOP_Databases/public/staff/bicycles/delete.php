<?php

require_once('../../../private/initialize.php');

require_login();

//Si es un get request con un ID entonces sale el mensae de si quieres borrarlo si no volvemos a mandar a index

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}
//Si es un get request con un ID entonces sale el mensae de si quieres borrarlo.
$id = $_GET['id'];
//Buscamos el ID, buscamos la bici y la instanciamos.
$bicicle = BicycleP::find_by_id($id);
//si no encuentra ninguna la volvemos a mandar a la página de index.
if ($bicicle == false) redirect_to(url_for('/staff/bicycles/index.php'));


//El delete se da como post request cuando el usuario le da al botón de borrar. Entonces cuando sea una request post
// entonces es cuando procedemos a borrar.
if (is_post_request()) {

    // Delete bicycle y poner mensaje en la sesión
    $bicicle->delete();
    $session->message('The bicycle was deleted successfully.');

    redirect_to(url_for('/staff/bicycles/index.php'));

} else {
    // Display form
}

?>

<?php $page_title = 'Delete Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

    <div class="bicycle delete">
        <h1>Delete Bicycle</h1>
        <p>Are you sure you want to delete this bicycle?</p>
        <p class="item"><?php echo h($bicicle->name()); ?></p>

        <form action="<?php echo url_for('/staff/bicycles/delete.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Bicycle"/>
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
