<?php 

session_start();

$name = $POST['name'];
$password = $POST['password'];

if ($name = "oak" && $password = "1234") {
	$_SESSION['auth'] = true;
	header("location: food-list.php");
} else {
	header("location: index.php");
}