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
<body bgcolor="#f9ffe3">

<?php

$id=$_GET["id"];

$s=0;
$res=mysqli_query($link, "select id from issuebook where bookname='$id' ");
while ($row=mysqli_fetch_array($res))
{
	$qqq=$row["id"];
	$s=1;
}

if ($s==1)
{

$res=mysqli_query($link,"select id,enrollment,book_issue_date,issue_book_time from issuebook where bookname='$id' ");
					echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
					echo "<tr>";
					echo "<th>"; echo "bookname"; echo "</th>";
					echo "<th>"; echo "enrollment"; echo "</th>";
					echo "<th>"; echo "book issue date"; echo "</th>";
					echo "<th>"; echo "book issue time"; echo "</th>";
					echo "</tr>";
					
					while($row=mysqli_fetch_array($res))
						{
							echo "<tr>";
							echo "<td>"; echo $id; echo "</td>";
							echo "<td>"; echo $row["enrollment"]; echo "</td>";
							echo "<td>"; echo $row["book_issue_date"]; echo "</td>";
							echo "<td>"; echo $row["issue_book_time"]; echo "</td>";	
						    echo "</tr>";
						}			
					echo "</table>";
}

else
{
	echo "<b>";
	?>
	NO RECORD FOUND 
	<?php
	echo "</b>";
}

?>
<br>
<button align="center" ><a href="issue_return_book_status.php" ALIGN="CENTER"><font color="red"> BACK </font></a></button>


</body>
</html>