<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION["librarian"]))
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
			  <a class="active" href="plain_page.php"><i class="fa fa-fw fa-home"></i> Home</a>
			  <a href="studentinfo.php"><i class="fa fa-fw fa-wrench"></i> student info</a>
			  <a href="addbook.php"> <i class="fa fa-fw fa-envelope"></i> addbook</a>
			  <a href="displaybook.php"><i class="fa fa-fw fa-user"></i> displaybook</a>
			  <a href="deletebook.php"><i class="fa fa-trash"></i> deletebook</a>
			  <a href="student_book_issue.php"><i class="fa fa-fw fa-wrench"></i> issuebook</a>
			  <a href="returnbook1.php"><i class="fa fa-fw fa-user"></i> Return Book </a>
			  <a href="issue_return_book_status.php"><i class="fa fa-fw fa-envelope"></i> Issue return book status </a>
			  <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
		</div>
	
        <div class="content">
			  <form name="form1" action="" method="post">
								<table >
								
								<tr>
								<td>
								<select name="enr">
								<?php
								$q='';
								$res=mysqli_query($link,"select enrollment from issuebook where book_return_date='$q' ");
								while($row=mysqli_fetch_array($res))
								{
									echo "<option>";
									echo $row["enrollment"];
									echo "</option>";
								}
								?>
								</select>
								</td>
							
								
								<td>
								<input type="submit" name="submit1" value="search"  style="background-color:blue;color:white">
								</td>
								
								 
								</tr>
								</table>
								</form>
								<br>
								<br>
								<?php
								
								if(isset($_POST["submit1"]))
								{
									$res=mysqli_query($link,"select * from issuebook where enrollment='$_POST[enr]' and book_return_date='$q' ");
									echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
									echo "<tr>";
									echo "<th>"; echo "enrollment"; echo "</th>";
									echo "<th>"; echo "book_name"; echo "</th>";
									echo "<th>"; echo "book_issue_date"; echo "</th>";
						            echo "<th>"; echo "return book"; echo "</th>";
									
									echo "</tr>";
									while($row=mysqli_fetch_array($res))
									{
										echo "<tr>";
										echo "<td>"; echo $row["enrollment"]; echo "</td>";
										echo "<td>"; echo $row["bookname"]; echo "</td>";
										echo "<td>"; echo $row["book_issue_date"]; echo "</td>";
										echo "<td>"; ?> <a href="return1.php?id=<?php  echo $row["id"]; ?>">return books</a> <?php echo "</td>";
										
										echo "</tr>";
									}
									echo "</table>";
								}
								
								?>
		</div>



</body>
</html>
