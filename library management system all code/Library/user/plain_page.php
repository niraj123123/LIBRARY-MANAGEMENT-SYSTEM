<!DOCTYPE html>
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
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="l1.css">
</head>

<body bgcolor="#f9ffe3">

		<div id ="mySidebar" class="sidebar">
			  <a class="active" href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
			  <a href="personal info.php"><i class="fa fa-edit"></i> Personal information</a>
			  <a href="searchbook.php"> <i class="fa fa-search"></i> Search book</a>
			  <a href="issuebook.php"> <i class="fa fa-eye"></i> my issue book</a>
			  <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
		</div>
        
		<?php
		
		$s=$_SESSION["username"];
		
		?>
		
		<div class="content">
			  <h2 align="center">WELCOME TO LIBRARY MANAGEMENT SYSYEM </h2>
			  <h2 align="center"> <?php echo $s ; ?>  </h2><BR> 
		</div>


</body> 
</html>
