<?php

$sName = "localhost"; // server name per MySQL
$uName = "root"; // username per MySQL
$pass = ""; // password per MySQL

$db_name = "sbobine"; // nome del database

// NON MODIFICARE NULLA QUI SOTTO!!!

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

if (!$conn) {
    echo "Connection failed!";
}
?>

