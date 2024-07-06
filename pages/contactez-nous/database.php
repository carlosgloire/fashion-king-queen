<?php

$host = "localhost";
$dbname = "fashion-style";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>
