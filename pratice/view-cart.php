<?php 
session_start();
if(!isset($_SESSION['cart'] )) {
	header("location: index.php");
	exit();
}
include("admin/confs/config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Cart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>View Cart</h1>
	<div class="sidebar">
		<ul class="cats">
			<li><a href="index.php">&laquo; Continue shopping</a></li>
			<li><a href="clear-cart.php">&times; Clear cart</a></li>		
		</ul>
	</div>

	<div class="main">
		<table>
			<tr>
				<th>Food Tile</th>
				<th>Quantity</th>
				<th>Unit price</th>
				<th>price</th>
			</tr>

			<?php 
			$total = 0;
			foreach($_SESSION['cart'] as $id => $qty):
			$result = mysqli_query($conn,"SELECT title,price FROM app WHERE id = $id");
			$row = mysqli_fetch_assoc($result);
			$total += $row['price'] * $qty;
		    ?>

		    <tr>
		    	<td><?php echo $row['title'] ?></td>
		    	<td><?php echo $qty ?></td>
		    	<td><?php echo $row['price'] ?></td>
		    	<td><?php echo $row['price'] * $qty ?></td>
		    </tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="3" align="right"><b>Total</b></td>
			<td><?php echo $total ?></td>
		</tr>
		</table>

		<div class="order-form">
			<h2>Order now</h2>

			<form action="submit-order.php" method="post">

				<label for="name">Your Name</label>
				<input type="text" name="name" id="name">

				<label for="eamil">Email</label>
				<input type="text" name="email" id="email">

				<label for="phone">Phone Number</label>
				<input type="text" name="phone" id="phone">

				<label for="Address">Address</label>
				<textarea name="address" id="address"></textarea>

				<br><br>

				<input type="submit" value="submit-order">
				<a href="index.php">Continue shopping</a>	
			</form>
			
		</div>


	</div>
	<div class="footer">
          &copy; <?php echo date("Y") ?>. All right reserved.
    </div>

</body>
</html>
