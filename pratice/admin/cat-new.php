<!DOCTYPE html>
<html>
<head>
	<title>Category List</title>
	<link rel="stylesheet" type="text/css" href="color/style.css">
	<style type="text/css">
		form label{
			display: block;
			margin-top: 8px;
		}
	</style>
</head>
<body>
	<?php include("confs/auth.php") ?>
	<h1>New Category</h1>

	<form action="cat-add.php" method="post">
		<label for="name">Category Name</label>
		<input type="text" id="name" name="name">

		<label for="remark">Remark</label>
		<input type="text" name="remark" id="remark">
		<br><br>
		<input type="submit" value="Add Category">
		
	</form>

</body>
</html>