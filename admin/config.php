<?php
ob_start();
session_start();

//db settings
$db_username = 'sharewheels_nu';
$db_password = 'ZQMjphXm';
$db_name = 'sharewheels_nu';
$db_host = 'sharewheels.nu.mysql';
$con = mysqli_connect($db_host, $db_username, $db_password,$db_name);
?>
