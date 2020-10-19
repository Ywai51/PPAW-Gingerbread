<?php
$lh = "localhost";
$un = "root";
$pa = "";
$ta = "my_stuff_list";
$connect = mysqli_connect($lh, $un, $pa, $ta);
if (!$connect) {
    die("Connection Failed".mysqli_connect_error());
}