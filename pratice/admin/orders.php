<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Order List</h1>
	<ul class="menu">
		<li><a href="book-list.php">Manage Book</a></li>
		<li><a href="cat-list.php">Manage categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>

	<?php 
	include("confs/config.php");
	$orders = mysqli_query($conn,"SELECT * FROM orders");
	 ?>

	<ul class="orders">
		<?php while($order = mysqli_fetch_assoc($orders)): ?>
			<?php if($order['status']): ?>
				<li class="delieved">
					<?php else: ?>
				<li>
			<?php endif; ?>

			<div class="order">
				<b><?php echo $order['name'] ?></b>
				<i><?php echo $order['emial'] ?></i>
				<span><?php echo $order['phone'] ?></span>
				<p><?php echo $order['address'] ?></p>

				<?php if($order['status']): ?>
					<a href="order-status.php?id=<?php echo $order['id'] ?>&status=0" >Undo</a>
					<?php else: ?>
						<a href="order-status.php?id=<?php echo $order['id'] ?>&status=1" >Mark as delievered</a>
				<?php endif; ?>
			</div>
			<div class="item">
				<?php 
				$order_id = $order['id'];
				$items = mysqli_query($conn,"SELECT order_items.*, food.title FROM order_items LEFT JOIN food ON order_items.food_id = food.id WHERE order_items.order_id = $order_id");
				while($item = mysqli_fetch_assoc($items)):
				 ?>
				 <b>
				 	<a href="../food-detail.php?id = <?php echo $item['food_id']?>">
				 		<?php echo $item['item'] ?>
				 	</a>
				 	(<?php echo $item['qty'] ?>)
				 </b>

				<?php endwhile; ?>
			</div>
		</li>
	<?php endwhile; ?>
	</ul>


</body>
</html>