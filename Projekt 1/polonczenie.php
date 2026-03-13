<?php
$host = "127.0.0.1";
$dbname = "sklep";
$username = "root";
$password = "";

$db = mysqli_connect($host, $username, $password, $dbname);
if(!$db) error_log("Wystąpił Błąd: ". mysqli_connect_error());
?>