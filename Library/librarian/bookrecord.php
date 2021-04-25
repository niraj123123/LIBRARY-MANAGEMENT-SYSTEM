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
<body bgcolor="#f9ffe3" >

<?php

$id=$_GET["id"];
                    $res=mysqli_query($link,"select * from issuebook where enrollment='$id' ");
					echo "<table class='table table-bordered' ; border='5px' ; align='center'>";
					echo "<tr>";
					echo "<th>"; echo "enrollment"; echo "</th>";
					echo "<th>"; echo "student name"; echo "</th>";
					echo "<th>"; echo "email id"; echo "</th>";
					echo "<th>"; echo "book name"; echo "</th>";
					echo "<th>"; echo "book issue date"; echo "</th>";
					echo "<th>"; echo "book issue time"; echo "</th>";
					echo "<th>"; echo "book return date"; echo "</th>";
					echo "<th>"; echo "book return time"; echo "</th>";
					echo "</tr>";
					
					while($row=mysqli_fetch_array($res))
						{
							echo "<tr>";
							echo "<td>"; echo $row["enrollment"]; echo "</td>";
							echo "<td>"; echo $row["student_name"]; echo "</td>";
							echo "<td>"; echo $row["student_email"]; echo "</td>";
							echo "<td>"; echo $row["bookname"]; echo "</td>";
							echo "<td>"; echo $row["book_issue_date"]; echo "</td>";
							echo "<td>"; echo $row["issue_book_time"]; echo "</td>";	
                            echo "<td>"; echo $row["book_return_date"]; echo "</td>";
                            echo "<td>"; echo $row["return_book_time"]; echo "</td>";							
						    echo "</tr>";
						}			
					echo "</table>";

?>


<br>
<button align="center" ><a href="studentinfo.php" ALIGN="CENTER"><font color="red"> BACK </font></a></button>


</body>
</html>