<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<style type="text/css">
		body
		{
			background-color: #F2AA4CFF;
		}
		.wrapper
		{
			margin: 50px auto;
			width: 400px;
			height: 400px;
			background-color: #101820FF;
			padding-top: 5px;
		}
		.form-control
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class = "wrapper">
		<h1 style = "text-align: center; color: white; font-size: 40px;font-family: times;">Library Management System</h1>
		<h1 style = "text-align: center; color: white; font-size: 20px;font-family: Lucida Console;">Change your password</h1>
		<div style="padding-left: 50px;">
		<form action="" method="POST"><br><br>
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class = "btn btn-default" type="submit" name="submit"><b>Update</b></button>
		</form>
		</div>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' where username='$_POST[username]'"))
			{
				?>
					<script type="text/javascript">
						alert("The Password Updated Successfully !!!");
					</script>
				<?php
			}
		}
	?>
</body>
</html>