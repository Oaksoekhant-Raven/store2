<!DOCTYPE html>
<html>
<head>
	<title>Food List</title>
	<link rel="stylesheet" type="text/css" href="color/style.css">
</head>
<body>
	<?php include("confs/auth.php") ?>
	<h1>Food List</h1>
	<?php 
	  include("confs/config.php");

	$result = mysqli_query($conn,"SELECT app.*, categories.name FROM app LEFT JOIN categories ON app.category_id = categories.id ORDER BY app.created_date DESC");
	
	?>

	 <ul class="books">
	 	<?php while($row = mysqli_fetch_assoc($result) ): ?>
	 		<li>
	 			<img src="covers/<?php echo $row['cover'] ?>"
	 			alt="" align="right" height="140">

	 			<b><?php echo $row['title'] ?></b>
	 		    <i>By <?php echo $row['author'] ?></i>
	 			<span>$<?php echo $row['price'] ?></span>
	 			<div><?php echo $row['summary'] ?></div>

	 			[<a href="food-del.php?id=<?php echo $row['id'] ?>" class="del">del</a>]
	 			[<a href="food-edit.php?id=<?php echo $row['id'] ?>">edit</a>]
	 			
	 		</li>	 		
	 	<?php endwhile; ?>
	 	
	</ul>

	 <a href="food-new.php" class="new">NEW FOOD</a>

</body>
</html>