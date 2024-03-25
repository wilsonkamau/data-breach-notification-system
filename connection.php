<?php

$dbhost = "localhost";
$dbuser = "roots";
$dbpass = "";
$dbname = "data breach";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
