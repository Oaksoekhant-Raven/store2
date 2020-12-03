<!DOCTYPE html>
<html>
<head>
	<title>Food edit</title>
	<link rel="stylesheet" type="text/css" href="color/style.css">
</head>
<body>
	<?php 
	include("confs/config.php");
	$id = $_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM app WHERE id = $id" );
	$row = mysqli_fetch_assoc($result);
	?>

	<h1>Edit food</h1>

	<form action="food-update.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $row['id']?>">


	<label for="title">Food title</label>
	<input type="text" id="title" name="title" value="<?php echo $row['title']?>">

	<label for="author">Food author</label>
	<input type="text" id="author" name="author" value="<?php echo $row['author']?>">


	<label for="sum">Summary</label>
	<textarea id="summary" name="summary"><?php echo $row['summary']?></textarea>

	<label for="price">Food price</label>
	<input type="text" id="price" name="price" value="<?php echo $row['price']?>">

	<label for="categories">Category</label>
	<select name="category_id" id="categories">
		<option value="0">---Choose---</option>

		<?php 
		$categories = mysqli_query($conn,"SELECT id,name FROM categories");
		while ($cat = mysqli_fetch_assoc($categories)):

		?>
		<option value="<?php echo $cat['id']?>"
			<?php if($cat['id'] == $row['category_id']) echo "selected" ?>>
			<?php echo $cat['name'] ?>	
		</option>
	    <?php endwhile; ?>
	</select>
	<br><br>

	<img src="covers/<?php echo $row['cover']?>" alt="" height="150">
	<label for="cover">Change cover</label>
	<input type="file" name="cover" id="cover">
	<br><br>

	<input type="submit" value="Update Food">
	<a href="food-list.php" class="back">Back</a>
	</form>
</body>
</html>