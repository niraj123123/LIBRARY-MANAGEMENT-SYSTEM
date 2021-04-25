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
             <form name="form1" action="" method="post">
				<table >
				<tr>
				<td>
				<input type="text" name="t1" placeholder="enter books name" >
				</td>
				<td><input type="submit" name="submit1" value="search books" ></td>
				
				</tr>
				
				</table>
			 </form>
			 
			 
			 <?php
								
					if(isset($_POST["submit1"]))
					{
						  $i=0;
						  $res=mysqli_query($link,"select * from addbook  where book_name like('%$_POST[t1]%')");
						  echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
						  echo "<br>";
						  echo "<tr>";
						  while($row=mysqli_fetch_array($res))
						  {
							  $i=$i+1;
							  echo "<td>";
							  
							  echo "<b>BOOK NAME: </b>".$row["book_name"]."<br>";
							  
							  echo "<br>";
							  echo "<b>"."available: </b>".$row["available_quantity"]."<br>";
							  echo "</td>";
							  
							  if($i==2)
							  {
								  echo "</tr>";
								  echo "<tr>";
								  $i=0;
							  }
						  }
						  echo "</tr>";
						  echo "</table>";
					}
					else
					{
					  $i=0;
					  $res=mysqli_query($link,"select * from addbook where available_quantity>0");
					  echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
					  echo "<tr>";
					  while($row=mysqli_fetch_array($res))
					  {
						  $i=$i+1;
						  echo "<td>";
						  
						  echo "<b>BOOK NAME: </b>".$row["book_name"]."<br>";
						  
						  echo "<br>";
						  echo "<b>"."available: </b>".$row["available_quantity"]."<br>";
						  echo "</td>";
						  
						  if($i==2)
						  {
							  echo "</tr>";
							  echo "<tr>";
							  $i=0;
						  }
					  }
					  echo "</tr>";
					  echo "</table>";
					}
					
					
					
					
				?>
								
								
		</div>


</body> 
</html>
