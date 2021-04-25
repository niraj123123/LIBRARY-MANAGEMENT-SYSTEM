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
			     $a=array();
				 $b=array();
				 $c=array();
				 
				 $res=mysqli_query($link,"select * from addbook");
				 while($row=mysqli_fetch_array($res))
						{
							$a1=$row["book_name"];
							array_push($a,$a1);
						}
					
               	
                $a2=sizeof($a);
              
			    for ($i=0;$i<$a2;$i++)
				{
				$a3=$a[$i];
				$res=mysqli_query($link,"select id from issuebook where bookname='$a3'");
                $s=0;				
				while($row=mysqli_fetch_array($res))
						{
							$a4=$row["id"];
							$s=$s+1;
							
						}
			    array_push($b,$s);
						
				}
				
				for ($i=0;$i<$a2;$i++)
				{
				$a3=$a[$i];
				$res=mysqli_query($link,"select return_book_time from issuebook where bookname='$a3'");
                $s=0;				
				while($row=mysqli_fetch_array($res))
						{
							$a9=$row["return_book_time"];
							if($a9!='')
							{
								$s=$s+1;
							}
							
						}
			    array_push($c,$s);
						
				}
				    				
			
 				echo "<h1 align='center' >"; echo "<i>"; echo " ISSUE BOOK RECORD "; echo "</i>";echo "</h1>";
				echo "<table border='5px' align='center'>";
			    echo"<tr>";
				echo "<th>"; echo "BOOK NAME"; echo "</TH>";
				echo "<TH>"; echo "TOTAL ISSUE BOOK"; echo "</TH>";
				echo "<TH>"; echo "DISPLAY BOOK RECORD"; echo "</TH>";
				echo "</TR>";
				
				for ($i=0;$i<$a2;$i++)
				{
					echo "<tr>";
					echo "<td>" ; echo $a[$i]; echo "</td>";
					echo "<td>" ; echo $b[$i]; echo "</td>";
					echo "<td>"; ?>  <a href="issuebookdisplay.php?id=<?php echo $a[$i]; ?>">dispaly record</a>     <?php  echo "</td>";
					echo "</tr>";
				}
				
				echo "</table>";
				echo "<br>";
				
				
				
				
				
				echo "<h1 align='center' >"; echo "<i>"; echo " RETURN BOOK RECORD "; echo "</i>";echo "</h1>";
				echo "<table border='5px' align='center'>";
			    echo"<tr>";
				echo "<th>"; echo " BOOK NAME"; echo "</TH>";
				echo "<TH>"; echo "TOTAL RETURN BOOK"; echo "</TH>";
				echo "<TH>"; echo "DISPLAY BOOK RECORD"; echo "</TH>";
				echo "</TR>";
				
				for ($i=0;$i<$a2;$i++)
				{
					echo "<tr>";
					echo "<td>" ; echo $a[$i]; echo "</td>";
					echo "<td>" ; echo $c[$i]; echo "</td>";
					echo "<td>"; ?>  <a href="returnbookdisplay.php?id1=<?php echo $a[$i]; ?>">dispaly record</a>     <?php  echo "</td>";
					echo "</tr>";
				}
				
				echo "</table>";
				echo "<br>";
				
				
					
				
				
				?>
			 
		</div>



</body>
</html>
