<?php
$hostName="localhost";
$dbMine = "root";
$dbPassword = "paul123456";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbMine, $dbPassword, $dbName);
if (!$conn) {
    die("Somthing went wrong;");
}
?>