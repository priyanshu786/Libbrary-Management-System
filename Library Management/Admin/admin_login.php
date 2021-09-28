<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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
	<div class="log_img">	
		<br>
		<div class = "box1">
			<h1 style = "text-align: center; color: white; font-size: 35px;font-family: times;">Library Management System</h1>
			<h1 style = "text-align: center; color: white; font-size: 25px;">Admin Login</h1><br>
			<form name="login" action = "" method = "POST">
			<div class="login">
				<input class = "form-control" type="text" name="username" placeholder="Username" required=""> <br>
				<input class = "form-control" type="password" name="password" placeholder="Password" required=""> <br>
				<input class = "btn btn-primary" type="submit" name="submit" value = "Login" style = " height: 35px; 
				width : 70px;">
			</div>
			<p style = "text-decoration: none;color:white; padding-left: 20px;">
				<br>
				<a style="text-decoration: none;color:white">New Admin ?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<a style="text-decoration: none;color:white;"href="update_password.php"> Forgot Password ?</a>
				<br><a style="text-decoration: none;color:white;" href="registration.php">Sign Up</a>
			</p>
			</form>
		</div>
</section>
<?php
	if(isset($_POST['submit']))
	{
		$count = 0;
		$res = mysqli_query($db,"SELECT * FROM `admin` where username = '$_POST[username]' && password = '$_POST[password]';");
		$row = mysqli_fetch_assoc($res);

		$count = mysqli_num_rows($res);
		if($count==0)
		{
			?>
				<script type="text/javascript">
					alert("Your password does not match !!");
				</script>
			<?php
		}
		else
		{
			$_SESSION['login_user'] = $_POST['username'];
			$_SESSION['pic'] = $row['pic'];
			?>
				<script type="text/javascript">
					window.location = "index.php";
				</script>
			<?php
		}
	}
?>
</body>
</html>