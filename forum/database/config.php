<?php 
require('database.php');
require(__DIR__ . '/../system/utils/functions.php');
try {
    $mysqli = mysqli_connect(WALI_DHOST, WALI_DUSER, WALI_DPASS, WALI_DNAME);
} catch (Exception $e) {
    //throw $th;
    echo("An error occured connecting to mysql server" . $e->getMessage());
}
?>