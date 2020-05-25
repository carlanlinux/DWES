<?php //Cargamos la página de inicializar que está en la carpeta privada
require_once('../private/initialize.php');
?>

<?php //Carga la cabecera que está dentro de la carpeta privada en las compartidas. Se encarga básicamente de cambiar
// el titulo de la página
include(SHARED_PATH . '/public_header.php'); ?>


<div id="main">

    <ul id="menu">
        <li><a href="<?php echo url_for('/bicycles.php'); ?>">View Our Inventory</a></li>
        <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>

    </ul>

</div>

<?php $super_hero_image = 'AdobeStock_18040381_xlarge.jpeg'; ?>

<?php //Carga el footer
include(SHARED_PATH . '/public_footer.php'); ?>


