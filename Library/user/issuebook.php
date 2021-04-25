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
		
		<table class='table table-bordered' ; border='5px' ; align='center'>
								<th>
								student enrollment no
								</th>
								<th>
								issue book name
								</th>
								<th>
								book issue date
								</th>
								<th>
								book return date
								</th>
								<th>
								book issue time
								</th>
								<th>
								book return time
								</th>
								<?php
								  
								  $res=mysqli_query($link,"select * from issuebook where usename='$_SESSION[username]' ");
								  while($row=mysqli_fetch_array($res))
								  {
									  echo "<tr>";
									  
									  echo "<td>";
									  echo $row["enrollment"];
									  echo "</td>";
									  
									  echo "<td>";
									  echo $row["bookname"];
									  echo "</td>";
									  
									  echo "<td>";
									  echo $row["book_issue_date"];
									  echo "</td>";
									  
									  echo "<td>";
									  echo $row["book_return_date"];
									  echo "</td>";
									  
									  echo "<td>";
									  echo $row["issue_book_time"];
									  echo "</td>";
									  
									  echo "<td>";
									  echo $row["return_book_time"];
									  echo "</td>";
									  
									  echo "</tr>";
								  }
								  
								?>
								</table>
            
		</div>


</body> 
</html>
