<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

    <div id="page">
        <div class="intro">
            <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>"/>
            <h2>Our Inventory of Used Bicycles</h2>
            <p>Choose the bike you love.</p>
            <p>We will deliver it to your door and let you try it before you buy it.</p>
        </div>

        <table id="inventory">
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Category</th>
                <th>Gender</th>
                <th>Color</th>
                <th>Price</th>
                <th><&nbsp;</th>
            </tr>
            <?php

            //El array Bikes se va a llenar con los objetos que va recogiendo que le manda el método find all directamente
            // desde la base de datos en la Clase de la Bici.
            $bikes = BicycleP::find_all();
            ?>

            <!-- Recorremos el array de objetos bicis: Bicikes como bike y ahora ya sacamos los atributos de la instancia
            y se van pintando todos los del array -->
            <?php foreach ($bikes as $bike) { ?>

                <tr>
                    <!--Importante, usar funcion h para hacer un scape a HTML de forma segura -->
                    <td><?php echo h($bike->brand); ?></td>
                    <td><?php echo h($bike->model); ?></td>
                    <td><?php echo h($bike->year); ?></td>
                    <td><?php echo h($bike->category); ?></td>
                    <td><?php echo h($bike->gender); ?></td>
                    <td><?php echo h($bike->color); ?></td>
                    <td><?php echo h(money_format('$%i', $bike->price)); ?></td>
                    <!-- //Incluímos un link para que nos lleva a la página con ID del objeto que queremos ver en detalle -->
                    <td><a href="detail.php?id=<?php echo h($bike->id); ?>"> View</a></td>
                </tr>
            <?php } ?>

        </table>

    </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
