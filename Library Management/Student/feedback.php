<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			background-image: url("Images/pic5.jpg");
		}
		.wrapper
		{
			padding :10px;
			margin : 20px auto;
			width : 930px;
			height : 550px;
			background-color: black;
			opacity : 0.6;
			color : white;
		}
		.form-control
		{
			width: 910px;
			height: 80px;
		}
		.scroll
		{
			width: 100%;
			height: 300px;
			overflow: auto;
		}
	</style>
</head>
<body>
	<div class = "wrapper ">
		<h4> If you have any suggestions feel free to write :) </h4>
		<form style = "" action = "" method = "POST"> 
			<input class = "form-control" type = "text" name = "comment" placeholder = "Suggestions..." required=""><br>
			<input class = "btn btn-primary" type = "submit" name = "submit" value = "Post" style="width: 100px; height: 35px;">
		</form>	
		<br><br>
	<div class = "scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `feedback` VALUES('','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
					$res = mysqli_query($db,$q);
					echo "<table class = 'table table-bordered'>";
					while($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
							echo "<td>";	echo $row['comment'];	echo "</td>";
						echo "</tr>";
					} 
				}
			}
			else
			{
				$q = "SELECT * FROM `feedback` ORDER BY `feedback`.`id` DESC";
				$res = mysqli_query($db,$q);
				echo "<table class = 'table table-bordered'>";
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";
						echo "<td>";	echo $row['comment'];	echo "</td>";						
					echo "</tr>";
				} 
			}
		?>
	</div>
</div>
</body>
</html>
