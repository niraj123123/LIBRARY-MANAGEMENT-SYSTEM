<?php
include "connection.php";
?>

<html>
<head>
     <title> SIGN UP PAGE </title>
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
				<form method="post"action="" name="form1">
				<font size ="4px">

						<pre>FIRST NAME       : <input type ="text" name="fname" ></pre>
						<pre>lAST NAME        : <input type ="text" name="lname" ></pre>
						<pre>USERNAME         : <input type ="text" name="username" ></pre>
						<pre>EMAIL ID         : <input type ="text" name="email" ></pre>
						<pre>MOBILE NO        : <input type ="text" name="mno" ></pre>
						<pre>PASSWORD         : <input type ="password" name="password" ></pre>
						<pre>ENROLLMENT       : <input type ="text" name="enrollment" ></pre>

						<input type="submit" value="REGISTRATION" name="submit1">
						
						
						<?php

							if(isset($_POST["submit1"]))
							{
							  if ($_POST["password"]!='' && $_POST["fname"]!='' && $_POST["lname"]!='' && $_POST["username"]!='' && $_POST["email"]!='' && $_POST["mno"]!='' && $_POST["enrollment"]!=''  )
							  {
							   mysqli_query($link,"insert into signup values('','$_POST[fname]','$_POST[lname]','$_POST[username]','$_POST[email]','$_POST[mno]','$_POST[password]','$_POST[enrollment]')");
							
							?>
							<script type="text/javascript">
							  alert("registration successfully  ");
							  </script>
							  
							  <script type="text/javascript">
							  window.location="login.php";
							  </script>
							<?php
							  }
							  
							  else
							  {
								  echo "<br>";
								  echo "<br>";
								  echo "<b>";
								  echo "<font color='white'>";
								  ?>
						  
						              fill form completly
						  
						         <?php 
								 echo "</font>";
								 echo"</b>";
							  }
							  
							}
						?>	
						
						
				</font>
                </form>				
		 
		</tbody>
		</table> 
</div>















</body>
</html>