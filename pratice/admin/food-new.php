<!DOCTYPE html>
<html>
<head>
	<title>Food new</title>
	<link rel="stylesheet" type="text/css" href="color/style.css">
	<style type="text/css">
		form label {
           display: block;
           margin-top: 8px;
        }

	</style>
</head>
<body>
	<?php include("confs/auth.php") ?>
	<h1>New Food</h1>

	<form action="food-add.php" method="post" enctype="multipart/form-data">
	  <label for="title">Food title</label>
	  <input type="text" id="title" name="title">

	  <label for="author">Food author</label>
	  <input type="text" id="author" name="author">


	  <label for="summary">Summary</label>
	  <textarea id="summary" name="summary"></textarea>

	  <label for="price">Food price</label>
	  <input type="text" id="price" name="price">

	  <label for="categories">Category</label>
	  <select name="category_id" id="categories">
		<option value="0">---Choose---</option>
	     <?php 
	    	include("confs/config.php");
	    	$result = mysqli_query($conn, "SELECT id, name FROM categories");
	    	while($row = mysqli_fetch_assoc($result)): ?>
	    	<option value="<?php echo $row['id'] ?>">
	    		<?php echo $row['name'] ?>	    		
	    	</option>
	     <?php endwhile; ?> 
	  </select>

	<label for="cover">Cover</label>
	<input type="file" name="cover" id="cover">
    <br><br>

    <input type="submit" value="Add food">
    <a href="food-list.php" class="back">Back</a>

    </form>


</body>
</html>