<?php

$sName = "localhost";
$uName = "root";
$pass = "";

$db_name = "sbobinax_test";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

