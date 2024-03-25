<?php

$host = "localhost";
$dbname = "data breach";
$username = "root";
$password = "willy@1221";

$mysqli = new mysqli(localhost: $localhost,username: $username,password: $password,database: $dbname);
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;