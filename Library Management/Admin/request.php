<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.search
		{
			padding-left: 1050px; 
		}
		.form-control
		{
			width: 250px;
		}
		body 
		{
  			font-family: "Lato", sans-serif;
  			transition: background-color .5s;
  			background-color: #F2AA4CFF;
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
		.container
		{
			height: 500px;
			background-color:  #101820FF;
			width: 1200px;
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
	<div class="h">  <a href="books.php" style="font-family: times;">Books</a></div>
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
	<div class="container">
		<br>
		<div class="sreach" style="padding-left: 850px;">
			<form method="POST" action="" name="form1">
				<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
				<input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
				<button class="btn btn-primary" name="submit" type="submit">
					Submit
				</button>
			</form>
		</div>
		<h3 style="text-align: center; font-size: 30px;font-family: times; color: white;"><b>Request for Books</b></h3>
<?php
	if(isset($_SESSION['login_user']))
	{
		$sql = "SELECT student.username,roll,books.bid,name,author,edition,status 
			FROM student inner join issue_book on student.username = issue_book.username inner join 
			books on issue_book.bid = books.bid where issue_book.approve=''";
		$res = mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
		{
			echo "</br></br></br>";
			echo "<h2><b>";
			echo "There is no pending request !!!";
			echo "</b></h2>";
		}
		else
		{
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #419ab9;'>";
			echo "<th>";	echo "Student Username";		echo "</th>";
			echo "<th>";	echo "Student ID";				echo "</th>";
			echo "<th>";	echo "Book ID";					echo "</th>";
			echo "<th>";	echo "Book Name";				echo "</th>";
			echo "<th>";	echo "Author Name";				echo "</th>";
			echo "<th>";	echo "Edition";					echo "</th>";
			echo "<th>";	echo "Status";					echo "</th>";
			echo"</tr>";
			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='color: white; background-color: black;'>";
				echo "<td>";		echo $row['username'];		echo"</td>";
				echo "<td>";		echo $row['roll'];			echo"</td>";
				echo "<td>";		echo $row['bid'];			echo"</td>";
				echo "<td>";		echo $row['name'];			echo"</td>";
				echo "<td>";		echo $row['author'];		echo"</td>";
				echo "<td>";		echo $row['edition'];		echo"</td>";
				echo "<td>";		echo $row['status'];		echo"</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
	else
	{?>
		<br>
		<h3 style="text-align: center; font-size: 30px; font-family: times; color: white;">You are not Logged In !!!</h3>
	<?php
	}
	if(isset($_POST['submit']))
	{
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['bid'] = $_SESSION['bid'];
		?>
		<script type="text/javascript">
			window.location = "approve.php";
		</script>
		<?php
	}
?>
</div>
</body>
</html>