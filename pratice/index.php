<?php 
session_start();
include("admin/confs/config.php");

$cart = 0;
if(isset($_SESSION['cart'])) {
	foreach($_SESSION['cart'] as $qty) {
		$cart += $qty;
	}
 }
 if(isset($_GET['cat'])) {
 	$cat_id = $_GET['cat'];
 	$food = mysqli_query($conn,"SELECT * FROM app WHERE category_id = $cat_id");
 } else {
 	$food = mysqli_query($conn,"SELECT * FROM app");

 }
 $cats = mysqli_query($conn,"SELECT * FROM categories")
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Food Store</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	<h1>Food Store</h1>

 	<div class="info">
 		<a href="view-cart.php">
 			(<?php echo $cart ?>)food in your cart
 		</a>
 	</div>

 	<div class="sidebar">
 		<ul class="cats">
 			<li>
 				<b><a href="index.php">All categories</a></b>
 			</li>
 			<?php while($row = mysqli_fetch_assoc($cats)): ?>
 			<li>
 				<a href="index.php?cat=<?php echo $row['id']?>">
 					<?php echo $row['name'] ?>
 				</a>
 			</li>
 		    <?php endwhile; ?>
 		</ul>
 	</div>
 	<div class="main">
 		<ul class="books">
 			<?php while($row = mysqli_fetch_assoc($food)): ?>
 			<li>
 				<img src="admin/covers/<?php echo $row['cover']?>" height="150">
 				<b>
 					<a href="food-detail.php?id=<?php echo $row['id']?>">
 						<?php echo $row['title'] ?>
 					</a>
 				</b> 
 				<i><?php echo $row['price'] ?></i>
 				<a href="add-to-cart.php?id=<?php echo $row ['id'] ?>" class="add-to-cart">Add to cart</a>
 				
 			</li>
 		<?php endwhile; ?>
 		</ul>
 	</div>

 	<div class="footer">
 		&copy; <?php echo date("Y") ?>.All right reserved
 		
 	</div>
 
 </body>
 </html>
