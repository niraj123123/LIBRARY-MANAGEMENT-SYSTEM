<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["username"]))
{
	?>
	<script type="text/javascript">
	window.location="login.php";
	</script>
	<?php
}

include "connection.php";
?>

<html>
<style>
		.button{
			text-align: center;
			padding: 10px 25px;
			font-size: 15px;
			border-radius: 8px;
			align : center ;
		}
		
		
</style>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="l1.css">
</head>

<body bgcolor="#f9ffe3">

		<div id ="mySidebar" class="sidebar">
			  <a class="active" href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
			  <a href="personal info.php"><i class="fa fa-edit"></i> Personal information</a>
			  <a href="searchbook.php"> <i class="fa fa-search"></i> Search book</a>
			  <a href="issuebook.php"> <i class="fa fa-eye"></i> my issue book</a>
			  <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
		</div>

		<div class="content">
             			 
			 <?php
				  
                  echo"<br>";				  
				  echo"<br>";
				  echo"<br>";
				  
				  $res=mysqli_query($link,"select * from signup where username='$_SESSION[username]' ");
				  while($row=mysqli_fetch_array($res))
				  {
					  echo "<table   border='5px' ; align='center'; bgcolor='white'>";
					  
					  echo "<tr>";
					  echo "<td>";
					  echo "<b>First NAME</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["fname"];
					  echo "</td>";
					  echo "</tr>";
					  
					  echo "<tr>";
					  echo "<td>";
					  echo "<b>LAST NAME</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["lname"];
					  echo "</td>";
					  echo "</tr>";
					  
					  echo"<tr>";
					  echo "<td>";
					  echo "<b>USERNAME</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["username"];
					  echo "</td>";
					  echo "</tr>";
					  
					  echo "<tr>";
					  echo "<td>";
					  echo "<b>EMAIL</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["email"];
					  echo "</td>";
					  echo "</tr>";
					  
					  echo "<tr>";
					  echo "<td>";
					  echo "<b>CONTACT</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["mno"];
					  echo "</td>";
					  echo "</tr>";
					  
					  echo "<tr>";
					  echo "<td>";
					  echo "<b>ENROLLMENT</b>";
					  echo "</td>";
					  echo "<td>";
					  echo $row["enrollment"];
					  echo "</td>";
					  echo "</tr>";
					  
				  }
					  echo "</table>";
					  
				
								  
			 ?>
				
             <button class="button"><a href="update.php" ><font color="red"> UPDATE PROFILE </font></a></button>				
				
		</div>


</body> 
</html>
