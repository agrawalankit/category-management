<?php
ob_start();
session_start();

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "demo_admin";


$databaseLink = mysqli_connect($dbHost, $dbUser, $dbPass);
if($databaseLink)
{
	mysqli_select_db($databaseLink,$dbName); 
}

?>