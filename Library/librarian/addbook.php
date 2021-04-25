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
			  <table   cellpadding="5px" align="center">
		      <tbody>
				
				<tr>
				<td>
				<form method="post"action="" name="form1">
				<font size ="4px">

						<pre>BOOK NAME               : <input type ="text" name="book_name" ></pre>
						<pre>BOOK AUTHOR NAME        : <input type ="text" name="book_author" ></pre>
						<pre>BOOK PUBLICATION NAME   : <input type ="text" name="book_publication" ></pre>
						<pre>BOO PURCHASE DATE       : <input type ="date" name="book_purchase_date" ></pre>
						<pre>BOOK PRICE              : <input type ="text" name="price" ></pre>
						<pre>BOOK QUANTITY           : <input type ="text" name="book_quantity" ></pre>
						<pre>AVAILABLE QUANTITY      : <input type ="text" name="avalible_quantity" ></pre>

						<input type="submit" value="add book" name="submit1">
						
						<?php

							if(isset($_POST["submit1"]))
							{
							  
							   mysqli_query($link,"insert into addbook values('','$_POST[book_name]','$_POST[book_author]','$_POST[book_publication]','$_POST[book_purchase_date]','$_POST[price]','$_POST[book_quantity]','$_POST[avalible_quantity]')");
							
							?>
							  <script type="text/javascript">
							  alert("books successfully added");
							  </script>
							 <?php
								
							}
						?>
              </form>			 
			  </tbody>
			  </table>
		</div>



</body>
</html>
