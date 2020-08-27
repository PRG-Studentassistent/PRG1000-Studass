<?php


$servername = "92.220.179.219";
$username = "Hans";
$password = "23011998";
$dbname = "prg1000";

global $db;
$db = mysqli_connect($servername, $username, $password, $dbname);
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
?>


