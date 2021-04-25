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
		     <?php
					$res=mysqli_query($link,"select * from addbook");
					echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
					echo "<tr>";
					echo "<th>"; echo "BOOK NAME"; echo "</th>";
					echo "<th>"; echo "BOOK AUTHOR"; echo "</th>";
					echo "<th>"; echo "BOOK PUBLICATION"; echo "</th>";
					echo "<th>"; echo "BOOK PURCHASE DATE"; echo "</th>";
					echo "<th>"; echo "PRICE"; echo "</th>";
					echo "<th>"; echo "BOOK QUANTITY"; echo "</th>";
					echo "<th>"; echo "AVAILABLE QUANTITY"; echo "</th>";
					echo "</tr>";
					
					while($row=mysqli_fetch_array($res))
						{
							echo "<tr>";
							echo "<td>"; echo $row["book_name"]; echo "</td>";
							echo "<td>"; echo $row["book_author"]; echo "</td>";
							echo "<td>"; echo $row["book_publication"]; echo "</td>";
							echo "<td>"; echo $row["book_purchase_date"]; echo "</td>";
							echo "<td>"; echo $row["price"]; echo "</td>";
							echo "<td>"; echo $row["book_quantity"]; echo "</td>";
                            echo "<td>"; echo $row["available_quantity"]; echo "</td>";							
						    echo "</tr>";
						}			
					echo "</table>";
			 
			 ?>
		</div>



</body>
</html>
