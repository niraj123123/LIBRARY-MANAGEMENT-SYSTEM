
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


<?php

$id=$_GET["id"];

$res5=mysqli_query($link,"select * from  issuebook where id='$id'");
									while($row5=mysqli_fetch_array($res5))
									{
										$f=$row5["bookname"];
									}  
									
									

$res5=mysqli_query($link,"select * from  addbook where book_name='$f'");
									while($row5=mysqli_fetch_array($res5))
									{
										$f1=$row5["available_quantity"];
									}

$f1=$f1 + 1 ;									
$a= date("d/M/Y") ;
date_default_timezone_set('Asia/Kolkata');
$time2=date('h:i:s');
$res=mysqli_query($link," update issuebook set book_return_date='$a' where id='$id'");
$res=mysqli_query($link," update issuebook set return_book_time='$time2' where id='$id'");
mysqli_query($link," update addbook set available_quantity='$f1' where book_name='$f'");

?>
<script type="text/javascript">
alert("books return successfully ");
</script>
							  
							  
<script type="text/javascript">
window.location="returnbook1.php";
</script>
window.location="returnbook1.php";
</script>