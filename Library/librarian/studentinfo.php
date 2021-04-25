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
	
        <div class="content" >
		
		     <form name="form1" action="" method="post">
				<table >
				<tr>
				<td>
				<input type="text" name="t1" placeholder="enter student enrollment" >
				</td>
				<td><input type="submit" name="submit1" value="search student" ></td>
				
				</tr>
				
				</table>
			 </form>
			 
		
		   
			<?php
					
					$s=0;
					
					if(isset($_POST["submit1"]))
					{
						$a=$_POST["t1"];
						$res=mysqli_query($link,"select * from signup where enrollment='$a' ");
						while($row=mysqli_fetch_array($res))
							{
								$q=$row["id"];
								$s=1;
							}
							
						if($s==1)
						{
						$res=mysqli_query($link,"select * from signup where enrollment='$a' ");
						echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
						echo "<tr>";
						echo "<th>"; echo "firstname"; echo "</th>";
						echo "<th>"; echo "lastname"; echo "</th>";
						echo "<th>"; echo "username"; echo "</th>";
						echo "<th>"; echo "email"; echo "</th>";
						echo "<th>"; echo "contect"; echo "</th>";
						echo "<th>"; echo "enrollment"; echo "</th>";
						echo "<th>"; echo "book status"; echo "</th>";
						echo "</tr>";
					
						while($row=mysqli_fetch_array($res))
							{
								$s=1;
								echo "<tr>";
								echo "<td>"; echo $row["fname"]; echo "</td>";
								echo "<td>"; echo $row["lname"]; echo "</td>";
								echo "<td>"; echo $row["username"]; echo "</td>";
								echo "<td>"; echo $row["email"]; echo "</td>";
								echo "<td>"; echo $row["mno"]; echo "</td>";
								echo "<td>"; echo $row["enrollment"]; echo "</td>";	
								echo "<td>"; ?>  <a href="bookrecord.php?id=<?php echo $row["enrollment"]; ?>">dispaly record</a>     <?php  echo "</td>";							
								echo "</tr>";
							}			
						echo "</table>";
						
					}
					
					else
					{
						echo "<b><br>";
						?>
						ENTER VALID ENROLLMENT
						<?php
						echo "</b>";
						$s=1;
						
					}
					
					
					}
					
					if($s==0)
					{
						
					$res=mysqli_query($link,"select * from signup");
					echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
					echo "<tr>";
					echo "<th>"; echo "firstname"; echo "</th>";
					echo "<th>"; echo "lastname"; echo "</th>";
					echo "<th>"; echo "username"; echo "</th>";
					echo "<th>"; echo "email"; echo "</th>";
					echo "<th>"; echo "contect"; echo "</th>";
					echo "<th>"; echo "enrollment"; echo "</th>";
					echo "<th>"; echo "book status"; echo "</th>";
					echo "</tr>";
					
					while($row=mysqli_fetch_array($res))
						{
							echo "<tr>";
							echo "<td>"; echo $row["fname"]; echo "</td>";
							echo "<td>"; echo $row["lname"]; echo "</td>";
							echo "<td>"; echo $row["username"]; echo "</td>";
							echo "<td>"; echo $row["email"]; echo "</td>";
							echo "<td>"; echo $row["mno"]; echo "</td>";
							echo "<td>"; echo $row["enrollment"]; echo "</td>";	
                            echo "<td>"; ?>  <a href="bookrecord.php?id=<?php echo $row["enrollment"]; ?>">dispaly record</a>     <?php  echo "</td>";							
						    echo "</tr>";
						}			
					echo "</table>";
					
					}
			 
			 ?>
			 
			
		
		</div>



</body>
</html>
