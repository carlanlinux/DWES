<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php


// Find all admins
//$admins = Admin::find_all();

//Ponemos la paginación al principio
//Para saber en qué pagina estamos vamos a cogerlo de la superglobal get de la URL de la página. Si no hay dato, asumimmos que es 1
$current_page = $_GET['page'] ?? 1;
//Definimos cuántos records queremos ver
$per_page = 5;
//Llamamos a un SQL statement para sacar cuántos registros hay en cada tabla.
$total_count = Admin::count_all();

//Creamos el objeto paginación
$pagination = new Pagination($current_page, $per_page, $total_count);

//Construimos el SQL con las sentencias LIMIT y OFFSET
//LIMIT: If a limit count is given, no more than that many rows will be returned (but possibly less, if the query
// itself yields less rows). LIMIT ALL is the same as omitting the LIMIT clause.
//OFFSET: clauses to limit the number of rows returned by a query. OFFSET says to skip that many rows before beginning
// to return rows. OFFSET 0 is the same as omitting the OFFSET clause. If both OFFSET and LIMIT appear, then OFFSET
// rows are skipped before starting to count the LIMIT rows that are returned
$sql = "SELECT * FROM admins ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$admins = Admin::find_sql($sql);

?>
<?php $page_title = 'Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <div class="admins listing">
        <h1>Admins</h1>

        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/admins/new.php'); ?>">Add Admin</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Username</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($admins as $admin) { ?>
                <tr>
                    <td><?php echo h($admin->id); ?></td>
                    <td><?php echo h($admin->first_name); ?></td>
                    <td><?php echo h($admin->last_name); ?></td>
                    <td><?php echo h($admin->email); ?></td>
                    <td><?php echo h($admin->username); ?></td>
                    <td><a class="action"
                           href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin->id))); ?>">View</a></td>
                    <td><a class="action"
                           href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin->id))); ?>">Edit</a></td>
                    <td><a class="action"
                           href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin->id))); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- //AQuí ponemos los links de paginación -->

        <?php
        $url = url_for('/staff/admins/index.php');
        echo $pagination->page_links($url);
        ?>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
