<?php
if ($_REQUEST['user'] == 'admin' && $_REQUEST['pass'] == 'admin') {
    echo '<div style="color:green">Authenticated</div>';
} else {
    echo '<div style="color:red">Try again</div>';
}