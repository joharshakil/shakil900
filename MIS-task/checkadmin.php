<?php

require_once("includes/config.inc.php");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't Connect: " . mysqli_connect_error());
session_start();
$adminuser = $_POST['username'];
$adminpass = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username = '".$adminuser."' AND password = '".$adminpass."' ";
$query = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
$result = mysqli_fetch_array($query,MYSQLI_BOTH);
//$_SESSION start();
$_SESSION['id'] = $result['admin_id'];
echo $_SESSION['id'];

if($adminuser == $result['username'] && $adminpass == $result['password'])
{
	$mysqli->close();
	header('Location: index.php');
}
else
{
	$_SESSION['error'] = "Incorrect Username / Password";
	$mysqli->close();
	
	header('Location: adminlogin.php');
}



?>