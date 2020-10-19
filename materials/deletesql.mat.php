<?php
include_once 'dbhandler.mat.php';
#include_once '../stuff-php/mobile-stuff.php';
# if (isset($_GET['delete'])) {
    $sql = "DELETE FROM stuff_list WHERE stuffID='" . $_GET["stuffID"] . "'";
    mysqli_query($connect,$sql);
    echo 'Deleted!!';
    echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
    