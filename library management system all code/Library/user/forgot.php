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
						EMAIL ID : <input type ="text" name="email"><br><br>
						
						<input type="submit" value="submit"  name="submit1">
						
				</font>
                </form>			

                <?php

				 
                       if(isset($_POST["submit1"]))
					   {
						   $s='';
						   $res=mysqli_query($link,"select username from signup where email='$_POST[email]' ");
								while($row=mysqli_fetch_array($res))
								{
									
									$s= $row["username"];
									
								}
					        if($s!= '')
							{
								echo "<b>";
								  echo "<font color='white'>";
								?>
								USER ACCOUNT VERIFIED SELECT LINK CHANGE PASSWORD
								
								<?PHP
								echo "</font>";
								 echo"</b>";
								echo "<br>";
							}
							else
							{
								echo "<b>";
								  echo "<font color='white'>";
								?>
								USER DOESN'T EXIST , PLEASE REGISTER
								<?php
								echo "</font>";
								 echo"</b>";
								echo "<br>";
							}
							
					   }
				 
				?>	
               		  
                <br><a href="signup.php" > <font color="white">GO TO REGISTRATION PAGE </font></a><br><br>
				<?php
                 				?>
								<a href="1.php?id=<?php echo $s; ?> " > <font color="white">CHANGE PASSWORD </font></a>
				                <?php
								
				?>
		 
		</tbody>
		</table> 

</div>















</body>
</html>