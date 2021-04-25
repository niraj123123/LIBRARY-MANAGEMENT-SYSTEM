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
		}
</style>
<body bgcolor="#f9ffe3">
      
	  <?php
			
			    $e=$_SESSION["username"];
				$res5=mysqli_query($link,"select * from  signup where username='$e'");
				while($row5=mysqli_fetch_array($res5))
				{
					$firstname=$row5["fname"];
					$lastname=$row5["lname"];
					$username=$row5["username"];
					$email=$row5["email"];
					$contact=$row5["mno"];
					$enrollment=$row5["enrollment"];

				}
				
	  ?>
	  
	  
	  <form method="post"action="" name="form1" align="center">
			
			<pre>FIRST NAME  : <input type="text"  name="fname" value="<?php echo $firstname; ?>"></pre>
			<pre>LAST NAME   : <input type="text"  name="lname" value="<?php echo $lastname;   ?>"></pre>
			<pre>USERNAME    : <input type="text"  name="username" value="<?php echo $username;   ?>"></pre>
	        <pre>EMAIL ID    : <input type="text"  name="email" value="<?php echo $email; ?>"></pre>
		    <pre>CONTACT     : <input type="text"  name="contact" value="<?php echo $contact; ?>"></pre>
			<pre>ENROLLMENT  : <input type="text"  name="enrollment" value="<?php echo $enrollment;   ?>"></pre>
			
			<br>
			<button class="button" name="submit2" align="center">UPDATE PROFILE</button>
								
		</form>
				
		<?php

			if(isset($_POST["submit2"]))
			{
			   mysqli_query($link," update signup set fname='$_POST[fname]' where username='$e'");
			   mysqli_query($link," update signup set lname='$_POST[lname]' where username='$e'");
			   mysqli_query($link," update signup set username='$_POST[username]' where username='$e'");
			   mysqli_query($link," update signup set email='$_POST[email]' where username='$e'");
			   mysqli_query($link," update signup set mno='$_POST[contact]' where username='$e'");
			   mysqli_query($link," update signup set enrollment='$_POST[enrollment]' where username='$e'");
			   mysqli_query($link," update issuebook set student_contact='$_POST[contact]' where student_contact='$contact'");
			   mysqli_query($link," update issuebook set student_email='$_POST[email]' where student_email='$email'");
			   mysqli_query($link," update issuebook set usename='$_POST[username]' where usename='$username'");
			?>
			  <script type="text/javascript">
			  alert("profile updated  successfully ");
			  </script>
			  
			  <script type="text/javascript">
			  window.location="personal info.php";
			  </script>
			 <?php
				
			}
		?>										
    
	 
</body>	 
</html>
		 