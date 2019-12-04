<?php
require("constants.php");
//Creates a database connection
$connection = mysqli_connect("DB_SERVER", "DB_USER", "DB_PASS","DB_NAME");
if(!$connection){
    die("Database connection failed: ") . mysqli_error();
}
