<?php
	include('../dbcon.php');
	$id =$_REQUEST['sid'];
	
	$qry ="DELETE FROM `student` WHERE `id`='$id';";
	
	$run=mysqli_query($con,$qry);

	if($run== true)
	{
	?>
	<script>
	alert('Data Deleted Successsfully');
	window.open('deletestudent.php','_self');
	</script>
	<?php
	}
	else
	{
		?>
	<script>
	alert('Data Not Deleted ');
	</script>
	<?php
	}
	?>