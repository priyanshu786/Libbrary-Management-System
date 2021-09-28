<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
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
			background-color: #419ab9;
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
	<div class="h">  <a href="add.php" style="font-family: times;">Add Books</a></div>
	<div class="h">  <a href="request.php" style="font-family: times;">Book Request</a></div>
	<div class="h">  <a href="issue_info" style="font-family: times;">Issue Information</a></div>
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
<!-----------------------------------------------------Search Bar----------------------------------------------------------------------->
	
	<div class = "search" style="padding-left: 1000px;">
		<form class="navbar-form" method = "POST" name = "form1">
				<input class = "form-control" type = "text" name = "Search" placeholder="Search Book Name" required="">
				<button style = "background-color: #419ab9;"type="submit" name="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method = "POST" name = "form1">
				<input class = "form-control" type = "text" name = "bid" placeholder="Enter Book ID" required="">
				<button style = "background-color: #419ab9;"type="submit" name="submit1" class="btn btn-primary">
				<b>Delete</b></button>
		</form>
	</div>
	<h2>Books Record</h2>
	<?php

	if(isset($_POST['submit']))
	{
		$q = mysqli_query($db,"SELECT * FROM BOOKS where name like '%$_POST[Search]%'");
		if(mysqli_num_rows($q)==0)
		{
			echo "No record found !!! Try Searching again.";
		}
		else
		{
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #419ab9;'>";
			echo "<th>";	echo "ID";			echo "</th>";
			echo "<th>";	echo "Book name";	echo "</th>";
			echo "<th>";	echo "Author name";	echo "</th>";
			echo "<th>";	echo "Edition";		echo "</th>";
			echo "<th>";	echo "Status";		echo "</th>";
			echo "<th>";	echo "Quantity";	echo "</th>";
			echo "<th>";	echo "Department";	echo "</th>";
			echo "<th>";	echo "Price";		echo "</th>";
			echo "<th>";	echo "Pages";		echo "</th>";
			echo"</tr>";

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>";		echo $row['bid'];			echo"</td>";
				echo "<td>";		echo $row['name'];			echo"</td>";
				echo "<td>";		echo $row['author'];		echo"</td>";
				echo "<td>";		echo $row['edition'];		echo"</td>";
				echo "<td>";		echo $row['status'];		echo"</td>";
				echo "<td>";		echo $row['quantity'];		echo"</td>";
				echo "<td>";		echo $row['department'];	echo"</td>";
				echo "<td>";		echo $row['price'];			echo"</td>";
				echo "<td>";		echo $row['pages'];			echo"</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else
	{
		$res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color: #419ab9;'>";
		echo "<th>";	echo "ID";			echo "</th>";
		echo "<th>";	echo "Book name";	echo "</th>";
		echo "<th>";	echo "Author name";	echo "</th>";
		echo "<th>";	echo "Edition";		echo "</th>";
		echo "<th>";	echo "Status";		echo "</th>";
		echo "<th>";	echo "Quantity";	echo "</th>";
		echo "<th>";	echo "Department";	echo "</th>";
		echo "<th>";	echo "Price";		echo "</th>";
		echo "<th>";	echo "Pages";		echo "</th>";
		echo"</tr>";

		while($row=mysqli_fetch_assoc($res))
		{
			echo "<tr>";
			echo "<td>";		echo $row['bid'];			echo"</td>";
			echo "<td>";		echo $row['name'];			echo"</td>";
			echo "<td>";		echo $row['author'];		echo"</td>";
			echo "<td>";		echo $row['edition'];		echo"</td>";
			echo "<td>";		echo $row['status'];		echo"</td>";
			echo "<td>";		echo $row['quantity'];		echo"</td>";
			echo "<td>";		echo $row['department'];	echo"</td>";
			echo "<td>";		echo $row['price'];			echo"</td>";
			echo "<td>";		echo $row['pages'];			echo"</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	if(isset($_POST['submit1']))
	{
		if($_SESSION['login_user'])
		{
			mysqli_query($db,"DELETE FROM `books` where bid = '$_POST[bid]';");
			?>
				<script type="text/javascript">
					alert("The book has been Deleted !!!");
				</script>
			<?php
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("You are not Logged In");
				</script>
			<?php
		}
	}
	?>
</div>
</body>
</html>