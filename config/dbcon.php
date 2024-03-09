<?php


$serverName = "localhost:3307";
$userName = "root";
$password = "";
$dbName = "beautyparlour";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
    die("Connection failed:" . mysqli_connect_error());
}

?>