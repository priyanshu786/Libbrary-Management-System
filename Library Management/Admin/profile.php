<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper
		{
			width: 500px;
			margin: 0 auto;
			height: 480px;
			background-color: #00203FFF;
		}
	</style>
</head>
<body style="background-color: #ADEFD1FF;">
	<div class="container">
		<form action="" method="POST">
			<button class="btm btn-success" style="float: right; width: 100px; height: 35px;" name="submit1">
				Edit Profile
			</button>
		</form>
		<div class="wrapper">
			<?php
				$q = mysqli_query($db,"SELECT * from admin where username='$_SESSION[login_user]';");
			?>
			<br>
			<h2 style = "text-align: center; color: white; font-family: times; font-size: 35px;">My Profile</h2>
			<?php
				$row = mysqli_fetch_assoc($q);
				echo "<div style='text-align: center'>";
				echo "<div><img class='img-circle profile_img' height = 130px; width = 130px; src='Images/".$_SESSION['pic']."'></div>";
			?>
			<div style="text-align: center; font-size: 20px; color: white;"><b>Welcome</b>
				<h4>
					<?php 
						echo $_SESSION['login_user']; 
					?>
				</h4>
			</div>
			<?php
				echo "<b style='color: white'>";
				echo "<table class = 'table'>";
				echo "<tr>"; 
					echo "<td>"; echo "<b>First Name :</b>"; echo "</td>"; 
					echo "<td>"; echo $row['firstname']; echo "</td>"; 
				echo "</tr>";
				echo "<tr>"; 
					echo "<td>"; echo "<b>Last Name :</b>"; echo "</td>"; 
					echo "<td>"; echo $row['lastname']; echo "</td>"; 
				echo "</tr>";
				echo "<tr>"; 
					echo "<td>"; echo "<b>User Name :</b>"; echo "</td>"; 
					echo "<td>"; echo $row['username']; echo "</td>"; 
				echo "</tr>";
				echo "<tr>"; 
					echo "<td>"; echo "<b>Pasword :</b>"; echo "</td>"; 
					echo "<td>"; echo $row['password']; echo "</td>"; 
				echo "</tr>";
				echo "</tr>";
				echo "</b>";
			?>
		</div>
	</div>
</body>
</html>