<?php
ob_start();
session_start();

$dbHost = "#";
$dbUser = "#";
$dbPass = "#";
$dbName = "#";


$databaseLink = mysqli_connect($dbHost, $dbUser, $dbPass);
if($databaseLink)
{
	mysqli_select_db($databaseLink,$dbName); 
}

?>
