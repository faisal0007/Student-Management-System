<?php
	include('../dbcon.php');
	$rolno= $_POST['rollno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$pcon=$_POST['pcon'];
	$std=$_POST['std']; 
	$id=$_POST['sid']; 
	$imagename=$_FILES['simg']['name'];
	$tempname=$_FILES['simg']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimg/$imagename");
	// seems like problem is $sid because it is not getting correct id to update
	//major issue might be update query is not running because $run might be false
	//$qry ="UPDATE `student` SET `rollno` = '$rolno', `name` = '$name', `city` = '$city', 'pcont` = '$pcon', `standard` = '$std', `image` = '$imagename' WHERE `id` = $id;";	
	//$qry ="UPDATE `student` SET `rollno` = 103, `name` = 'Raza', `city` = 'Madina', `pcont` = 96558 , `standard` = 2, `image` = 'xyz' WHERE `rollno`= 102";

	$qry ="UPDATE `student` SET `rollno` = '$rolno', `name` = '$name', `city` = '$city', `pcont` = '$pcon' , `standard` = '$std', `image` = '$imagename' WHERE `id` = $id;";
	
	$run=mysqli_query($con,$qry);

	if($run== true)
	{
	?>
	<script>
	alert('Data Updated Successsfully');
	window.open('updateform.php?sid=22','_self');

	//window.open('updateform.php?sid=<?php echo $id;?>','_self');
	//<?php header('location:updateform.php?sid=$id');?>
	</script>
	<?php
	}
	else
	{
		?>
	<script>
	alert('Data Not Updated ');
	</script>
	<?php
	}
	?>