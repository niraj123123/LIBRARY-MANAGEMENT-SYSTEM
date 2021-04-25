<?php
session_start();
include "connection.php";
?>

<html>
<head>
     <title> LOGIN PAGE </title>
     <link rel="stylesheet" type="text/css" href="l2.css">
</head>

<body>

<div id="BLOCK13">
        <h1 align="center"> LIBRARY MANAGEMENT SYSTEM </h1>
		<br>
		<br>
		<table   cellpadding="5px" align="center">
		<tbody>
				
				<tr>
				<td>
				<form method="post" action="" name="form1">
				<font size ="4px">
						<pre>USERNAME : <input type ="text" name="username"></pre>
						<pre>PASSWORD : <input type ="password" name="password"></pre>
						<input type="submit" value="LOGIN"  name="submit1">
						
						
				</font>
                </form>			

                <?php

				 if(isset($_POST["submit1"]))
				 {
					 $count=0;
					 $res=mysqli_query($link,"select * from signup where username='$_POST[username]' && password='$_POST[password]' ");
					 $count=mysqli_num_rows($res);
					 
					 if($count==0)
					 {
						 echo "<b>";
						 echo "<font color='white'>";
						 ?>
						  
						   Invalid Username Or Password.
						  
						 <?php  
                        echo "</font>";						
						echo "</b>";
						 
					 }
					 else
					 {
						 $_SESSION["username"]=$_POST["username"];
						 ?>
						 <script type="text/javascript">
						 window.location="plain_page.php";
						 </script>
						 <?php
					 }
					 
					
				 }
				 
				?>	
                <br>
						<br>
						<a href="signup.php" > <font color="white">GO TO REGISTRATION PAGE </font></a>
						<br>
						<br>
						<a href="forgot.php" > <font color="white">FORGOT PASSWORD </font></a>				
		 
		</tbody>
		</table> 

</div>















</body>
</html>