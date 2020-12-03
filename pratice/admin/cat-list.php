<!DOCTYPE html>
<html>
<head>
	<title>Category-list</title>
</head>
<body>
	<?php include("confs/auth.php") ?>
	<h1>Categry LIst</h1>

	<?php 
	include("confs/config.php"); 
	$result = mysqli_query($conn,"SELECT * FROM categories");
	?>

	<ul>
		<?php while ($row = mysqli_fetch_assoc($result)): ?>

			<li title="<?php echo $row['remark'] ?>">
				[<a href="cat-dele.php?id=<?php echo $row['id']?>" class="del">Del</a>]
				<a href="cat-edit.php?id=<?php echo $row['id']?>" class="edit">Edit</a>
				<?php echo $row['name'] ?>	
			</li>
		<?php endwhile; ?>
	</ul>

	<a href="cat-new.php" class="new">Add Category</a>





</body>
</html>