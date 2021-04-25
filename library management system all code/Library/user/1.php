<?php
session_start();
include "connection.php";
?>

<html>
<head>
     
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
						
						<pre>NEW PASSWORD         : <input type ="password" name="password"></pre>
						<pre>CONFIRM NEW PASSWORD : <input type ="password" name="password1"></pre>
						<input type="submit" value="update"  name="submit1">
						
				</font>
                </form>			

                <?php
                    $id=$_GET["id"];
					
					echo "<br>";
				 
                       if(isset($_POST["submit1"]))
					   {
						   if ($_POST["password"]!= '' && $_POST["password1"]!= '' && $_POST["password"]==$_POST["password1"] )
							   
							{
							   mysqli_query($link," update signup set password='$_POST[password1]' where username='$id'");
							?>
							  <script type="text/javascript">
							  alert("password change successfully ");
							  </script>
							  
							  <script type="text/javascript">
							  window.location="login.php";
							  </script>
							 
							<?php
								
							}
							
							else 
							{
								echo "<b>";
								echo "<font color='white'>";
								?>
						        NEW PASSWORD and CONFIRM NEW PASSWORD don't match ,please fill again 
						       <?php
							   echo "</font>";
							   echo"</b>";
                               							   
							}
					
					   }
				 
				?>				
		 
		</tbody>
		</table> 

</div>















</body>
</html>