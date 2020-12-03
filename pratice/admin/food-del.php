<?php 

include("confs/config.php");

$id = $_GET['id'];
$sql = "DELETE  FROM app WHERE id = $id";
mysqli_query($conn,$sql);

header("location: food-list.php");