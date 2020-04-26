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

            //Ponemos la paginación al principio
            //Para saber en qué pagina estamos vamos a cogerlo de la superglobal get de la URL de la página. Si no hay dato, asumimmos que es 1
            $current_page = $_GET['page'] ?? 1;
            //Definimos cuántos records queremos ver
            $per_page = 5;
            //Llamamos a un SQL statement para sacar cuántos registros hay en cada tabla.
            $total_count = BicycleP::count_all();

            //Creamos el objeto paginación
            $pagination = new Pagination($current_page, $per_page, $total_count);

            //Construimos el SQL con las sentencias LIMIT y OFFSET
            //LIMIT: If a limit count is given, no more than that many rows will be returned (but possibly less, if the query
            // itself yields less rows). LIMIT ALL is the same as omitting the LIMIT clause.
            //OFFSET: clauses to limit the number of rows returned by a query. OFFSET says to skip that many rows before beginning
            // to return rows. OFFSET 0 is the same as omitting the OFFSET clause. If both OFFSET and LIMIT appear, then OFFSET
            // rows are skipped before starting to count the LIMIT rows that are returned
            $sql = "SELECT * FROM bicycles ";
            $sql .= "LIMIT {$per_page} ";
            $sql .= "OFFSET {$pagination->offset()}";
            $bikes = BicycleP::find_sql($sql);

            //El array Bikes se va a llenar con los objetos que va recogiendo que le manda el método find all directamente
            // desde la base de datos en la Clase de la Bici.
            //$bikes = BicycleP::find_all();
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
        <?php
        $url = url_for('bicycles.php');
        echo $pagination->page_links($url);
        ?>

    </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
