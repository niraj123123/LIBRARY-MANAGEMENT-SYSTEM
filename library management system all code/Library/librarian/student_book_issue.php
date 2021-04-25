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
								<table>
								<tr>
								
								<td>
								     <select  name="enr" >
									 
	                                    <?php
										date_default_timezone_set('Asia/Kolkata');
                                        $time1=date('h:i:s');
										$res =mysqli_query($link,"select enrollment from signup");
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
								<input type="submit" value="search" name="submit1"  style="margin-top: 5px;">
								</tr>
								</table>
							
								
								<?php
								if(isset($_POST["submit1"]))
								{
								
									$res5=mysqli_query($link,"select * from  signup where enrollment='$_POST[enr]'");
									while($row5=mysqli_fetch_array($res5))
									{
										$firstname=$row5["fname"];
										$lastname=$row5["lname"];
										$username=$row5["username"];
										$email=$row5["email"];
										$contact=$row5["mno"];
										$enrollment=$row5["enrollment"];
										$_SESSION["enrollment"]=$enrollment;
										$_SESSION["username"]=$username;
									}
									
									?>
									<table>
								<tr>
								<td><input type="text"  name="enrollment" value="<?php echo $enrollment; ?>" disabled></td>
								</tr>
								
								<tr>
								<td><input type="text"  name="student_name" value="<?php echo $firstname. ' '.$lastname;   ?>" required ></td>
								</tr>
								

								
								<tr>
								<td><input type="text"  name="student_contact" value="<?php echo $contact; ?>" required ></td>
								</tr>
								
								<tr>
								<td><input type="text"  name="student_email" value="<?php echo $email; ?>" required ></td>
								</tr>
								
								<tr>
								<td>
								<select name="bookname">
								<?php
								  $res=mysqli_query($link,"select book_name from addbook");
								  while($row=mysqli_fetch_array($res))
								  {
									  echo "<option>";
								     echo $row["book_name"];
								  
								    echo "</option>";
								  }
								?>
								</select>
								</td>
								</tr>
								<tr>
								<td><input type="text"   name="book_issue_date" value="<?php echo date("d/M/Y") ; ?>" required disabled</td>
								</tr>
								
								<tr>
								<td><input type="text"  name="student_username" value="<?php echo $username; ?>" disabled></td>
								</tr>
								
								<tr>
								<td><input type="submit"   name="submit2" value="issue_book" style="background-color:blue;color:white" ></td>
								</tr>
								</table>
									
									<?php
								}
								
								
								
								?>
						</form>
						
						<?php
								if(isset($_POST["submit2"]))
								{
									$qty=0;
									$res=mysqli_query($link,"select * from addbook where book_name='$_POST[bookname]'");
									while($row=mysqli_fetch_array($res))
									{
										$qty=$row["available_quantity"];
									}
									
									if($qty==0)
									{
										?>
		  
										   <div class="alert alert-danger col-lg-12 col-lg-push-0">
										   <strong  >this books are not available in stook</strong>
										   </div>
										 <?php 
									}
									
									else
									{
										
									
									mysqli_query($link,"insert into issuebook values('','$_SESSION[enrollment]','$_POST[student_name]','$_POST[student_contact]','$_POST[student_email]','$_POST[bookname]','$_POST[book_issue_date]','','$_SESSION[username]','$time1','')");
								    mysqli_query($link,"update addbook set available_quantity=available_quantity-1 where book_name='$_POST[bookname]' ");
								  ?>
								    <script type="text/javascript">
									alert("books issue successfully");
									
									window.location.href=window.location.href;
									</script>
								  <?php
									}
								
								}
								
								
								?>
		</div>



</body>
</html>
