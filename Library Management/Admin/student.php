<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.search
		{
			padding-left: 1050px; 
		}
		body 
		{
  			font-family: "Lato", sans-serif;
  			transition: background-color .5s;
		}

		.sidenav 
		{
		  height: 100%;
		  width: 0;
		  margin-top: 50px;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #222;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a 
		{
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.sidenav a:hover
		{
			color: #f1f1f1;
		}

		.sidenav .closebtn 
		{
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		#main 
		{
			transition: margin-left .5s;
			padding: 16px;
		}

		@media screen and (max-height: 450px) 
		{
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}
		.h:hover
		{
			color: white;
			width: 300px;
			height: 50px;
			background-color: #3cb72a;
		}
	</style>
</head>
<body>


<!-------------------------sidenav-------------------------------------------------------------------------------------------->
	
	<div id="mySidenav" class="sidenav">
 	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style = "color:white; margin-left: 60px; font-size: 30px; font-family: times;">
		<?php
		if(isset($_SESSION['login_user']))
		{
			echo "<img class='img-circle profile_img' height = 150px; width = 150px; src='Images/".$_SESSION['pic']."'>";
			echo "</br>";		
			echo "Welcome ".$_SESSION['login_user'];
		}
		?>
		<br><br>
	</div>
	<div class="h">  <a href="profile.php" style="font-family: times;">Profile</a></div>
	<div class="h">  <a href="books.php" style="font-family: times;">Books</a></div>
	<div class="h">  <a href="request.php" style="font-family: times;">Book Request</a></div>
	<div class="h">  <a href="#" style="font-family: times;">Issue Information</a></div>
	</div>

	<div id="main">
	  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Info</span>

	<script>
	function openNav() 
	{
	  document.getElementById("mySidenav").style.width = "275px";
	  document.getElementById("main").style.marginLeft = "275px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() 
	{
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
</script>


<!-----------------------------------------------------Search Bar-------------------------------------------------------------------------->
	
	<div class = "search">
		<form class="navbar-form" method = "POST" name = "form1">
				<input class = "form-control" type = "text" name = "Search" placeholder="Search Student username" required="">
				<button style = "background-color: #419ab9;"type="submit" name="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<h2>Students Record</h2>
	<?php

	if(isset($_POST['submit']))
	{
		$q = mysqli_query($db,"SELECT firstname,lastname,username,Year,roll FROM `student` where username like '%$_POST[Search]%'");
		if(mysqli_num_rows($q)==0)
		{
			echo "No record found !!! Try Searching again.";
		}
		else
		{
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #3cb72a;'>";
			echo "<th>";	echo "First Name";			echo "</th>";
			echo "<th>";	echo "Last Name";			echo "</th>";
			echo "<th>";	echo "User Name";			echo "</th>";
			echo "<th>";	echo "Year";				echo "</th>";
			echo "<th>";	echo "Roll No.";			echo "</th>";
			echo"</tr>";

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>";		echo $row['firstname'];			echo"</td>";
				echo "<td>";		echo $row['lastname'];			echo"</td>";
				echo "<td>";		echo $row['username'];			echo"</td>";
				echo "<td>";		echo $row['Year'];				echo"</td>";
				echo "<td>";		echo $row['roll'];				echo"</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else
	{
		$res = mysqli_query($db,"SELECT firstname,lastname,username,Year,roll FROM `student` ORDER BY `student`.`firstname` ASC;");

		echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color: #3cb72a;'>";
		echo "<th>";	echo "First Name";			echo "</th>";
		echo "<th>";	echo "Last Name";			echo "</th>";
		echo "<th>";	echo "User Name";			echo "</th>";
		echo "<th>";	echo "Year";				echo "</th>";
		echo "<th>";	echo "Roll No.";			echo "</th>";
		echo "</tr>";

		while($row=mysqli_fetch_assoc($res))
		{
			echo "<tr>";
			echo "<td>";		echo $row['firstname'];			echo"</td>";
			echo "<td>";		echo $row['lastname'];			echo"</td>";
			echo "<td>";		echo $row['username'];			echo"</td>";
			echo "<td>";		echo $row['Year'];				echo"</td>";
			echo "<td>";		echo $row['roll'];				echo"</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>
</html>