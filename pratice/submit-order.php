<?php 
session_start();
include("admin/confs/config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

mysqli_query($conn,"INSERT INTO orders (name,email,phone,address,status,created_date,modified_date) VALUES 
	('$name','$email','$phone','$address',0,now(),now() )");

	$order_id = mysqli_insert_id($conn);
	foreach($_SESSION['cart'] as $id => $qty) {
		mysqli_query($conn, "INSERT INTO order_items (order_id,food_id,qty) VALUES ('$order_id','$id',$qty)");
	}
	unset($_SESSION['cart']);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Submit order</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	<h1>Order Submitted</h1>
 	<div class="msg">
 		Your order have been submitted.We will deliver soon.
 		<a href="index.php" class="done">Food store</a>
 	</div>

 	<div class="footer">
 		&copy; <?php echo date("Y") ?>. All right reserved.

 	</div>
 
 </body>
 </html>