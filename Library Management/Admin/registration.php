<?php
	include "connection.php";
	include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
		section
		{
			margin-top: -20px;
		}
	</style>
</head>
<body>
<section>
	<div class="reg_img">	
		<br>
		<div class = "box2">
			<h1 style = "text-align: center; color: white; font-size: 35px;font-family: times;">Library Management System</h1>
			<h1 style = "text-align: center; color: white; font-size: 25px;">Registration Form</h1>
			<form name="login" action = "" method = "POST">
				<div class="login">
				<input class= "form-control" type="text" name="firstname" placeholder="FirstName" required=""><br>
				<input class= "form-control" type="text" name="lastname" placeholder="LastName" required=""><br>
				<input class= "form-control" type="text" name="username" placeholder="Username" required=""><br>
				<input class= "form-control" type="password" name="password" placeholder="Password" required=""><br>
				<input class = "btn btn-success" type="submit" name="submit" value = "Register" style = " height: 35px; 
				width : 90px;">		
			</div>
			</form>
	</div>
</section>

<?php

	if(isset($_POST['submit']))
	{
		$count = 0;
		$sql = "SELECT username from `admin` ";
		$res = mysqli_query($db,$sql);

		while($row=mysqli_fetch_assoc($res))
		{
			if($row['username']==$_POST['username'])
			{
				$count = $count + 1;
			}
		}
		if($count==0)
		{
			mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[firstname]','$_POST[lastname]','$_POST[username]',
				'$_POST[password]','pic6.png'); ");
			?>
			<script type="text/javascript">
				alert("Registration successful !!");
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("The username already exists !!");
			</script>
			<?php
		}
	}

?>
</body>
</html>