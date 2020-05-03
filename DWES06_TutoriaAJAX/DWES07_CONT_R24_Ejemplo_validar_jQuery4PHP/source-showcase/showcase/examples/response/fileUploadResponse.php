<?php
sleep(3);
if (isset($_FILES['file'])) {
    if ((int)$_FILES['file']['error'] == UPLOAD_ERR_OK) {
        echo '<b>Name:</b>' . $_FILES['file']['name'] . '<br>';
        echo '<b>Type:</b>' . $_FILES['file']['type'] . '<br>';
        echo '<b>Size:</b>' . $_FILES['file']['size'];
    } else {
        echo '<b>An error has occurred<b>' . '<br>';
        echo '<b>Error Number:<b>' . $_FILES['file']['error'] . '<br>';
    }
} else {
    echo 'Please select a file';
}
?>